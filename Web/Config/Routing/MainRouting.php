<?php

return [
    'controller'    => \FlamingSnail\Web\Controllers\NotFoundController::class,
    'action'        => 'notFound',
    'decorator'     => \FlamingSnail\Web\Decorators\ControllerDecorator::class,
    
    
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
                    "controller"    => \FlamingSnail\Web\Controllers\AuthenticationController::class,
                    "action"        => 'login',
                    'decorator'     => \Web\Decorators\LoginDecorator::class
                ],
                
                // Register action
                [
                    "route"         => "register",
                    "method"        => "POST",
                    "controller"    => \FlamingSnail\Web\Controllers\AuthenticationController::class,
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