<?php

namespace Shopee\Nodes\Payment;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class Payment extends NodeAbstract
{
    /**
     * Use this API to fetch the accounting detail of order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getEscrowDetail($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_escrow_detail', $parameters);
    }

     /**
     * Sets the staging capability of shop level.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function setShopInstallmentStatus($parameters = []): ResponseData
    {
        return $this->post('/api/v2/payment/set_shop_installment_status', $parameters);
    }

     /**
     * Get the installment state of shop.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getShopInstallmentStatus($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_shop_installment_status', $parameters);
    }

     /**
     * Get the payoutdetail for CB.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getPayoutDetail($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_payout_detail', $parameters);
    }

     /**
     * Set item installment.Only for TH、TW.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function setItemInstallmentStatus($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/set_item_installment_status', $parameters);
    }

     /**
     * Get item installment tenures.Only for TH、TW.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getItemInstallmentStatus($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_item_installment_status', $parameters);
    }

     /**
     * Obtain payment method (no authentication required)
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getPaymentMethodList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_payment_method_list', $parameters);
    }

     /**
     * Use this API to get the transaction records of wallet.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getWalletTransactionList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_wallet_transaction_list', $parameters);
    }


     /**
     * Use this API to fetch the accounting list of order.
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getEscrowList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/payment/get_escrow_list', $parameters);
    }
}
