<?php

namespace Rusmanab\Shopee\Nodes;

use Psr\Http\Message\UriInterface;
use Rusmanab\Shopee\Client;
use Rusmanab\Shopee\RequestParameters;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

abstract class NodeAbstract
{
    /** @var Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

    }

    /**
     * @param string|UriInterface $uri
     * @param array|RequestParameters $parameters
     * @return ResponseData
     */
    public function post($uri, $parameters)
    {
        if ($parameters instanceof RequestParametersInterface) {
            $parameters = $parameters->toArray();
        }

        $request = $this->client->newRequest($uri, [], $parameters);

        $response = $this->client->send($request);

        return new ResponseData($response);
    }

     /**
     * @param string|UriInterface $uri
     * @param array|RequestParameters $parameters
     * @return ResponseData
     */
    public function get($uri, $parameters)
    {
        if ($parameters instanceof RequestParametersInterface) {
            $parameters = $parameters->toArray();
        }

        $request = $this->client->newRequest($uri, [], $parameters,"GET");

        $response = $this->client->send($request);

        return new ResponseData($response);
    }

    public function postFile($uri, $parameters)
    {
        if ($parameters instanceof RequestParametersInterface) {
            $parameters = $parameters->toArray();
        }

        $request = $this->client->request($uri, [], $parameters,"FILE");


        return new ResponseData($request);
    }

}
