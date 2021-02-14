<?php
function env($env){
    return $_ENV[$env];
}

/***
 * It is a function that makes settings automatically 
 * in the .env file
 */
function setDefaultEnv()
{
    $_ENV['DEFAULT_APP_URL']=$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
}


/*
 * 
 * It is a function that calls the view file
 * 
 */

 function view($view,$data=false){

    $view_file=path_app("View".DS.$view.".php");
    if(file_exists($view_file)){
        include($view_file);
    }else{
        $msg="This view <strong>' ".$view." ' </strong> does not exist";
        return inc_error(500,$msg);
    }
    
 }

/*
 * function include page error
 * 
 */

 function inc_error($status,$msg=false){
    return include path_app()."ErrorsView".DS.$status.".php";
}









