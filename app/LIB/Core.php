<?php
namespace App\LIB;
use App\Handler\CoreHandler;
use App\Routes\Route;
class Core extends CoreHandler{
    private $uri;
    public function __construct()
    {
       $this->uri=$this->get_uri();
       $data_route=$this-> get_data_route();
       $this->call($data_route);
       
    }

    private function get_data_route(){
        $route=new Route;
        return  $route->route($this->uri);
    }

    



    


}