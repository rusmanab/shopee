<?php

namespace Rusmanab\Shopee\Nodes\Shop;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Shop extends NodeAbstract
{
    /**
     * Use this call to get token of shop.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getAccessToken($parameters = []): ResponseData
    {
        return $this->post('/api/v2/auth/token/get', $parameters);
    }

    /**
     * Use this call to get token of shop.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getRefreshToken($parameters = []): ResponseData
    {
        return $this->post('/api/v2/auth/access_token/get', $parameters);
    }

    /**
     * Use this call to get information of shop.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_shop_info', $parameters);
    }

    /**
     * Use this call to get Profile of shop.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopProfile($parameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_profile', $parameters);
    }
}
