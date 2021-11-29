<?php

namespace Shopee\Nodes\Publik;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class Publik extends NodeAbstract
{
    /**
     * get basic info of shops which have authorized to the partner.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopsPartner($parameters = []): ResponseData
    {
        return $this->get('/api/v2/public/get_shops_by_partner', $parameters);
    }

     /**
     * Use this API to get basic info of merchants which have authorized to the partner.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getMerchantsPartner($parameters = []): ResponseData
    {
        return $this->post('/api/v2/public/get_merchants_by_partner', $parameters);
    }

}
