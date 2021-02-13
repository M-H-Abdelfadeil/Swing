<?php
namespace App\LIB;
use App\LIB\CoreHandeler;
class Core extends CoreHandeler{
    public function __construct()
    {
        $this->get_uri();
    }
}