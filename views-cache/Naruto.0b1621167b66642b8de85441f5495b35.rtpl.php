<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style-cat.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Caverna Games - Naruto</title>
</head>

<body>
    <div class="banner">
        <img src='/res/site/img/page.png' alt='Page' id='page' class='page' />
    </div>
    <h1>Naruto</h1>

    <style>
        .page-dimension {
            display: flex;
            flex-wrap: wrap;
        }

        .product-item {
            display: flex;
            flex-wrap: wrap;
        }

        .prod-itemn {
            background-color: rgb(255, 255, 255);
            border-radius: 8px;
            width: calc(33.333% - 40px); /* 3 items per row with some margin */
            height: 400px;
            padding: 20px;
            border: 1px solid black;
            margin: 10px; /* Adjusted for proper spacing */
            box-sizing: border-box;
        }

        .prod-itemn a {
            text-decoration: none;
            color: black;
            font-size: 25px;
        }

        .prod-itemn button {
            background-color: rgb(98, 93, 93);
            padding: 10px;
            color: white;
            border-radius: 5px;
            display: flex;
            margin-top: auto;
            width: 150px;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;

        }

        li {
            list-style: none;
        }

        .banner {
            padding-top: 450px;
            text-align: center;
            background-color: rgb(64, 51, 51);
            padding: 20px;
        }

        .banner img {
            width: 70%;
            margin-top: 150px;
        }

        .prod-itemn img {
            width: 40%;
            height: auto;
            margin-bottom: 20px;
            margin-left: 30%;
            margin-top: 10%;
        }


        .prod-itemn option{
            text-align: center;
        }

        .prod-itemn li{
            text-align: center;
        }
        #desproduct {
            font-size: 35px;
        }

        .product-item li {
            list-style: none;
        }
    </style>

    <div class="products">
        <div class='page-dimension'>
            <div class="product-item">
                <!-- <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> -->
                <div class="prod-itemn">
                    <option class="form-control" id="desproduct" name="desproduct"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                
                    <li><i class="fa-solid fa-tag"></i><a href="#" id="vlprice"><?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <button type="button" id="comprar">Comprar</button>
                    <img src="./res/site/img/products/<?php echo htmlspecialchars( $value1["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <!-- <?php } ?> -->
            </div>
        </div>
    </div>
</body>

</html>
