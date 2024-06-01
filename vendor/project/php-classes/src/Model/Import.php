<?php

namespace CavernaGames;

use \CavernaGames\Incluse;
use \CavernaGames\Model;

class Import extends Model
{
    public function saveCategoryAndGetDescategory($category)
    {
        return $category->save();
    }

    public function createRoute($routeName)
    {
        // Sanitiza o nome da rota para evitar caracteres especiais
        $routeName = preg_replace('/[^a-zA-Z0-9_]/', '', $routeName);

        return <<<PHP
        \$app->get("/$routeName", function() {
            \$page = new PageAdmin([
                "header" => false,
                "footer" => false
            ]);

            \$page->setTpl("forgot");
        });
        PHP;
    }

    public function addRouteToFile($routeName, $filePath)
    {
        // Gera o código da rota
        $routeCode = $this->createRoute($routeName);

        // Abre o arquivo em modo de escrita/append
        $file = fopen($filePath, 'a');

        if ($file) {
            // Escreve o código da rota no arquivo
            fwrite($file, "\n" . $routeCode . "\n");
            // Fecha o arquivo
            fclose($file);
        } else {
            // Caso o arquivo não possa ser aberto, lança um erro
            throw new Exception("Não foi possível abrir o arquivo: " . $filePath);
        }
    }
}

?>
