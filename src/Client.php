<?php

namespace Rusmanab\Shopee;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use GuzzleHttp\Exception\ServerException as GuzzleServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Shopee\Nodes\NodeAbstract;
use Shopee\Nodes;
use Shopee\Exception\Api\AuthException;
use Shopee\Exception\Api\BadRequestException;
use Shopee\Exception\Api\ClientException;
use Shopee\Exception\Api\Factory;
use Shopee\Exception\Api\ServerException;

use function array_key_exists;
use function array_merge;
use function getenv;
use function json_encode;
use function time;

/**
 * @property Nodes\Item\Item $item
 * @property Nodes\Logistics\Logistics $logistics
 * @property Nodes\Order\Order $order
 * @property Nodes\Returns\Returns $returns
 * @property Nodes\Shop\Shop $shop
 * @property Nodes\Discount\Discount $discount
 * @property Nodes\ShopCategory\ShopCategory $shopCategory
 */
class Client
{
    public const VERSION = '0.2';

    public const DEFAULT_BASE_URL = 'https://partner.shopeemobile.com';

    public const DEFAULT_USER_AGENT = 'shopee-php/' . self::VERSION;

    public const ENV_SECRET_NAME = 'SHOPEE_API_SECRET';

    public const ENV_PARTNER_ID_NAME = 'SHOPEE_PARTNER_ID';

    public const ENV_SHOP_ID_NAME = 'SHOPEE_SHOP_ID';

    /** @var ClientInterface */
    protected $httpClient;

    /** @var UriInterface */
    protected $baseUrl;

    /** @var string */
    protected $userAgent;

    /** @var string Shopee Partner Secret key */
    protected $secret;

    /** @var int */
    protected $partnerId;

    /** @var int */
    protected $shopId;

    /** @var NodeAbstract[] */
    protected $nodes = [];

    /** @var SignatureGeneratorInterface */
    protected $signatureGenerator;

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'httpClient' => null,
            'baseUrl' => self::DEFAULT_BASE_URL,
            'userAgent' => self::DEFAULT_USER_AGENT,
            'secret' => getenv(self::ENV_SECRET_NAME),
            'partner_id' => (int)getenv(self::ENV_PARTNER_ID_NAME),
            'shop_id' => (int)getenv(self::ENV_SHOP_ID_NAME),
            SignatureGeneratorInterface::class => null,
        ], $config);

        $this->httpClient = $config['httpClient'] ?: new HttpClient();
        $this->setBaseUrl($config['baseUrl']);
        $this->setUserAgent($config['userAgent']);
        $this->secret = $config['secret'];
        $this->partnerId = $config['partner_id'];
        $this->shopId = $config['shop_id'];

        $signatureGenerator = $config[SignatureGeneratorInterface::class];
        if (is_null($signatureGenerator)) {
            $this->signatureGenerator = new SignatureGenerator($this->secret);
        } elseif ($signatureGenerator instanceof SignatureGeneratorInterface) {
            $this->signatureGenerator = $signatureGenerator;
        } else {
            throw new InvalidArgumentException('Signature generator not implement SignatureGeneratorInterface');
        }
        // v2
        $this->nodes['shop'] = new Nodes\Shop\Shop($this);
        $this->nodes['merchant'] = new Nodes\Merchant\Merchant($this);
        $this->nodes['product'] = new Nodes\Product\Product($this);
        $this->nodes['media'] = new Nodes\Media\Media($this);
        $this->nodes['logistics'] = new Nodes\Logistics\Logistics($this);
        $this->nodes['order'] = new Nodes\Order\Order($this);

        $this->nodes['payment'] = new Nodes\Payment\Payment($this);
        $this->nodes['voucher'] = new Nodes\Voucher\Voucher($this);
        $this->nodes['followPrize'] = new Nodes\FollowPrize\FollowPrize($this);
        $this->nodes['topPicks'] = new Nodes\TopPicks\TopPicks($this);

        $this->nodes['returns'] = new Nodes\Returns\Returns($this);
        $this->nodes['accountHealth'] = new Nodes\AccountHealth\AccountHealth($this);
        $this->nodes['publik'] = new Nodes\Publik\Publik($this);
        $this->nodes['shopCategory'] = new Nodes\ShopCategory\ShopCategory($this);
        // end



    }

    public function __get(string $name)
    {
        if (!array_key_exists($name, $this->nodes)) {
            throw new InvalidArgumentException(sprintf('Property "%s" not exists', $name));
        }

        return $this->nodes[$name];
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $client
     * @return $this
     */
    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent(string $userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getBaseUrl(): UriInterface
    {
        return $this->baseUrl;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setBaseUrl(string $url)
    {
        $this->baseUrl = new Uri($url);

        return $this;
    }

    public function getDefaultParameters(): array
    {
        return [
            'partner_id' => $this->partnerId,
            'shop_id' => $this->shopId,
            'timestamp' => time(), // Put the current UNIX timestamp when making a request
        ];
    }

    /**
     * Create HTTP JSON body
     *
     * The HTTP body should contain a serialized JSON string only
     *
     * @param array $data
     * @return string
     */
    protected function createJsonBody(array $data): string
    {
        $data = array_merge($this->getDefaultParameters(), $data);
        //$data = ["query"=>$data];
        return json_encode($data);
    }

    /**
     * Generate an HMAC-SHA256 signature for a HTTP request
     *
     * @param UriInterface $uri
     * @param string $body
     * @return string
     */
    protected function signature( string $baseString): string
    {

        return $this->signatureGenerator->generateSignature($baseString);
    }

    /**
     * @param string|UriInterface $uri
     * @param array $headers
     * @param array $data
     * @return RequestInterface
     */
    public function newRequest($uri, array $headers = [], $data = [], $methode = "POST"): RequestInterface
    {
        $uri = Utils::uriFor($uri);
        $path = $this->baseUrl->getPath() . $uri->getPath();

        $uri = $uri
            ->withScheme($this->baseUrl->getScheme())
            ->withUserInfo($this->baseUrl->getUserInfo())
            ->withHost($this->baseUrl->getHost())
            ->withPort($this->baseUrl->getPort())
            ->withPath($path);

        $data['timestamp'] = time();
        $baseString = $this->partnerId . $uri->getPath() . $data['timestamp'];


        $arr = array('access_token');
        foreach($data as $key => $v){
            if( in_array($key,$arr) ){
                $baseString.= $v;
            }
        }
        if ( $this->shopId > 0 ){
            $baseString.= $this->shopId;
        }

        $sign       = $this->signature($baseString);

        $data['sign']= $sign;

        $headers['Authorization'] = $sign;
        $headers['User-Agent']    = $this->userAgent;
        $headers['Content-Type']  = 'application/json';

        $newQuery = "";
        if ( $methode == "GET" ){

            foreach($data as $key => $v){

                if (is_array($data[$key])){
                    foreach($data[$key] as $k => $v){
                        $newd[] = $key."=". $v;
                    }
                    $newQuery.= implode("&", $newd);
                    $newQuery = "&".$newQuery;
                    unset($data[$key]);
                }
            }
        }


        $jsonBody = $this->createJsonBody($data);
        $file = $data;
        $data     = json_decode($jsonBody);
        if (isset($data->shopid)){
            unset($data->shop_id);
        }

        $uri = $uri .'?' . http_build_query($data) . $newQuery;

        return new Request(
            $methode, // All APIs should use POST method
            $uri,
            $headers,
            $jsonBody
        );

    }

    public function send(RequestInterface $request): ResponseInterface
    {

        try {

            $response = $this->httpClient->send($request);

        } catch (GuzzleClientException $exception) {

            switch ($exception->getCode()) {
                case 400:
                    $className = BadRequestException::class;
                    break;
                case 403:
                    $className = AuthException::class;

                    //echo "<pre>";
                    $pos = strpos( $exception->getMessage(), "{");
                    if ( $pos === false){
                        $word = json_encode( ['error' => "error_auth", "message" => "Invalid access_token."] );
                    }else{
                        $word =  substr( $exception->getMessage(),$pos) ;

                    }
                    $status = 403;
                    $headers = ['X-Foo' => 'Bar'];
                    $body = $word;
                    $protocol = '1.1';
                    $response = new Response($status, $headers, $body, $protocol);
                    return $response;
                    break;
                default:
                    $className = ClientException::class;
            }

            throw Factory::create($className, $exception);
        } catch (GuzzleServerException $exception) {
            throw Factory::create(ServerException::class, $exception);
        }

        return $response;
    }

    /**
     * @param string|UriInterface $uri
     * @param array $headers
     * @param array $data
     * @return RequestInterface
     */
    public function request($uri, array $headers = [], $data = [], $methode = "POST"): ResponseInterface
    {
        $uri = Utils::uriFor($uri);
        $path = $this->baseUrl->getPath() . $uri->getPath();

        $uri = $uri
            ->withScheme($this->baseUrl->getScheme())
            ->withUserInfo($this->baseUrl->getUserInfo())
            ->withHost($this->baseUrl->getHost())
            ->withPort($this->baseUrl->getPort())
            ->withPath($path);

        $data['timestamp'] = time();
        $baseString = $this->partnerId . $uri->getPath() . $data['timestamp'];

        $arr1 = array('image');
        $multipart = [];
        foreach($data as $key => $v){
            if( in_array($key,$arr1) ){

                $multipart[] = [
                    'name' => $key,
                    'contents' => file_get_contents($v),
                    'filename' => 'filename-0'
                ];
            }
        }

        $arr = array('access_token');
        foreach($data as $key => $v){
            if( in_array($key,$arr) ){
                $baseString.= $v;
            }
        }
        if ( $this->shopId > 0 ){
            $baseString.= $this->shopId;
        }

        $sign       = $this->signature($baseString);

        $data['sign']= $sign;

        $headers['Authorization'] = $sign;
        $headers['User-Agent']    = $this->userAgent;
        $headers['Content-Type']  = 'application/json';

        $newQuery = "";
        if ( $methode == "GET" ){
            foreach($data as $key => $v){

                if (is_array($data[$key])){
                    foreach($data[$key] as $k => $v){
                        $newd[] = $key."=". $v;
                    }
                    $newQuery.= implode("&", $newd);
                    $newQuery = "&".$newQuery;
                    unset($data[$key]);
                }
            }
        }

        $jsonBody = $this->createJsonBody($data);

        $data     = json_decode($jsonBody);
        if (isset($data->shopid)){
            unset($data->shop_id);
        }

        $uri = $uri .'?' . http_build_query($data) . $newQuery;


        $response = $this->httpClient->request(
            "POST",
            $uri,
            [
                'multipart' => $multipart
            ]
        );
        return $response;
    }
}
