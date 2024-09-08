<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;


class Cupom extends Model{


    public static function listAll(){

        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_promo ORDER BY despromo');

    }

    public function save()
{
    $sql = new Sql();

	$results = $sql->select(
        'CALL sp_promo_save (:idpromo, :despromo, :datainicio, :datafim, :percentual)',
        array(
            ":idpromo" => $this->getidpromo(),
            ":despromo" => $this->getdespromo(),
            ":datainicio" => $this->getdatainicio(),
            ":datafim" => $this->getdatafim(),
            ":percentual" => $this->getpercentual(),
           
        )
    );
    
    $this->setData($results[0]);
}



}


?>