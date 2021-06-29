<?php


namespace App\Controllers;


use App\Models\ImageModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Image extends BaseController
{
    function __construct() {}
    /**
     * 
     * @return Response
     */
    public function getAlbum(){
        $albumId = $_GET['album_id'];
        $model = new ImageModel();
        $images = $model->where('AlbumId', $albumId)->findAll();
        return $this->getResponse(
            [
                'message' => 'Album images retrieved successfully!',
                'images' => $images
            ]
        );
    }
   

}