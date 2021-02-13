<?php
namespace App\LIB;
use App\Handler\CoreHandler;
use App\Routes\Route;
class Core extends CoreHandler{
    private $data_route;
    public function __construct()
    {
       $uri=$this->get_uri();
       $data_route=$this->get_data_route($uri);
         
    }

    private function get_data_route($uri){
        $route=new Route;
        return $route->route($uri);

    }

    


}