<?php
namespace App\Controllers;
use App\Models\TestModel;
class TestController {
    
    public function test($id){
        $data=TestModel::test_model($id);
        return view('test/test-view',$data);
    }


    public function index(){
        return view('index');
    }
}