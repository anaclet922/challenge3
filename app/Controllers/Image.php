<?php


namespace App\Controllers;


// use App\Models\ImageModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Image extends BaseController
{
    function __construct() {
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    }
    /**
     * 
     * @return Response
     */
    public function getAlbum(){

        $albumId = $_GET['album_id'];

       
        // $model = new ImageModel();
        // $images = json_encode($model->where('AlbumId', $albumId)->findAll());


        ######### Call from placeholder's endpoint using cURL ###########
        
        $url = "https://jsonplaceholder.typicode.com/albums/" . $albumId . "/photos";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $images = curl_exec($ch);
        curl_close($ch);
        
        $response = array();

        //Filter Only Title and ThumbnailUrl
        foreach (json_decode($images, true) as $image) {
            $n = array(
                'title' => $image['title'],
                'thumbnailUrl' => $image['thumbnailUrl']
            );
            array_push($response, $image);
        }


        return $this->getResponse(
            [
                'message' => 'Album images retrieved successfully!',
                'images' => $response
            ]
        );
    }
   

}