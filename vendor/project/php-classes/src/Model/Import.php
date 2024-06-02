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
        // Sanitiza o nome da rota para evitar caracteres especiais
        $routeName = preg_replace('/[^a-zA-Z0-9_]/', '', $routeName);

        return <<<PHP
        \$app->get("/$routeName", function() {
            \$page = new PageCategory([
                "header" => false,
                "footer" => false
            ]);
    
            \$page->setTpl('$routeName');
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
            // Encontra a posição da última ocorrência do texto de busca
            $content = stream_get_contents($file);
            $lastPosition = strrpos($content, $searchString);
    
            if ($lastPosition !== false) {
                // Move o ponteiro de arquivo para a posição encontrada
                fseek($file, $lastPosition);
    
                // Lê o conteúdo após a última ocorrência de $app->run();
                $remainingContent = stream_get_contents($file);
    
                // Move o ponteiro de arquivo de volta para a posição encontrada
                fseek($file, $lastPosition);
    
                // Escreve o código da rota no arquivo
                fwrite($file, $routeCode . "\n");
    
                // Escreve o conteúdo restante de volta ao arquivo
                fwrite($file, $remainingContent);
    
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
         header("Location: /admin/categories");
         exit;


    }
    
    
    
}

?>
