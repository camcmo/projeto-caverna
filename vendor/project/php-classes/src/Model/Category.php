<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;

class Category extends Model {

	

	
	public static function listAll()
	{
		$sql = new Sql();
		
		return $sql->select('SELECT * FROM tb_categories ORDER BY descategory');

	}

	
	}
	

 ?>