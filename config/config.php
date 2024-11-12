<?php 

return [
    'dependencies' => [
        'AuthController' => [
            'class' => 'AuthController',
            'requires' => ['UserModel'],
            'path' => 'controllers/AuthController.php'
        ],
        
        'UserModel' => [
            'class' => 'UserModel',
            'requires' => [],
            'path' => 'models/UserModel.php'
        ]
    ],
    
    'autoload' => [
        'directories' => [
            'class',
            'services',
        ]
    ]
];

?>