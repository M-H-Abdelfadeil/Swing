<?php
namespace Src\Handler;
class CoreHandler{

   /***
    * uri => app.com/uri
    * ex = > app.com/user/5 =>     uri = /user/5
    */
   public function get_uri(){

     $uri=  trim($_SERVER['REQUEST_URI'],"/");

     return $uri;
   }

   /*
    * Call function 
    */

    protected function call($data){
      if(!$data){
        return inc_error(404);
      }else{
        $this->call_function($data);
      }
     

    }

    private function call_function($data){
        $class=$data["class"];
        $method=$data["method"];
        
        if(!class_exists($class)){
           return $this->not_found_class($class);
        }else{
          if(!method_exists($class,$method)){
            return $this->not_found_method($class,$method);
          }else{
            call_user_func_array([$class,$method],$data["params"]);
          }
        }
    }


    private function not_found_class($class){
      $msg="Class <strong>".$class." </strong> not found ";
      return inc_error(500,$msg);
    }

    private function not_found_method($class,$method){
      $msg="This function <strong>".$method."</strong> is not found in this class ".$class;
      return inc_error(500,$msg);
    }



   
}