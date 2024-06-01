<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;

class Category extends Model {

	
	
	// public static function listAll()
	// {
	// 	$sql = new Sql();

	// 	$idref = $sql->select("SELECT tb_ref.idref FROM tb_ref");

		
	// 	return $sql->select('SELECT tb_ref.descategory, tb_ref.desref FROM tb_ref WHERE idref = :idref',array(
	// 		'idref'=> $idref
	// 	));
		
		

	// }
	public static function listAll()
{
    $sql = new Sql();

    return $sql->select('SELECT tb_ref.idref AS idcategory, tb_ref.descategory, tb_ref.desref FROM tb_ref ORDER BY tb_ref.desref');
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
	public function get($idref){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_ref WHERE idref = :idref",[
			':idref'=>$idref
		]);

		$this->setData($results[0]);


	}
	public function delete(){
		$sql = new Sql();
		$sql->query('DELETE FROM tb_ref WHERE idref = 	:idref',[
			':idref'=> $this->getidref()]);
	}

	public static function Tecnologia(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Tecnologia'");

		
		
	}
	public static function Cartas(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Cartas de Magic'");

		
		
	}
	public static function Colecionaveis(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Colecionáveis'");

		
		
	}
	public static function Jogos(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Jogos'");

		
		
	}
	public static function Presentes(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Presentes'");

		
		
	}
	public static function Eventos(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Eventos'");

		
		
	}
	public static function Alimenticios(){
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Alimentícios'");

		
		
	}
	
	}
		

 ?>