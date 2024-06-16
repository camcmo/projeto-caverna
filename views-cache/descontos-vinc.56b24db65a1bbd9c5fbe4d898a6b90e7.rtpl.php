<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculação de Produtos e Categorias</title>
    <link rel="stylesheet" href="/res/admin/css/vinc.css">
</head>
<body>

<div class="container">
    <div class="list">
        <h3>Produtos</h3>
        <select id="produtos" size="10" multiple>
            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
            <option value="produto"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="buttons">
        <button onclick="vincular()">➔</button>
        <button onclick="desvincular()">←</button>
    </div>
    <div class="list">
        <h3>Promoções</h3>
        <select id="categorias" size="10" multiple>
            <?php $counter1=-1;  if( isset($promocoes) && ( is_array($promocoes) || $promocoes instanceof Traversable ) && sizeof($promocoes) ) foreach( $promocoes as $key1 => $value1 ){ $counter1++; ?>
            <option value="categoria"><?php echo htmlspecialchars( $value1["despromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            
            <?php } ?>
        </select>
    </div>
</div>

<script>
    function vincular() {
        var produtos = document.getElementById('produtos');
        var categorias = document.getElementById('categorias');

        for (var i = 0; i < produtos.options.length; i++) {
            if (produtos.options[i].selected) {
                var opt = produtos.options[i];
                categorias.add(new Option(opt.text, opt.value));
                produtos.remove(i);
                i--; // Adjust the index after removing an option
            }
        }
    }

    function desvincular() {
        var produtos = document.getElementById('produtos');
        var categorias = document.getElementById('categorias');

        for (var i = 0; i < categorias.options.length; i++) {
            if (categorias.options[i].selected) {
                var opt = categorias.options[i];
                produtos.add(new Option(opt.text, opt.value));
                categorias.remove(i);
                i--; // Adjust the index after removing an option
            }
        }
    }
</script>

</body>
</html>
