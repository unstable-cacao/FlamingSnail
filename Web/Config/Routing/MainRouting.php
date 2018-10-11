<?php

return [
    'controller'    => \FlamingSnail\Controllers\NotFoundController::class,
    'action'        => 'notFound',
    
    
    // try to match one of the children
    'include' => 
    [
        // All ajax requests
        [
            'ajax' => true,
            
            'require' =>
            [
                // Login action
                [
                    "route"         => "login",
                    "method"        => "POST",
                    "controller"    => \FlamingSnail\Controllers\AuthenticationController::class,
                    "action"        => 'login'
                ],
                
                // Register action
                [
                    "route"         => "register",
                    "method"        => "POST",
                    "controller"    => \FlamingSnail\Controllers\AuthenticationController::class,
                    "action"        => 'register'
                ]
            ]
        ],
        
        // Other
        [
            "route" => "*"
        ]
    ]
];