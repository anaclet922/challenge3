<?php


namespace App\Controllers;


use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Home extends BaseController
{
    function __construct() {}
    /**
     * 
     * @return Response
     */
    public function index()
    {
       echo view('welcome_message');
    }


}