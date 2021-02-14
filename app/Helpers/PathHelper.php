<?php
define('DS',DIRECTORY_SEPARATOR);
function path_app($path=null){

    return $_SERVER['DOCUMENT_ROOT'].DS."app".DS.$path;
}

function path_public($path=null){

    return $_SERVER['DOCUMENT_ROOT'].DS."public".DS.$path;
}




