<?php

namespace Rusmanab\Shopee\Nodes\Discount;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Discount extends NodeAbstract
{
    /**
     * Add Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addDiscount($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/add_discount', $parameters);
    }

    /**
     * Add Discount Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addDiscountItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/add_discount_item', $parameters);
    }

    /**
     * Delete Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteDiscount($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/delete_discount', $parameters);
    }

    /**
     * Delete Discount Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteDiscountItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/delete_discount_item', $parameters);
    }

    /**
     * Get Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getDiscount($parameters = []): ResponseData
    {
        return $this->get('/api/v2/discount/get_discount', $parameters);
    }

    /**
     * Delete Discount List
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getDiscountList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/discount/get_discount_list', $parameters);
    }

    /**
     * Update Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateDiscount($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/update_discount', $parameters);
    }

    /**
     * Update Discount Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateDiscountItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/update_discount_item', $parameters);
    }

    /**
     * End Discount
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function endDiscount($parameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/end_discount', $parameters);
    }

}
