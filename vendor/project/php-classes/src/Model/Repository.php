<?php

namespace CavernaGames\Model;


use \CavernaGames\DB\Sql;
use \CavernaGames\Incluse;
use \CavernaGames\Model;
use \CavernaGames\Model\Category;

class Repository extends Import
{
    
    public static function listAllCategory($category){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_products WHERE category = :category",array(
            ':category' => $category
               
        ));

     
		
        
    }



    public static function Tecnologia()
	{
		$sql = new Sql();

		return $sql->select("SELECT *
		FROM tb_ref
		WHERE desref = 'Tecnologia'");



	}
}

?>