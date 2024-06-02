<?php

namespace CavernaGames\Model;

use \CavernaGames\Incluse;
use \CavernaGames\Model;
use \CavernaGames\Model\Category;

class Import extends Category
{
    public function saveCategoryAndGetDescategory($descategoryValue)
    {
        return $this->save($descategoryValue); // Chama a função save() passando o objeto Category

    }
    

    public function createRoute($routeName)
    {

        $routeName = strval($routeName);
        var_dump($routeName);
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
    public function addRouteToFile($routeName, $filePath, $searchString)
    {
        // Gera o código da rota
        $routeCode = $this->createRoute($routeName);
    
        // Abre o arquivo em modo de leitura/escrita
        $file = fopen($filePath, 'r+');
    
        if ($file) {
            // Encontra a posição do texto de busca
            $position = strpos(stream_get_contents($file), $searchString);
    
            if ($position !== false) {
                // Move o ponteiro de arquivo para a posição encontrada
                fseek($file, $position);
    
                // Escreve o código da rota no arquivo
                fwrite($file, "\n" . $routeCode . "\n");
    
                // Fecha o arquivo
                fclose($file);
            } else {
                // Se o texto de busca não for encontrado, lança um erro
                throw new Exception("Texto de busca não encontrado no arquivo: " . $filePath);
            }
        } else {
            // Caso o arquivo não possa ser aberto, lança um erro
            throw new Exception("Não foi possível abrir o arquivo: " . $filePath);
        }
    }
    
}

?>
