<?php

namespace Shopee\Nodes\Merchant;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class Merchant extends NodeAbstract
{
    /**
     * Use this call to get information of merchant
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getMerchantInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/merchant/get_merchant_info', $parameters);
    }

    /**
     * Use this call to get shop_list bound to merchant_id.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopListByMerchant($parameters = []): ResponseData
    {
        return $this->get('/api/v2/merchant/get_shop_list_by_merchant', $parameters);
    }

}
