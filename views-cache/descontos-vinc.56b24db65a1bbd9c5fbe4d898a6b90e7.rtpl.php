<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculação de Produtos e Categorias</title>
    <link rel="stylesheet" href="/res/admin/css/vinc.css">
</head>

<body>

    <style>
        #submit{
            background-color: rgb(43, 41, 41);
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .lists-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .list {
            width: 45%;
            /* Ajuste conforme necessário */
        }

        .buttons {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
            /* Espaçamento entre os botões e as listas */
        }

        .linked-list {
            width: 45%;
            /* Ajuste conforme necessário */
            margin-top: 20px;
            /* Espaçamento do topo */
        }

        .submit {
            width: 100%;
            margin-top: 20px;
            /* Espaçamento do topo */
        }

        ul {
            padding: 0;
            list-style-type: none;
        }
    </style>
    <div class="container">
        <div class="list">
            <h3>Produtos</h3>
            <select id="produtos" size="10" multiple>
                <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                <option value="<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
                <option value="<?php echo htmlspecialchars( $value1["despromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cod_promo"><?php echo htmlspecialchars( $value1["despromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>

                <?php } ?>
            </select>

        </div>

    </div>
    <div>
        <div class="linked-list">
            <h3>Vínculos Realizados</h3>
            <ul id="linked-promotions"></ul>
        </div>
        <div class="submit">
            <form action="/admin/products/descontos/vincular" method="POST" id="vinculacoes-form">
                <div id="hidden-inputs"></div>
                <button type="submit" id="submit">Gravar</button>
            </form>
        </div>
    </div>

    <script>
        function vincular() {
            var produtos = document.getElementById('produtos');
            var categorias = document.getElementById('categorias');
            var linkedList = document.getElementById('linked-promotions');
            var hiddenInputs = document.getElementById('hidden-inputs');

            var selectedProducts = [];
            var selectedPromotions = [];

            // Get selected products
            for (var i = 0; i < produtos.options.length; i++) {
                if (produtos.options[i].selected) {
                    selectedProducts.push(produtos.options[i]);
                }
            }

            // Get selected promotions
            for (var j = 0; j < categorias.options.length; j++) {
                if (categorias.options[j].selected) {
                    selectedPromotions.push(categorias.options[j]);
                }
            }

            // Create list items and hidden inputs for each product-promotion pair
            selectedProducts.forEach(function (prod) {
                selectedPromotions.forEach(function (promo) {
                    // Add to linked list
                    var listItem = document.createElement('li');
                    listItem.textContent = prod.text + " - " + promo.text;
                    listItem.dataset.prodValue = prod.value;
                    listItem.dataset.promoValue = promo.value;
                    linkedList.appendChild(listItem);

                    // Add hidden input for product
                    var hiddenInputProd = document.createElement('input');
                    hiddenInputProd.type = 'hidden';
                    hiddenInputProd.name = 'cod_prod[]';
                    hiddenInputProd.value = prod.value;
                    hiddenInputs.appendChild(hiddenInputProd);

                    // Add hidden input for promotion
                    var hiddenInputPromo = document.createElement('input');
                    hiddenInputPromo.type = 'hidden';
                    hiddenInputPromo.name = 'cod_promo[]';
                    hiddenInputPromo.value = promo.value;
                    hiddenInputs.appendChild(hiddenInputPromo);
                });

                // Remove product from select
                prod.remove();
            });

            updateVinculacoesInput();
        }

        function desvincular() {
            var produtos = document.getElementById('produtos');
            var linkedList = document.getElementById('linked-promotions');
            var hiddenInputs = document.getElementById('hidden-inputs');

            // Remove selected items from linked list
            var selectedItems = linkedList.querySelectorAll('li.selected');
            selectedItems.forEach(function (item) {
                // Add product back to select
                produtos.add(new Option(item.textContent.split(" - ")[0], item.dataset.prodValue));

                // Remove hidden inputs
                var hiddenProdInput = hiddenInputs.querySelector(`input[name="cod_prod[]"][value="${item.dataset.prodValue}"]`);
                var hiddenPromoInput = hiddenInputs.querySelector(`input[name="cod_promo[]"][value="${item.dataset.promoValue}"]`);
                hiddenInputs.removeChild(hiddenProdInput);
                hiddenInputs.removeChild(hiddenPromoInput);

                // Remove list item
                linkedList.removeChild(item);
            });

            updateVinculacoesInput();
        }

        function updateVinculacoesInput() {
            var linkedList = document.getElementById('linked-promotions');
            var items = linkedList.getElementsByTagName('li');
            var vinculations = [];

            for (var i = 0; i < items.length; i++) {
                vinculations.push({
                    text: items[i].textContent,
                    prodValue: items[i].dataset.prodValue,
                    promoValue: items[i].dataset.promoValue
                });
            }

            document.getElementById('vinculacoes-input').value = JSON.stringify(vinculations);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var linkedList = document.getElementById('linked-promotions');
            linkedList.addEventListener('click', function (event) {
                if (event.target.tagName === 'LI') {
                    event.target.classList.toggle('selected');
                }
            });
        });
    </script>




</body>

</html>