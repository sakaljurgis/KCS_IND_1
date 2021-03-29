<?php

return [
    '/visitors' => [
        'method' => 'get',
        'class' => \KCS\Controller\VisitorController::class,
        'action' => 'index',
    ],
    '/visitors/{id}' => [
        'method' => 'get',
        'class' => \KCS\Controller\VisitorController::class,
        'action' => 'show',
    ]
];
