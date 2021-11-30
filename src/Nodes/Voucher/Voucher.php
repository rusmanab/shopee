<?php

namespace Rusmanab\Shopee\Nodes\Voucher;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\RequestParametersInterface;
use Rusmanab\Shopee\ResponseData;

class Voucher extends NodeAbstract
{
    /**
     * Add voucher
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addVoucher($parameters = []): ResponseData
    {
        return $this->post('/api/v2/voucher/add_voucher', $parameters);
    }

    /**
     * Delete voucher
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteVoucher($parameters = []): ResponseData
    {
        return $this->post('/api/v2/voucher/delete_voucher', $parameters);
    }

    /**
     * End voucher
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function endVoucher($parameters = []): ResponseData
    {
        return $this->post('/api/v2/voucher/end_voucher', $parameters);
    }

    /**
     * Update voucher
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateVoucher($parameters = []): ResponseData
    {
        return $this->post('/api/v2/voucher/update_voucher', $parameters);
    }

    /**
     * Get Voucher Detail
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getVoucher($parameters = []): ResponseData
    {
        return $this->get('/api/v2/voucher/get_voucher', $parameters);
    }

    /**
     * Get Voucher List
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getVoucherList($parameters = []): ResponseData
    {
        return $this->post('/api/v2/voucher/get_voucher_list', $parameters);
    }
}
