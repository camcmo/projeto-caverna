<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caverna Games | Home</title>
    <link rel="stylesheet" href="/res/site/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>


<body>
    <header class="navegate">
        <img src="/res/site/img/logo.png" alt="Logotipo" id="logo" class="logo" />
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
                    <?php $counter1=-1;  if( isset($cartas) && ( is_array($cartas) || $cartas instanceof Traversable ) && sizeof($cartas) ) foreach( $cartas as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#">Tecnologia</a>


                <ul class="submenu2">
                    <?php $counter1=-1;  if( isset($tecnologia) && ( is_array($tecnologia) || $tecnologia instanceof Traversable ) && sizeof($tecnologia) ) foreach( $tecnologia as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                     </ul>
            </li>
            <li>
                <a href="#">Colecionáveis</a>
                <ul class="submenu3">
                    <?php $counter1=-1;  if( isset($colecionaveis) && ( is_array($colecionaveis) || $colecionaveis instanceof Traversable ) && sizeof($colecionaveis) ) foreach( $colecionaveis as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#">Jogos</a>
                <ul class="submenu4">
                    <?php $counter1=-1;  if( isset($jogos) && ( is_array($jogos) || $jogos instanceof Traversable ) && sizeof($jogos) ) foreach( $jogos as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#">Presentes</a>
                <ul class="submenu5">
                    <?php $counter1=-1;  if( isset($presentes) && ( is_array($presentes) || $presentes instanceof Traversable ) && sizeof($presentes) ) foreach( $presentes as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#">Eventos</a>
                <ul class="submenu6">
                    <?php $counter1=-1;  if( isset($eventos) && ( is_array($eventos) || $eventos instanceof Traversable ) && sizeof($eventos) ) foreach( $eventos as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#">Alimentícios</a>
                <ul class="submenu7">
                    <?php $counter1=-1;  if( isset($alimenticios) && ( is_array($alimenticios) || $alimenticios instanceof Traversable ) && sizeof($alimenticios) ) foreach( $alimenticios as $key1 => $value1 ){ $counter1++; ?>
                    <li><a href="/<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </nav>

    </nav>