<?php

namespace CavernaGames\Model {
   
    
    use \CavernaGames\Model;
    use \CavernaGames\Model\Category;
    use \CavernaGames\Model\Import;

    class Incluse extends Model {
        
        public  function IncluirHTML($routeName, $pasta) {
            $caminho = $pasta . '/' .$routeName.'.html';

            $arquivo = fopen($caminho, 'w');


            $conteudoHTML = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='style-cat.css'>
                <title>{$routeName} - Document</title>
            </head>
            <body>
                <header>
                    <h1>{$routeName}</h1>
                </header>
                <nav>
                    <ul>
                        <li><a href='#'>Página Inicial</a></li>
                        <li><a href='#'>Sobre</a></li>
                        <li><a href='#'>Contato</a></li>
                    </ul>
                </nav>
                <section>
                    <article>
                        <h2>Título do Artigo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ligula eget odio posuere consectetur.</p>
                    </article>
                </section>
                <footer>
                    <p>&copy; 2024 Todos os direitos reservados.</p>
                </footer>
            </body>
            </html>
            ";
            
            if($arquivo){
                fwrite($arquivo, $conteudoHTML);

                fclose($arquivo);

                echo "html gerado com sucesso";
            }else{
                throw new \Exception("Não foi possível criar o arquivo HTML". $caminho);
            }
        }
    }
}
?>
