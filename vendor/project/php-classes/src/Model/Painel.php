<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;


class Painel extends Model{


    public static function listAll(){

        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_painel ORDER BY idgamer');

    }

    public function save()
{
    $sql = new Sql();

	$results = $sql->select(
        'INSERT INTO tb_painel VALUES (:idgamer, :usergamer, :email)',
        array(
            ":idgamer" => $this->getidgamer(),
            ":usergamer" => $this->getusergamer(),
            ":email" => $this->getemail(),
           
        )
    );
    
    $this->setData($results[0]);
}


    public function newgamer(){

    }


}


?>