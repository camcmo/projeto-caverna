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
    $sql = new Sql();

	$desurl = $_POST['desproduct'];
	$desurl = preg_replace('/[-\s.]/', '', $desurl);
    
    $results = $sql->select(
        'CALL sp_products_save (:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl, :category)',
        array(
            ":idproduct" => $this->getidproduct(),
            ":desproduct" => $this->getdesproduct(),
            ":vlprice" => $this->getvlprice(),
            ":vlwidth" => $this->getvlwidth(),
            ":vlheight" => $this->getvlheight(),
            ":vllength" => $this->getvllength(),
            ":vlweight" => $this->getvlweight(),
            ":desurl" => $desurl,
            ":category" => $this->getcategory()
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