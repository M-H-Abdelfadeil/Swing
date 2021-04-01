<?php
return

[
    // Example Route

    //"route"=>"Class@function",
    "test/{id}"=>"App\Controllers\TestController@test",
    "/"=>"App\Controllers\TestController@index",



    "groups"=>[

        /*
        ## Example Route Group
        ## prefix => user/add 
        "1"=>[
            "namespace"=>"App\UserController",
            "prefix"=>"user",
            "routes"=>[
                "add"=>"UserController@add"
            ]
        ],

        */
    ],

];