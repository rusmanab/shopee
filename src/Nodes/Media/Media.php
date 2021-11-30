<?php

namespace Rusmanab\Shopee\Nodes\Media;

use Rusmanab\Shopee\Nodes\NodeAbstract;
use Rusmanab\Shopee\ResponseData;

class Media extends NodeAbstract
{
    /**
     * Use this call to get categories of product item.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function initVideoUpload($parameters = []): ResponseData
    {
        return $this->get('/api/v2/media_space/init_video_upload', $parameters);
    }

    /**
     * Use this call to Upload video file by part using the upload_id in initiate_video_upload.
     * The request Content-Type of this API should be of multipart/form-data
     * @param array $parameters
     * @return ResponseData
     */
    public function uploadVideoPart($parameters = []): ResponseData
    {
        return $this->post('/api/v2/media_space/upload_video_part', $parameters);
    }

    /**
     * Use this call to Complete the video upload
     * and starts the transcoding process when all parts are uploaded successfully.
     * @param array $parameters
     * @return ResponseData
     */
    public function completeUploadVideo($parameters = []): ResponseData
    {
        return $this->post('/api/v2/media_space/complete_video_upload', $parameters);
    }

     /**
     * Use this call to Query the upload status and result of video upload.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function uploadVideoResult($parameters = []): ResponseData
    {
        return $this->post('/api/v2/media_space/get_video_upload_result', $parameters);
    }

     /**
     * Use this call to Cancel a video upload session
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function cancelUploadVideo($parameters = []): ResponseData
    {
        return $this->post('/api/v2/media_space/cancel_video_upload', $parameters);
    }

     /**
     * Use this call to Upload image file.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function uploadImage($parameters = []): ResponseData
    {
        return $this->postFile('/api/v2/media_space/upload_image', $parameters);
    }


}
