<?php

namespace Shopee\Nodes\FollowPrize;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class FollowPrize extends NodeAbstract
{
    /**
     * OpenAPI add Follow Prize
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function addFollowPrize($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/add_follow_prize', $parameters);
    }

     /**
     * delete_follow_prize
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function deleteFollowPrize($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/delete_follow_prize', $parameters);
    }

     /**
     * end_follow_prize
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function endFollowPrize($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/end_follow_prize', $parameters);
    }

    /**
     * update_follow_prize
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function updateFollowPrize($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/update_follow_prize', $parameters);
    }

    /**
     * get_follow_prize_detail
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getFollowPrizeDetail($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/get_follow_prize_detail', $parameters);
    }

    /**
     * get_follow_prize_list
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getFollowPrizeList($parameters = []): ResponseData
    {
        return $this->post('/api/v2/follow_prize/get_follow_prize_list', $parameters);
    }

}
