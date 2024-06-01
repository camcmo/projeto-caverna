<?php

namespace CavernaGames {
    use \Exception;
    use \CavernaGames\Model;
    use \CavernaGames\Model\Category;

    class Incluse extends Model {
        
        public function IncluirRota() {
            try {
                // Cria uma instância da classe Category
                $category = new Category();
            
                // Supondo que os valores vêm de um formulário ou API
                // Por exemplo:
                $idcategory = $_POST['idcategory']; // ou qualquer fonte de dados dinâmica
                $descategory = $_POST['descategory'];
                $desref = $_POST['desref'];
            
                // Define os valores da categoria
                $category->setidcategory($idcategory);
                $category->setdescategory($descategory);
                $category->setdesref($desref);
            
                // Salva a categoria e obtém o valor de descategory
                $categoryName = $this->saveCategoryAndGetDescategory($category);
            
                // Caminho para o arquivo onde a rota será adicionada
                $filePath = $_SERVER['DOCUMENT_ROOT'] . '/index.php';
            
                // Adiciona a rota ao arquivo
                $this->addRouteToFile($categoryName, $filePath);
            
                return true; // Retorna verdadeiro indicando que a rota foi adicionada com sucesso
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
                return false; // Retorna falso indicando que ocorreu um erro ao adicionar a rota
            }
        }
    }
}
?>
