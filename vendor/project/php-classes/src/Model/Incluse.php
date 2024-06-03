<?php

namespace CavernaGames\Model {


    use \CavernaGames\Model;
    use \CavernaGames\Model\Category;
    use \CavernaGames\Model\Import;

    class Incluse extends Model
    {

        public function IncluirHTML($routeName, $pasta)
        {
            $caminho = $pasta . '/' . $routeName . '.html';

            $arquivo = fopen($caminho, 'w');


            $conteudoHTML = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='style-cat.css'>
                <title>Caverna Games -{$routeName}</title>
            </head>
            <body>
            <style>

                .page-dimension img{
                 margin-top: 150px;
                width: 65%;
                margin-bottom: 80px;
        
                }
                 .page-dimension{
                  display: flex;
                justify-content: center;
        
                         }
                </style>
                <h1>{$routeName}</h1>
                <div class='page-dimension'>
                <img src='/res/site/img/page.png' alt='Page' id='page' class='page' />
            
            </div>
            </body>
            </html>
            ";

            if ($arquivo) {
                fwrite($arquivo, $conteudoHTML);

                fclose($arquivo);

                echo "html gerado com sucesso";
            } else {
                throw new \Exception("Não foi possível criar o arquivo HTML" . $caminho);
            }
        }
    }
}
?>