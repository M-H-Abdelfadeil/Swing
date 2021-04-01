<?php
define('DS',DIRECTORY_SEPARATOR);
function path_app($path=null){

    return $_SERVER['DOCUMENT_ROOT'].DS."app".DS.$path;
}

function path_public($path=null){

    return env('DEFAULT_APP_URL').DS."public".DS.$path;
}

function path_src($path=null){

    return $_SERVER['DOCUMENT_ROOT'].DS."src".DS.$path;
}




