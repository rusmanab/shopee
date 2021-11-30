<?php

namespace Shopee\Nodes\Accounthealth;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Accounthealth extends NodeAbstract
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
