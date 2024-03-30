<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="/res/admin/css/style-admin.css">
  <script src="scrip.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src="script.js"></script> -->
</head>

<body class="body-market">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.querySelector('.toggle-btn');
      var slidebar = document.getElementById('slidebar');

      if (toggleBtn && slidebar) {
        toggleBtn.addEventListener('click', function () {
          // Verifica se a slidebar está atualmente visível
          if (slidebar.style.display === 'none' || slidebar.style.display === '') {
            slidebar.style.display = 'block';
          } else {
            slidebar.style.display = 'none';
          }
        });
      }
    });
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.querySelector('.toggle-btn-fr');
      var slidebar = document.getElementById('slidebar-fr');

      if (toggleBtn && slidebar) {
        toggleBtn.addEventListener('click', function () {
          // Verifica se a slidebar está atualmente visível
          if (slidebar.style.display === 'none' || slidebar.style.display === '') {
            slidebar.style.display = 'block';
          } else {
            slidebar.style.display = 'none';
          }
        });
      }
    });
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.querySelector('.toggle-btn-cup');
      var slidebar = document.getElementById('slidebar-cup');

      if (toggleBtn && slidebar) {
        toggleBtn.addEventListener('click', function () {
          // Verifica se a slidebar está atualmente visível
          if (slidebar.style.display === 'none' || slidebar.style.display === '') {
            slidebar.style.display = 'block';
          } else {
            slidebar.style.display = 'none';
          }
        });
      }
    });
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.querySelector('.toggle-btn-fat');
      var slidebar = document.getElementById('slidebar-fat');

      if (toggleBtn && slidebar) {
        toggleBtn.addEventListener('click', function () {
          // Verifica se a slidebar está atualmente visível
          if (slidebar.style.display === 'none' || slidebar.style.display === '') {
            slidebar.style.display = 'block';
          } else {
            slidebar.style.display = 'none';
          }
        });
      }
    });
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.querySelector('.toggle-btn-ped');
      var slidebar = document.getElementById('slidebar-ped');

      if (toggleBtn && slidebar) {
        toggleBtn.addEventListener('click', function () {
          // Verifica se a slidebar está atualmente visível
          if (slidebar.style.display === 'none' || slidebar.style.display === '') {
            slidebar.style.display = 'block';
          } else {
            slidebar.style.display = 'none';
          }
        });
      }
    });
  </script>
  <nav class="nav-bar">
    <div class="title-bar">
      <i class="fa-solid fa-user"></i>
      <h3></i>Painel do Administrador</h3>
    </div>

    <ul>
      <li class="toggle-btn">Cadastros</li>
      <ul id="slidebar">
        <li><a href="./src/estoque/produtos.php">Produtos</a></li>
        <li><a href="./src/estoque/estoque.php">Estoque</a></li>

      </ul>
      <li class="toggle-btn-cup">Cupons e Descontos</li>
      <ul id="slidebar-cup">
        <li><a href="./src/estoque/cupons.php">Cupons</a></li>
        <li><a href="./src/estoque/descontos.php">Descontos</a></li>
      </ul>
      <li class="toggle-btn-fr">Frete e Entregas</li>
      <ul id="slidebar-fr">
        <li><a href="./src/fretes.php">Cadastro de Fretes</a></li>
        <li><a href="./src/entregas.php">Controle de Entregas</a></li>
      </ul>
      <li class="toggle-btn-fat">Faturamento</li>
      <ul id="slidebar-fat">
        <li><a href="./src/faturamento.php">Faturar NFe</a></li>
        <li><a href="./src/gerencia_nfe.php">Gerenciamento de Faturamento</a></li>
      </ul>
      <li class="toggle-btn-ped">Pedidos</li>
      <ul id="slidebar-ped">
        <li><a href="./src/pedidos.php">Pedidos Abertos</a></li>
        <li><a href="./src/pedidos_fin.php">Pedidos Finalizados</a></li>
      </ul>
      <li><a href="./src/painel_gamer.php">Painel Gamer</a></li>

      <h4>Atalhos Rápidos</h4>
      <div class="button-atl">
        <button onclick="insert_prod()">Inserir Produto</button><br>
        <script>
          function insert_prod() {
            // Abrir nova janela com tamanho 800x800
            var newWindow = window.open('', '_blank', 'width=600,height=300');

            // Adicionar formulário HTML à nova janela
            newWindow.document.write('<html><head><title>Lançamento de Estoque</title></head><body>');
            newWindow.document.write('<h1>Lançamento de Estoque</h1>');
            newWindow.document.write('<form method="post" action="register_prod.php">');
            newWindow.document.write('  <label for="codProd">Código do Produto:</label>');
            newWindow.document.write('  <input type="number" id="codProd" name="codProd"><br><br>');
            newWindow.document.write('  <label for="productPrice">Preço do Produto:</label>');
            newWindow.document.write('  <input type="text" id="productPrice" name="productPrice"><br><br>');
            newWindow.document.write('  <label for="estProd">Estoque Atual:</label>');
            newWindow.document.write('  <input type="number" id="estProd" name="estProd"><br><br>');
            newWindow.document.write('  <input type="submit" value="Registrar">');
            newWindow.document.write('</form>');
            newWindow.document.write('</body></html>');

            // Fechar a gravação do documento
            newWindow.document.close();
          }
        </script>
        <button>Inserir Cupom</button><br>
        <button>Consultar Pedido</button><br>

        <!-- <button class="close">Encerrar</button> -->
      </div>


    </ul>

  </nav>