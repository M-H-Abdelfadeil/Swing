<?php
namespace Src\Routes;
use Src\Handler\RouteHandler;
class Route extends RouteHandler{

     

    private  $set_routes=[
        // "path"
        "user",
        "dashboard",
        "api"
    ];

    private $all_routes=[];


    // get all routes in file-routes
    public function get_routes(){

        foreach($this->set_routes as $route){
           
            $routes=include("routes/".$route.".php");
            
            $this->all_routes=array_merge($this->all_routes,$routes);
           
        } 
       

        return $this->all_routes;
    }
}