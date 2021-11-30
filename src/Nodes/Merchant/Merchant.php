<?php

namespace Rusmanab\Shopee\Nodes\Merchant;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

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
