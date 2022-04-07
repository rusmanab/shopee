<?php

namespace Rusmanab\Shopee\Nodes\AddOnDeal;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class AddOnDeal extends NodeAbstract
{
    /**
     * Add On Deal
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addOnDeal($parameters = []): ResponseData
    {
        return $this->post('/api/v2/add_on_deal/add_add_on_deal', $parameters);
    }

    /**
     * Add On Deal Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addOnDealItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/add_on_deal/add_add_on_deal_main_item', $parameters);
    }


    /**
     * Add On Deal Sub Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addOnDealSubItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/add_on_deal/add_add_on_deal_sub_item', $parameters);
    }

    /**
     * Delete On Deal
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteOnDeal($parameters = []): ResponseData
    {
        return $this->post('/api/v2/add_on_deal/delete_add_on_deal', $parameters);
    }

    /**
     * Delete On Deal Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteOnDealItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/add_on_deal/delete_add_on_deal_main_item', $parameters);
    }

    /**
     * Get Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteOnDealSubItem($parameters = []): ResponseData
    {
        return $this->get('/api/v2/add_on_deal/delete_add_on_deal_sub_item', $parameters);
    }

    /**
     * Get Discount List
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getAddOnDealList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/add_on_deal/get_add_on_deal_list', $parameters);
    }
}
