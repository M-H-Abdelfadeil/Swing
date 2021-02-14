<?php
include "vendor/autoload.php";
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
setDefaultEnv();
new App\LIB\Core;