<?php

namespace Shopee\Nodes\TopPicks;

use Shopee\Nodes\NodeAbstract;
use Shopee\RequestParametersInterface;
use Shopee\ResponseData;

class TopPicks extends NodeAbstract
{
    /**
     * get one TopPicks , get_top_picks_list
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function getList($parameters = []): ResponseData
    {
        return $this->get('/api/v2/top_picks/get_top_picks_list', $parameters);
    }

     /**
     * add one collection add_top_picks
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function add($parameters = []): ResponseData
    {
        return $this->post('/api/v2/top_picks/add_top_picks', $parameters);
    }

     /**
     * update a collection info update_top_picks
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function update($parameters = []): ResponseData
    {
        return $this->post('/api/v2/top_picks/update_top_picks', $parameters);
    }

     /**
     * delete a collection delete_top_picks
     *
     * @param array|RequestParametersInterface $parameters
     * @return ResponseData
     */
    public function delete($parameters = []): ResponseData
    {
        return $this->post('/api/v2/top_picks/delete_top_picks', $parameters);
    }

}
