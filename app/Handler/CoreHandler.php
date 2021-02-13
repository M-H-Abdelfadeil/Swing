<?php
namespace App\Handler;
class CoreHandler{

   /***
    * uri => app.com/uri
    * ex = > app.com/user/5 =>     uri = /user/5
    */
   public function get_uri(){

     $uri=  trim($_SERVER['REQUEST_URI'],"/");

     return $uri;
   }

   
}