<?php
namespace App\Controller;
use App\Model\TestModel;
class TestController {
    
    public function test($id){
        $data=TestModel::test_model($id);
        return view('test/test-view');
    }
}