<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');

$app->get('/pcs/list', 'App\Pcs\Controller\IndexController::listAction')->bind('pcs.list');
$app->get('/pcs/edit/{id}', 'App\Pcs\Controller\IndexController::editAction')->bind('pcs.edit');
$app->get('/pcs/new', 'App\Pcs\Controller\IndexController::newAction')->bind('pcs.new');
$app->post('/pcs/delete/{id}', 'App\Pcs\Controller\IndexController::deleteAction')->bind('pcs.delete');
$app->post('/pcs/save', 'App\Pcs\Controller\IndexController::saveAction')->bind('pcs.save');
