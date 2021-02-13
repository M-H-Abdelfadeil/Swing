<?php
function env($key){
    return $_ENV[$key];
}

 function setDefaultEnv()
{
    $_ENV['DEFAULT_APP_URL']=$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
}