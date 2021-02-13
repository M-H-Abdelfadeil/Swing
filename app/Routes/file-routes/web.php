<?php
return

[

    "user/{id}/exam/{exam}"=>"App\Controller\UserController@test",
    "test/test/{id}"=>"App\Controller\UserController@test_2",
    "products/{id}"=>"App\Controller\UserController@test",



    "groups"=>[

        "1"=>[
            "namespace"=>"App\Controller",
            "prefix"=>"pre-test",
            "routes"=>[
                "group/{id}/exam/{id_exam}"=>"UserController@test"
            ]
        ],
        "2"=>[
            "namespace"=>"App\Controller\Main",
            "routes"=>[
                "group-2/{id}/test/{id}"=>"HomeController@test",
                "test-2/group-2"=>"HomeController@test",
            ]
        ]
    ],

];