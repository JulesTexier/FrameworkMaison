<?php

const ROUTES = [
  'home' => [
    'controller' => App\Controller\MainController::class,
    'method' => 'index'
  ],
  'search' => [
    'controller' => App\Controller\MainController::class,
    'method' => 'get'
  ],
  'add_date' => [
    'controller' => App\Controller\AgendaController::class,
    'method' => 'add'
  ],
  'remove' => [
    'controller' => App\Controller\AgendaController::class,
    'method' => 'delete'
  ],
  'details' => [
    'controller' => App\Controller\AgendaController::class,
    'method' => 'details',
  ],
  'save' => [
    'controller' => App\Controller\MainController::class,
    'method' => 'post',
  ],

];
