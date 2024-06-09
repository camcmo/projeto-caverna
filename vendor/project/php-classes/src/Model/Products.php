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
    
		
	}
	



	public function get($idproduct)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", [
			':idproduct' => $idproduct
		]);

		$this->setData($results[0]);


	}
	public function delete()
	{
		$sql = new Sql();
		$sql->query('DELETE FROM tb_products WHERE idproduct = 	:idproduct', [
			':idproduct' => $this->getidproduct()
		]);
	}




}


?>