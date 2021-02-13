<?php
namespace App\Routes;
use App\Handler\RouteHandler;
class Route extends RouteHandler{

     

    private  $set_routes=[
        // "path"
        "web",
        "dashboard"

    ];

    private $all_routes=[];


    // get all routes in file-routes
    public function get_routes(){

        foreach($this->set_routes as $route){
           
            $file_routes=include("file-routes/".$route.".php");
            $this->all_routes=array_merge($this->all_routes,$file_routes);
           
        } 
       

        return $this->all_routes;
    //    echo "<pre>";
    //    print_r($this->routes);
    }
}