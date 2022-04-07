<?php

namespace Rusmanab\Shopee\Nodes\Bundle;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Bundle extends NodeAbstract
{
    /**
     * Add Bundle
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addBundle($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/add_bundle_deal', $parameters);
    }

    /**
     * Add Bundle Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addBundleItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/add_bundle_deal_item', $parameters);
    }

    /**
     * Delete Bundle
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteBundle($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/delete_bundle_deal', $parameters);
    }

    /**
     * Delete Bundle Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteBundleItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/delete_bundle_deal_item', $parameters);
    }

    /**
     * Get Bundle
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getBundle($parameters = []): ResponseData
    {
        return $this->get('/api/v2/bundle_deal/get_bundle_deal', $parameters);
    }

    /**
     * Delete Bundle List
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getBundleList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/bundle_deal/get_bundle_deal_list', $parameters);
    }

    /**
     * Update Bundle
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateBundle($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/update_bundle_deal', $parameters);
    }

    /**
     * Update Bundle Item
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateBundleItem($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/update_bundle_deal_item', $parameters);
    }

    /**
     * End Bundle
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function endBundle($parameters = []): ResponseData
    {
        return $this->post('/api/v2/bundle_deal/end_bundle_deal', $parameters);
    }

}
