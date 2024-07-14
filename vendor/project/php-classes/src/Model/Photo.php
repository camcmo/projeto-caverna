<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;
use \CavernaGames\Model\Import;
use \CavernaGames\Model\Incluse;

class Photo extends Model
{
    public function recuperaImagem($idproduct)
    {
        $sql = new Sql();

        // Escapa o valor de $idproduct para prevenir SQL injection
        $idproduct = (int) $idproduct;

        // Prepare a consulta SQL com o ID diretamente na string
        $query = "SELECT url_img FROM tb_products WHERE idproduct = $idproduct";

        // Execute a consulta SQL
        $results = $sql->select($query);

        if (!empty($results)) {
            $url_img = $results[0]['url_img'];

            // Caminho completo para a pasta onde as imagens estão armazenadas localmente
            $caminho_pasta ='./res' . DIRECTORY_SEPARATOR . 'site' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products';

            // Verifica se o arquivo existe
            $caminho_completo = $caminho_pasta .DIRECTORY_SEPARATOR . $url_img;

            $caminho_completo = str_replace('\\', '/', $caminho_completo);

            // var_dump($caminho_completo);
            if (file_exists($caminho_completo)) {
                // Retorna o caminho completo para a imagem
                return $caminho_completo;
            } else {
                // Caso a imagem não seja encontrada
                return null; // ou lança uma exceção, dependendo do seu fluxo de código
            }
        } else {
            // Caso não encontre nenhum resultado para o ID especificado
            return null; // ou lança uma exceção, dependendo do seu fluxo de código
        }
    }


}
