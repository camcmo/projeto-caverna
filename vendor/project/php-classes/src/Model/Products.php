<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;

class Products extends Model
{


	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select('SELECT * FROM tb_products ORDER BY desproduct');
	}

	

	public function save()
	{
		$descategory = $this->getdescategory();
		
	
		$sql = new Sql();
	
		$results = $sql->select(
			'CALL sp_products_save (:idproduct, :desproduct, :vlprice, :vlwidth, :vlheigth, :vllength, :desurl, :vlweight)',
			array(
				":idproduct" => $this->getidproduct(),
				":desproduct" => $this->getdesproduct(), // Usando a variável aqui
				":vlprice" => $this->getvlprice(),
				":vlwidth" => $this->getvlwidth(),
				":vlprice" => $this->getvlprice(),
				":vlwidth" => $this->getvlwidth(),
				":vlheigth" => $this->getvlheigth(),
				":vllength" => $this->getvllength(),
				":desurl" => $this->getdesurl(),
				":vlweigth" => $this->getvlweigth(),







				)
		);
	
		$this->setData($results[0]);
    
		$descategoryValue = $results[0]['descategory']; // Armazena o valor de descategory em uma variável
		
		return $descategoryValue; // Retorna apenas o valor de descategory como uma string
	}
	



	public function get($idref)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_ref WHERE idref = :idref", [
			':idref' => $idref
		]);

		$this->setData($results[0]);


	}
	public function delete()
	{
		$sql = new Sql();
		$sql->query('DELETE FROM tb_ref WHERE idref = 	:idref', [
			':idref' => $this->getidref()
		]);
	}

	public static function Tecnologia()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Tecnologia'");



	}
	public static function Cartas()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Cartas de Magic'");



	}
	public static function Colecionaveis()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Colecionáveis'");



	}
	public static function Jogos()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Jogos'");



	}
	public static function Presentes()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Presentes'");



	}
	public static function Eventos()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Eventos'");



	}
	public static function Alimenticios()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Alimentícios'");



	}


}


?>