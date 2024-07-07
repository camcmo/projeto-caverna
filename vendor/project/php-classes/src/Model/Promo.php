<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;


class Promo extends Model{


    public static function listAll(){

        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_promo ORDER BY despromo');

    }

    public static function listAllVinc(){

        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_vinc ORDER BY cod_prod');

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

public function vincular() {
    $sql = new Sql();

    // Obtém os arrays de cod_prod e cod_promo
    $cod_prod = $this->getcod_prod();
    $cod_promo = $this->getcod_promo();



    // // Converte arrays em strings separadas por vírgulas
    $cod_prod_str = implode(',', $cod_prod);
    $cod_promo_str = implode(',', $cod_promo);

    var_dump($cod_prod_str);

    $results = $sql->select(
        'CALL sp_promo_vinc (:id_vinc, :cod_prod, :cod_promo)',
        array(
            ":id_vinc" => $this->getid_vinc(),
            ":cod_prod" => $cod_prod_str,
            ":cod_promo" => $cod_promo_str
        )
    );

    // Define os dados após a execução do procedimento armazenado
    if (!empty($results)) {
        $this->setData($results[0]);
    }
}

}


?>