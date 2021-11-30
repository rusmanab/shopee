<?php

namespace Rusmanab\Shopee\Nodes\ShopCategory;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class ShopCategory extends NodeAbstract
{
    /**
     * Use this call to add a new shop collecion
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addShopCategory($parameters = []): ResponseData
    {
        return $this->post('/api/v2/shop_category/add_shop_category', $parameters);
    }

    /**
     * Use this call to get list of in-shop categories.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopCategoriesList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/shop_category/get_shop_category_list', $parameters);
    }

    /**
     * Use this call to delete a existing shop collecion
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteShopCategory($parameters = []): ResponseData
    {
        return $this->post('/api/v2/shop_category/delete_shop_category', $parameters);
    }

    /**
     * Use this call to update a existing collecion.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateShopCategory($parameters = []): ResponseData
    {
        return $this->post('/api/v2/shop_category/update_shop_category', $parameters);
    }

    /**
     * Use this call to add items list to certain shop_category.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addItems($parameters = []): ResponseData
    {
        return $this->post('/api/v2/shop_category/add_item_list', $parameters);
    }

    /**
     * Use this call to get items list of certain shop_category
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getItems($parameters = []): ResponseData
    {
        return $this->get('/api/v2/shop_category/get_item_list', $parameters);
    }

    /**
     * Use this api to delete items from shop category
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteItems($parameters = []): ResponseData
    {
        return $this->post('/api/v2/shop_category/delete_item_list', $parameters);
    }
}
