<?php
error_reporting(-1);
ini_set('display_errors', 1);

define('DOCROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__ .'/../app') . DIRECTORY_SEPARATOR);

require APPPATH .'bootstrap.php';

use \Slim as Slib;
use \Slim\Slim as Slim;

$config = array(
	'debug' => true,
	'log.level' => Slib\Log::DEBUG,
	'templates.path' => APPPATH .'views',
	'cookies.lifetime' => '60 minutes',
);

$app = new Slim($config);
$app->setName('schedulab');

$app->view->setData('title', $app->getName());

$app->get('/', function () use ($app) {
	$app->render('index.php');
});

$app->get('/signup', function () use ($app) {
	$app->render('signup.php');
});

$app->post('/signup', function () use ($app) {
	print_r($_POST);
});

$app->get('/hello/:name', function ($name) {
	echo "Hello, $name";
});

$app->run();