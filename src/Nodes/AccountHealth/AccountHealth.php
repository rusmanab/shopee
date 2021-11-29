<?php

namespace Shopee\Nodes\AccountHealth;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class AccountHealth extends NodeAbstract
{
    /**
     * The data metrics of shop performance
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function shopPerformance($parameters = []): ResponseData
    {
        return $this->get('/api/v2/account_health/shop_performance', $parameters);
    }

     /**
     * To get the information of shop penalty.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function shopPenalty($parameters = []): ResponseData
    {
        return $this->post('/api/v2/account_health/shop_penalty', $parameters);
    }

}
