<?php 

require_once("vendor/autoload.php");
require_once("functions.php");

use \Slim\Slim;
use \CavernaGames\Page;
use \CavernaGames\PageAdmin;
use \CavernaGames\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    

	$page = new Page();
	$page->setTpl("index");

});


$app->get('/admin', function() {
    

	$page = new PageAdmin();
	$page->setTpl("index");

});
// $app->get('/teste', function() {
    



// });

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {

	User::login(post('deslogin'), post('despassword'));

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function(){
	User::logout();
	header("Location: /admin/login");
	exit;
});

$app->run();

 ?>