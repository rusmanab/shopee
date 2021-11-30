<?php

namespace Rusmanab\Shopee\Nodes\Logistics;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Logistics extends NodeAbstract
{

    /**
     * Use this api to get shipping parameter.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShippingParameter($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_shipping_parameter', $parameters);
    }

     /**
     * Use this api to get tracking_number when you hava shipped order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getTrackingNo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_tracking_number', $parameters);
    }

     /**
     * Use this api to initiate logistics including arrange pickup,
     * dropoff or shipment for non-integrated logistic channels.
     * Should call v2.logistics.get_shipping_parameter to fetch all required param first.
     * It's recommended to initiate logistics one hour after the orders were placed since
     * there is one-hour window buyer can cancel any order without request to seller.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function shipOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/ship_order', $parameters);
    }

    /**
     * Use this api to update pickup address and pickup time for shipping order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateShippingOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/update_shipping_order', $parameters);
    }

    /**
     * Use this api to get the selectable shipping_document_type
     * and suggested shipping_document_type.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShippingDocumentParameter($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/get_shipping_document_parameter', $parameters);
    }

    /**
     * Use this api to create shipping document task for each order or package
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function createShippingDocument($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/create_shipping_document', $parameters);
    }

    /**
     * Use this api to get the shipping_document of each order or package status.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShippingDocumentResult($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/get_shipping_document_result', $parameters);
    }

    /**
     * Use this api to download shipping_document. You have to call v2.logistics.
     * create_shipping_document to create a new shipping document task first and call v2.
     * logistics.get_shipping_document_resut to get the task status second.
     * If the task is READY, you can download this shipping document.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function downloadShippingDocument($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/download_shipping_document', $parameters);
    }

    /**
     * Use this api to fetch the logistics information of an order,
     * these info can be used for airwaybill printing.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShippingDocumentInfo($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/get_shipping_document_info', $parameters);
    }

    /**
     * Use this api to get the logistics tracking information of an order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getTrackingInfo($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_tracking_info', $parameters);
    }

    /**
     * For integrated logistics channel,
     * use this call to get pickup address for pickup mode order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getAddressList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_address_list', $parameters);
    }


    /**
     * For integrated logistics channel,
     * use this call to get pickup address for pickup mode order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function setAddressConfig($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/set_address_config', $parameters);
    }

    /**
     * Use this api to delete address.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteAddress($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/delete_address', $parameters);
    }

    /**
     * Use this api to get all supported logistic channels.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getChannelList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_channel_list', $parameters);
    }


    /**
     * Use this api to update shop level logistics channel's configuration.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateChannel($parameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/update_channel', $parameters);
    }

     /**
     * Use this api to batch initiate logistics including arrange pickup,
     * dropoff or shipment for non-integrated logistic channels.
     * Should call v2.logistics.get_shipping_parameter to fetch all required param first.
     * It's recommended to initiate logistics one hour after the orders
     * were placed since there is one-hour window buyer can cancel any order
     * without request to seller.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function batchShipOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/batch_ship_order', $parameters);
    }



    /** end v2 */


}
