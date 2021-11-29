<?php

namespace Shopee\Nodes\Order;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class Order extends NodeAbstract
{

    /**
     * GetOrdersList is the recommended call to use for order management.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getOrdersList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_order_list', $parameters);
    }

    /**
     * Use this api to get order list which order_status is READY_TO_SHIP.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShipmentList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_shipment_list', $parameters);
    }

    /**
     * Use this api to get order detail.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getOrderDetails($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/get_order_detail', $parameters);
    }


    /**
     * Use this api to split an order into multiple packages.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function splitOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/split_order', $parameters);
    }



    /**
     * Use this ai to undo split of order. After undo split,
     * the order will have only one package.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function undoSplitOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/unsplit_order', $parameters);
    }

    /**
     * Use this call to cancel an order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function cancelOrder($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/cancel_order', $parameters);
    }

    /**
     * Use this api to handle buyer's cancellation application.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function handleBuyerCancellation($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/handle_buyer_cancellation', $parameters);
    }


    /**
     * Use this api to set note for an order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function setNote($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/set_note', $parameters);
    }


    /**
     * Use the API to add invoice data of the order when the order status is
     * PENDING_INVOICE under some special logistics channels, such as Total Express,
     * only for the BR local seller.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addInvoiceData($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/add_invoice_data', $parameters);
    }

    /**
     * This endpoint only for PL local seller. Get the pending invoice order list
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getPendingBuyerInvoiceOrderList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_pending_buyer_invoice_order_list', $parameters);
    }

    /**
     * This endpoint only for PL local seller. Get the pending invoice order list
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function uploadInvoiceDoc($parameters = []): ResponseData
    {
        return $this->post('/api/v2/order/upload_invoice_doc', $parameters);
    }

    /**
     * This endpoint only for PL local seller.
     * Seller can download the invoice uploaded before through this endpoint
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function downloadInvoiceDoc($parameters = []): ResponseData
    {
        return $this->get('/api/v2/order/download_invoice_doc', $parameters);
    }

    /** end of v2 */

}
