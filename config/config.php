<?php

return [
    // Gestion des dépendances des classes
    'dependencies' => [
        // Controllers
        'FilmController' => [
            'class' => 'FilmController',
            'requires' => ['FilmModel'],
            'path' => 'movieController.php'
        ],
        
        // Models
        'FilmModel' => [
            'class' => 'FilmModel',
            'requires' => ['TMDBService'],
            'path' => 'class/movie.php'
        ],
   
        
        // Views
        'FilmView' => [
            'class' => 'FilmView',
            'requires' => [],
            'path' => 'index.php'
        ]
    ],
    
    // Autoloader configuration
    'autoload' => [
        'directories' => [
            'controllers',
            'models',
            'services',
            'views'
        ]
    ]
];