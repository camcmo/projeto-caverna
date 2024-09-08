<?php
session_start();
require_once ("vendor/autoload.php");
require_once ("functions.php");

use \Slim\Slim;
use \CavernaGames\Page;
use \CavernaGames\PageCategory;
use \CavernaGames\PageAdmin;
use \CavernaGames\Model;
use \CavernaGames\Model\User;
use \CavernaGames\Model\Category;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;
use \CavernaGames\Model\Products;
use \CavernaGames\Model\Promo;
use \CavernaGames\Model\Cupom;
use \CavernaGames\Model\Photo;
use \CavernaGames\Model\Repository;

$app = new Slim();

$app->config('debug', true);

//criar require_once e organizar o código
$app->get("/", function(){


    $tecnologia = Category::Tecnologia();
	$cartas = Category::Cartas();
	$colecionaveis = Category::Colecionaveis();
	$jogos = Category::Jogos();
	$presentes = Category::Presentes();
	$eventos = Category::Eventos();
	$alimenticios = Category::Alimenticios();
	


    $page = new Page();
	
    $page->setTpl("header", [
        'tecnologia' => $tecnologia,
		'cartas'=> $cartas,
		'jogos'=> $jogos,
		'presentes'=> $presentes,
		'eventos'=> $eventos,
		'alimenticios'=>$alimenticios,
		'colecionaveis' => $colecionaveis
		
    ]);
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

$app->post("/admin/users/create", function () {

	User::verifyLogin();

   $user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

		"cost"=>12

	]);

	$user->setData($_POST);

   $user->save();

   header("Location: /admin/users");
	exit;

});



$app->get('/admin/users/:iduser/delete', function ($iduser) {
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);
	$user->delete();
	header("Location: /admin/users");
	exit;
});

$app->get('/admin/users/:iduser', function ($iduser) {


	User::verifyLogin();

	$user = new User();
	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=> $user->getValues()
	));

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

	$user = new User();

	$user->get((int)$iduser);

	$user->setData($_POST);
	
	$user->update();

	header("Location: /admin/users");
	exit;
});

$app->get("/admin/forgot", function()
{
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("forgot");
});


$app->post('/admin/forgot', function()
{
	
	$user = User::getForgot($_POST['email']);

	
	header("Location: /admin/forgot/sent");
	exit;

});

$app->get("/admin/forgot/sent", function(){
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	
	$page->setTpl("forgot-sent");
});

$app->get("/admin/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	
	$page->setTpl("forgot-reset", array(
		"name" => $user["desperson"],
		"code"=>$_GET["code"]
	));
});


$app->post("/admin/forgot/reset", function(){
	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();


	$user->get((int)$forgot["iduser"]);

	$password =  password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost" => 12
	]);

	$user->setPassword($password);
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	
	$page->setTpl("forgot-reset-success");
	

});


$app->get("/admin/categories", function(){
	User::verifyLogin();

	$categories = Category::listAll();
	$page = new PageAdmin();
	
	$page->setTpl("categories",[
		'categories'=> $categories
	]);

});
$app->get("/admin/categories/tecnologia", function(){
	User::verifyLogin();

	$tecnologia = Category::Tecnologia();
	$page = new PageAdmin();
	
	$page->setTpl("tecnologia",[
		'tecnologia'=> $tecnologia 
	]);

});

$app->get("/admin/categories/cartas", function(){
	User::verifyLogin();

	$cartas = Category::Cartas();
	$page = new PageAdmin();
	
	$page->setTpl("cartas",[
		'cartas'=> $cartas 
	]);

});

$app->get("/admin/categories/colecionaveis", function(){
	User::verifyLogin();

	$colecionaveis = Category::Colecionaveis();
	$page = new PageAdmin();
	
	$page->setTpl("colecionaveis",[
		'colecionaveis'=> $colecionaveis
	]);

});
$app->get("/admin/categories/jogos", function(){
	User::verifyLogin();

	$jogos = Category::Jogos();
	$page = new PageAdmin();
	
	$page->setTpl("cartas",[
		'jogos'=> $jogos 
	]);

});
$app->get("/admin/categories/presentes", function(){
	User::verifyLogin();

	$presentes = Category::Presentes();
	$page = new PageAdmin();
	
	$page->setTpl("presentes",[
		'presentes'=> $presentes
	]);

});
$app->get("/admin/categories/eventos", function(){
	User::verifyLogin();

	$eventos = Category::Eventos();
	$page = new PageAdmin();
	
	$page->setTpl("eventos",[
		'eventos'=> $eventos 
	]);

});
$app->get("/admin/categories/alimenticios", function(){
	User::verifyLogin();

	$alimenticios = Category::Cartas();
	$page = new PageAdmin();
	
	$page->setTpl("alimenticios",[
		'alimenticios'=> $alimenticios
	]);

});


$app->get("/admin/categories/create", function(){
	User::verifyLogin();

	$page = new PageAdmin();
	
	$page->setTpl("categories-create");

});


$app->post("/admin/categories/create" , function(){
	User::verifyLogin();

	$category = new Category();
	$category->setData($_POST);
	$category->save();
	

	$descat = $_POST['descategory'];
	$categorycx = new Incluse();
	$categorycx->IncluirHTML($descat,$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . 'categories');

	$categoryc = new Import();
	$categoryc->createRoute($descat);
	$categoryc->addRouteToFile($descat, $_SERVER['DOCUMENT_ROOT'] . "/index.php", "\$app->run();");
	
	exit;
});


$app->get("/admin/categories/:idcategory/delete", function($idcategory){
	User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);
	$category->delete();
	header("Location: /admin/categories");
	exit;
});

$app->get("/admin/categories/:idcategory", function($idcategory){
	User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);
	$page = new PageAdmin();
	
	$page->setTpl("categories-update", [
		'category' =>$category->getValues()
	]);
});

$app->post("/admin/categories/:idcategory", function($idcategory){
	User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);
	$category->setData($_POST);
	$category->save();
	header("Location: /admin/categories ");
	exit;
});
   

$app->get('/admin/products', function () {
	User::verifyLogin();

	$products = Products::listAll();
	$page = new PageAdmin();

	$page->setTpl("products",[
		"products"=> $products
	]);

	
});
$app->get('/admin/products/create', function () {
	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("products-create", [
		"categories" => $categories
	]);

	
});
$app->post('/admin/products/create', function () {
	User::verifyLogin();

	$page = new PageAdmin();

	$products = new Products();
	$products->setData($_POST);
	
	$products->save();
	
	header("Location: /admin/products" );
	exit;
	


	
});
$app->get('/admin/products/:idproduct', function ($idproduct) use ($app) {

    User::verifyLogin();

    // Instancia o modelo de Produto
    $product = new Products();
    $product->get((int)$idproduct);

    // Instancia o modelo de Foto
    $photo = new Photo();
    $url_imagem = $photo->recuperaImagem((int)$idproduct);

    // Instancia a página administrativa
    $page = new PageAdmin();

	// var_dump($url_imagem);
    // Passa os valores para o template
    $page->setTpl("products-update", [
        'product' => $product->getValues(),
        'url_imagem' => $url_imagem // Passa o caminho da imagem recuperada
    ]);
	

});


$app->post('/admin/products/:idproduct', function ($idproduct) {

	User::verifyLogin();

	$product = new Products();
	$product->get((int)$idproduct);
	var_dump($product);
	$product->setData($_POST);
	$product->save();

	
	
	header('Location: /admin/products');
	exit;

});

$app->get('/admin/products/:idproduct/delete', function ($idproduct) {
	User::verifyLogin();

	$product = new Products();

	$product->get((int)$idproduct);
	$product->delete();
	
	header('Location: /admin/products');
	exit;
});

$app->get('/admin/products/descontos', function () {
	User::verifyLogin();

	$page = new PageAdmin();
	$promo = new Promo();
	$promo = Promo::listAll();

	$page->setTpl("descontos", [
		"promocoes" => $promo
	]);
	
	

	
});

$app->get('/admin/products/descontos/create', function () {
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("descontos-create");

	
});

$app->post('/admin/products/descontos/create', function () {
	User::verifyLogin();

	$page = new PageAdmin();

	$promo = new Promo();

	$promo->setData($_POST);
	$promo->save();
	header("Location: /admin/products/descontos");
	exit;

	
});

$app->get('/admin/products/descontos/vincular', function () {
	User::verifyLogin();

	$page = new PageAdmin();
	$products = Products::listAll();
	$promocoes = Promo::listAll();

	$page->setTpl("descontos-vinc", [
		"products"=> $products,
		"promocoes"=> $promocoes
	]);

	
});
$app->post('/admin/products/descontos/vincular', function () {
	User::verifyLogin();

	$page = new PageAdmin();
	
	$promo = new Promo();

	$promo->setData($_POST);
	$promo->vincular();
	header("Location: /admin/products/descontos");
	exit;

	
});
$app->get('/admin/products/descontos/vinculados', function () {
	User::verifyLogin();

	$page = new PageAdmin();
	$promo = new Promo();
	$promo = Promo::listAllVinc();


	$page->setTpl("descontos-vinculados", [
		"promocoes" => $promo
	]);
	

	

	
});

$app->get('/admin/products/cupons', function () {
	User::verifyLogin();

	$page = new PageAdmin();
	$cupom = new Cupom();
	$cupom = Cupom::listAll();


	$page->setTpl("descontos-cupons", [
		"promocoes" => $cupom
	]);
	

	

	
});

  

    $app->get("/Xbox", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    
        $page = new PageCategory();
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis
        ]);
        $page->setTpl('Xbox');
    });
    $app->get("/Fones", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    
        $page = new PageCategory();
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis
        ]);
        $page->setTpl('Fones');
    });
    $app->get("/Naruto", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    

		
		$category = "Naruto";
		$filter = Repository::listAllCategory($category);
		// var_dump($filter);
        $page = new PageCategory();
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis,
			'categories' => $filter
        ]);
        $page->setTpl('Naruto');
    });
    $app->get("/OnePiece", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    
        $page = new PageCategory();
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis
        ]);
        $page->setTpl('OnePiece');
    });
    $app->get("/DragonBall", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    
        $page = new PageCategory();
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis
        ]);
        $page->setTpl('DragonBall');
    });
 
    $app->get("/Funko%20POP", function() {
        $tecnologia = Category::Tecnologia();
        $cartas = Category::Cartas();
        $colecionaveis = Category::Colecionaveis();
        $jogos = Category::Jogos();
        $presentes = Category::Presentes();
        $eventos = Category::Eventos();
        $alimenticios = Category::Alimenticios();
    
        $page = new PageCategory();

		$filter = new Repository();
		$category = "Funko POP";
		$filter->listAllCategory($category);

		
        $page->setTpl("header", [
            'tecnologia' => $tecnologia,
            'cartas'=> $cartas,
            'jogos'=> $jogos,
            'presentes'=> $presentes,
            'eventos'=> $eventos,
            'alimenticios'=> $alimenticios,
            'colecionaveis' => $colecionaveis
        ]);

		
        $page->setTpl('Funko POP', [
			"categories" => $filter
		]);
    });

	
	
$app->run();
?>
