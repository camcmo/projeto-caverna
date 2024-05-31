<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;

class Category extends Model {

	
	
	public static function listAll()
	{
		$sql = new Sql();
		
		return $sql->select('SELECT *
		FROM tb_categories
		INNER JOIN tb_ref ON tb_categories.descategory = tb_ref.descategory
		ORDER BY tb_categories.idcategory;
		');

	}
	public function save(){
		$sql = new Sql();

		$results = $sql->select('CALL sp_categories_save (:idcategory, :descategory, :desref)', array(
			":idcategory" => $this->getidcategory(),
			":descategory" => $this->getdescategory(),
			":desref" => $this->getdesref(),
	
		));

		$this->setData($results[0]);

	
	}
	public function get($idcategory){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory",[
			':idcategory'=>$idcategory
		]);

		$this->setData($results[0]);


	}
	public function delete(){
		$sql = new Sql();
		$results = $sql->select('CALL DeleteCategoriesAndRef');
	}

	public static function Tecnologia(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Tecnologia'");

		
		
	}
	
	}
		

 ?>