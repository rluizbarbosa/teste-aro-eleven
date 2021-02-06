<?php 
define('__DIR_PRINCIPAL__', "/teste");

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/system/functions.php';

$app = new \Slim\App();

$app->group('/' ,function() use ($app){

	$app->get('', 			'\Teste\Controllers\HomeController:see');

	$app->get('create', 	'\Teste\Controllers\HomeController:create');
	$app->post('create', 	'\Teste\Controllers\ScheduleController:create');

	$app->get('edit',		'\Teste\Controllers\HomeController:edit');
	$app->post('edit', 		'\Teste\Controllers\ScheduleController:edit');

	$app->post('delete',	'\Teste\Controllers\ScheduleController:delete');
});

$app->run();