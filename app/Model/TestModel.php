<?php
namespace App\Model;
class TestModel{
    public function test_model($id){
        // get array from database
        return[
            "name"=>"mahmoud abdelfadeil",
            "age" => 23,
            "id" =>$id,
        ];
    }
}