<?php

namespace Shopee\Nodes\Returns;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class Returns extends NodeAbstract
{

    /**
     * Use this api to get detail information of a return by return id.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getReturnDetail($parameters = []): ResponseData
    {
        return $this->get('/api/v2/returns/get_return_detail', $parameters);
    }


    /**
     * Confirm return.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function confirmReturn($parameters = []): ResponseData
    {
        return $this->post('/api/v2/returns/confirm', $parameters);
    }

    /**
     * Dispute return.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function disputeReturn($parameters = []): ResponseData
    {
        return $this->post('/api/v2/returns/dispute', $parameters);
    }

    /**
     * Use this api to get detail information of many return by shop id.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getReturnList($parameters = []): ResponseData
    {
        return $this->post('/api/v2/returns/get_return_list', $parameters);
    }

}
