<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caverna Games | Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    html {
        background-color: black;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

    }

    /* Cabeçalho */
    header {
        background-color: grey;
        display: flex;
        /* Define o display como flexível */
        align-items: center;
        /* Alinha os itens verticalmente ao centro */
        justify-content: space-between;
        /* Distribui os itens igualmente ao longo do eixo principal (horizontal) */
        position: fixed;
        width: 100%;
        flex-wrap: wrap;
    }

    #title {
        margin-left: 40px;
        font-size: 20px;
        font-weight: bold;
    }

    .navegate {
        padding-bottom: 20px;
    }

    .logo {
        margin-top: 10px;
        margin-left: 10px;
        width: 100px;
        /* Defina o tamanho da imagem do logo conforme necessário */
    }

    #logo {
        width: 10vh;

    }

    .search {
        width: 500px;
        /* Define a largura do campo de busca conforme necessário */
        margin-left: 150px;
        padding: 10px;
        border-radius: 8px;


    }

    .fa-solid {
        margin-left: 10px;
        /* Adiciona margem à esquerda entre os ícones */
        /* Adicione quaisquer outros estilos desejados para os ícones */
    }

    .login-user {
        margin-left: 140px;

    }

    .login-user i {
        font-size: 20px;
        padding: 10px;
    }

    .login-user a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .fa-cart-shopping {
        font-size: 20px;
        margin-right: 20px;
    }

    #banner {
        padding-top: 200px;
        margin-left: 10%;
        padding-bottom: 100px;
    }

    .navigation {
        display: flex;
        background-color: rgb(77, 74, 74);
        position: fixed;
        margin-top: 95px;
        padding: 10px;
        width: 100%;


    }

    .navigation ul {
        display: flex;
        margin-left: auto;
        margin-right: auto;

    }

    .navigation li {
        list-style: none;
        margin-right: 100px;
        width: auto;

    }

    .navigation li a {
        text-decoration: none;
        color: white;

    }

    .navigation li:hover {
        background-color: grey;

    }

    /* Rodapé */
    footer {
        display: flex;
        background-color: grey;
        justify-content: space-between;
        padding: 40px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .div_1 li {
        list-style: none;
        padding: 10px;
    }

    .div_1 a {
        text-decoration: none;
        color: rgb(74, 69, 69);
        font-weight: bold;

    }

    .div_2 li {
        list-style: none;
        color: rgb(74, 69, 69);
        font-weight: bold;
        padding: 10px;
    }

    .div_3 li {
        list-style: none;
        padding: 10px;
        color: rgb(74, 69, 69);
        font-weight: bold;

    }

    .logo-footer {
        width: 100%;
    }

    #logo-footer {
        height: 140px;
        width: 140px;
        padding: 20px;
        margin-top: 20px;
    }

    .div_4 {
        background-color: rgb(53, 50, 50);
        display: flex;
        justify-content: space-between;
        color: white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        padding: 10px;
    }

    .navigation ul li ul {
        display: none;
    }

    .submenu1 {
        display: none;
        /* Ocultar submenu por padrão */
        position: absolute;
        background-color: #847f7f;
        border: 1px solid #ccc;
        padding: 0;
        /* Removendo o padding para evitar espaçamento excessivo */
        min-width: 120px;
        z-index: 1;
        list-style: none;
        /* Removendo marcadores de lista */
    }

    .submenu1 li {
        display: block;
        padding: 10px;
    }

    .navigation li:hover .submenu1 {
        display: block;
        /* Mostrar submenu quando o mouse estiver sobre o item pai */
    }

    .submenu2,
    .submenu3,
    .submenu4,
    .submenu5,
    .submenu6,
    .submenu7 {
        display: none;
        /* Ocultar submenu por padrão */
        position: absolute;
        background-color: #847f7f;
        border: 1px solid #ccc;
        padding: 0;
        /* Removendo o padding para evitar espaçamento excessivo */
        min-width: 120px;
        z-index: 1;
        list-style: none;
        /* Removendo marcadores de lista */


    }

    .submenu2 li,
    .submenu3 li,
    .submenu4 li,
    .submenu5 li,
    .submenu6 li,
    .submenu7 li {
        display: block;
        padding: 10px;
    }

    .navigation li:hover .submenu2,
    .navigation li:hover .submenu3,
    .navigation li:hover .submenu4,
    .navigation li:hover .submenu5,
    .navigation li:hover .submenu6,
    .navigation li:hover .submenu7 {
        display: block;
        /* Mostrar submenu quando o mouse estiver sobre o item pai */
    }

    .submenu1 li:hover,
    .submenu2 li:hover,
    .submenu3 li:hover,
    .submenu4 li:hover,
    .submenu5 li:hover,
    .submenu6 li:hover,
    .submenu7 li:hover {
        background-color: rgb(55, 52, 52);
        width: 90%;
    }
</style>

<body>
    <header class="navegate">
        <img src="./img/logo.png" alt="Logotipo" id="logo" class="logo" />
        <span id="title">CAVERNA GAMES</span>
        <input type="text" placeholder="Faça sua busca..." name="busca" id="search" class="search" />
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class="login-user">
            <i class="fa-solid fa-user"></i>
            <span><a href="./src/inter/login.html">Faça seu login</a> ou <a href="#">Cadastre-se</a></span>
            <i class="fa-solid fa-cart-shopping"></i>
        </span>

    </header>
    <nav class="navigation">
        <ul>
            <li>
                <a href="#">Cartas de Magic</a>
                <ul class="submenu1">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Tecnologia</a>
                <ul class="submenu2">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Colecionáveis</a>
                <ul class="submenu3">
                    <li><a href="./src/pokemon.html">Pokémon</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Jogos</a>
                <ul class="submenu4">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Presentes</a>
                <ul class="submenu5">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Eventos</a>
                <ul class="submenu6">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Alimentícios</a>
                <ul class="submenu7">
                    <li><a href="#">Teste 1</a></li>
                    <li><a href="#">Teste 2</a></li>
                    <li><a href="#">Teste 3</a></li>
                    <li><a href="#">Teste 4</a></li>
                    <li><a href="#">Teste 5</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    </nav>