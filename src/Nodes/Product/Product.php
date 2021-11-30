<?php

namespace Rusmanab\Shopee\Nodes\Product;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\ResponseData;

class Product extends NodeAbstract
{
    /**
     * Use this call to get categories of product item.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getCategories($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_category', $parameters);
    }


    /**
     * Use this call to get attributes of product item.
     *
     * @param array|Parameters\GetAttributes $parameters
     * @return ResponseData
     */
    public function getAttributes($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_attributes', $parameters);
    }

    /**
     * Use this call to get brand list of product item.
     *
     */
    public function getBrandList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_brand_list', $parameters);
    }


    /**
     * Use this call to get a list of items.
     *
     * @param array|Parameters\GetItemsList $parameters
     * @return ResponseData
     */
    public function getItemsList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_list', $parameters);
    }

    /**
     * Use this api to get basic info of item by item_id list.
     *
     * @param array|Parameters\GetItemsList $parameters
     * @return ResponseData
     */
    public function getItemBaseInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_base_info', $parameters);
    }

    /**
     * Use this api to get extra info of item by item_id list.
     *
     * @param array|Parameters\GetItemsList $parameters
     * @return ResponseData
     */
    public function getItemExtraInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_extra_info', $parameters);
    }

    /**
     * Use this call to add a product item.
     *
     * @param array|Parameters\Add $parameters
     * @return ResponseData
     */
    public function add($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/add_item', $parameters);
    }

    /**
     * Use this call to update a product item.
     *
     * @param array|Parameters\UpdateItem $parameters
     * @return ResponseData
     */
    public function updateItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_item', $parameters);
    }


    /**
     * Use this call to delete a product item.
     *
     * @param array|Parameters\Delete $parameters
     * @return ResponseData
     */
    public function delete($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/delete_item', $parameters);
    }


    /**
     * For adding 2-tier variations (Forked).
     *
     * @param array|Parameters\InitTierVariation $parameters
     * @return ResponseData
     */
    public function initTierVariation($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/init_tier_variation', $parameters);
    }

    public function UpdateTierVariationList($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/update_tier_variation', $parameters);
    }

     /**
     * get Model List
     *
     * @return ResponseData
     */
    public function getModelList($parameters = []) : ResponseData
    {
        return $this->get('/api/v2/product/get_model_list', $parameters);
    }

     /**
     * Add Model List
     *
     * @return ResponseData
     */
    public function addModel($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/add_model', $parameters);
    }

    /**
     * Update Model List
     *
     * @return ResponseData
     */
    public function updateModel($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/update_model', $parameters);
    }

    /**
     * Delete Model
     *
     * @return ResponseData
     */
    public function deleteModel($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/delete_model', $parameters);
    }


    /**
     * Get category support size chart.
     *
     * @return ResponseData
     */
    public function getCategorySizeCart($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/support_size_chart', $parameters);
    }


    /**
     * Update size chart image of item.
     *
     * @return ResponseData
     */
    public function updateSizeChart($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/update_size_chart', $parameters);
    }

    /**
     * Update size chart image of item.
     *
     * @return ResponseData
     */
    public function updateSizeCharts($parameters = []) : ResponseData
    {
        return $this->post('/api/v2/product/update_size_chart', $parameters);
    }

     /**
     * Use this call to unlist or list items in batch.
     *
     * @param array|Parameters\UpdateVariationStock $parameters
     * @return ResponseData
     */
    public function unlistItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/unlist_item', $parameters);
    }


    /**
     * Use this call to update item price.
     *
     * @param array|Parameters\UpdatePrice $parameters
     * @return ResponseData
     */
    public function updatePrice($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_price', $parameters);
    }

    /**
     * Use this call to update item stock.
     *
     * @param array|Parameters\UpdateStock $parameters
     * @return ResponseData
     */
    public function updateStock($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_stock', $parameters);
    }

    /**
     * Use this api to boost multiple items at once.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function boostItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/boost_item', $parameters);
    }


    /**
     * Use this api to get all boosted items.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getBoostedItems($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_boosted_list', $parameters);
    }

     /**
     * Use this api to get ongoing and upcoming promotions.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getPromotionInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_promotion', $parameters);
    }


    /**
     * Use this api to Update sip item price..
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function updateSipItemPrice($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_sip_item_price', $parameters);
    }

    /**
     * Use this api to to search item.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function searchItem($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/search_item', $parameters);
    }
    /**
     * Use this api to get comment by shop_id, item_id, or comment_id.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getComment($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_comment', $parameters);
    }
    /**
     * Use this api to reply comments from buyers in batch.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function replyComments($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/reply_comment', $parameters);
    }

    /**
     * Use this API to get recommended category ids according to item name.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getRecommendCats($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/category_recommend', $parameters);
    }

    /**
     * Use this call to register a brand.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function registerBrand($parameters = []): ResponseData
    {
        return $this->post('/api/v2/product/register_brand', $parameters);
    }

    /**
     * Use this call to Get recommend attributes.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getRecommendAttribute($parameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_recommend_attribute', $parameters);
    }


}
