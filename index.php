<?php
session_start();
require_once ("vendor/autoload.php");
require_once ("functions.php");

use \Slim\Slim;
use \CavernaGames\Page;
use \CavernaGames\PageAdmin;
use \CavernaGames\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function () {


	$page = new Page();
	$page->setTpl("index");

});


$app->get('/admin', function () {

	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");

});


$app->get('/admin/login', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function () {

	User::login(post('deslogin'), post('despassword'));

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function () {
	User::logout();
	header("Location: /admin/login");
	exit;
});

$app->get('/admin/users', function () {
	User::verifyLogin();
	$users = User::listAll();
	$page = new PageAdmin();

	$page->setTpl("users", array (
		"users" => $users
	)
	);

});

$app->get('/admin/users/create', function () {
	User::verifyLogin();
	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->get('/admin/users/:iduser/delete', function ($iduser) {
	User::verifyLogin();
});

$app->get('/admin/users/:iduser', function ($iduser) {
	User::verifyLogin();
	$page = new PageAdmin();

	$page->setTpl("users-update");

});

$app->post('/admin/users/create', function () use ($app) {
	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset ($_POST["inadmin"])) ? 1 : 0;
	// Depuração para verificar os dados recebidos via POST
	
	$user->setData($_POST);

	// Depuração para verificar o valor do campo desperson
	$user->save();

	header("Location: /admin/users");
	exit;
});


$app->post('/admin/users/:iduser', function ($iduser) {
	User::verifyLogin();
});


$app->run();

?>