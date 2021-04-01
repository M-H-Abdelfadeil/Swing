<?php
namespace Src\Handler;

class RouteHandler{
  private $routes;
    public function route($url)
    {
       
       $this->routes=$this->get_routes();
  
        if($this->is_found_route($url)){
           $route= $this->is_found_route($url);
            return $route;
        }else{
            return false;
        }    
    }

    public function get_routes_groups(){ 

        $routes_groups=[];
        if(isset($this->routes["groups"])){
            $routes_groups= $this->set_routes_groups($this->routes["groups"]);
        } 
        return $routes_groups;
    }

    private function set_routes_groups($groups){ 
       
        $routes_groups=[];
        foreach($groups as $group){

            foreach(array_keys($group['routes']) as $route_url){
                $controller= $group['routes'][$route_url];
                if(isset($group['prefix'])){
                    $url=trim($group['prefix'],"/")."/".$route_url;
                }else{
                    $url=$route_url;
                }
               
                if(isset($group['namespace'])){
                    $controller=trim( $group['namespace'],"\\")."\\".$controller;
                }else{
                    $controller=$controller;
                }
                $routes_groups[$url]=$controller;
            }
        }

        return  $routes_groups;
        
        
    }



    /***
     * 
     * Check whether params are present or not
     * argument =>($route)
     * retrun array (numbers params)
     */

    private function is_params($route){
        $el_route=explode('/',$route);// elemnts rout => el_route
        $index_params=[];
        for($i=0; $i<count($el_route) ; $i++){
          $first_char = substr( $el_route[$i],0,1);
          $last_char  = substr( $el_route[$i],-1,1);
            if($first_char=="{" && $last_char=="}"){
                array_push($index_params,$i)  ;
            }
        }   
        
        return $index_params ;   
    }


    /***
     * 
     * Check whether this route exists or not
     * argument required => ($url,$param)
     * 
     * return data route Or null
     * 
     */
    private function is_found_route($url){
        
        $routes_data=$this->data_routes_all();
      
        
        $routes=array_keys($routes_data);
        foreach($routes as $route){ 

           $el_url=explode("/",trim($url,"/"));
           $el_route=explode('/',trim($route,"/"));
           $index_params=$this->is_params($route);
           $controller=$routes_data[$route];

            if($index_params){
               if(count($el_route)==count($el_url)){
                    $el_url=array_diff_key($el_url,array_flip($index_params));
                    $el_route=array_diff_key($el_route,array_flip($index_params));
                    if($el_url== $el_route){ 
                        return $this->data_route($route,$controller,$url,$index_params);
                    }
                }

            }else{

                if($el_url== $el_route){

                    return $this->data_route($route, $controller);
                }
            }
        }
        
    }


    /**
     * **
     * data route (class --- methods --- params[array] )
     * 
     * return array [
     *  "class"=>value,
     *  "method"=>value,
     *  "params"=>array[param 1 , param 2 , param 3 .......]
     * ]
     */

    private function data_route($route,$controller,$url=false,$index_params=[]){
        
        if($url){
            $el_url=explode("/",trim($url,"/"));
            $params=$el_url=array_intersect_key($el_url,array_flip($index_params));
        }else{
            $params=[];
        }
        $data_controller=$this->data_controller($controller);
        return[
            "class"=> $data_controller["class"],
            "method"=> $data_controller["method"],
            "params"=>$params
        ];
    }

    /**
     * 
     *  data_controller 
     *  return [
     *  "class" = > value,
     *  "method" = > value
     * ]
     * 
     */
    private function data_controller($data_controller){
        
        $data=explode('@',$data_controller);
        return  [
            "class"=>$data[0],
            "method"=>end($data)
        ];
    }


    /**
     * 
     * return all routes
     */

    private function data_routes_all(){
        $routes_non_groups=$this->routes;
        unset($routes_non_groups["groups"]);
        $routes_groups=$this->get_routes_groups();
        $routes_data=array_merge($routes_non_groups, $routes_groups);
        return  $routes_data;
    }
}