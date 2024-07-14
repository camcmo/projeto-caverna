<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style-cat.css'>
    <title>Caverna Games -Naruto</title>
</head>
<div class="banner">
    <img src='/res/site/img/page.png' alt='Page' id='page' class='page' />
</div>
<h1>Naruto</h1>

<body>
    <style>
       .product-item{
        display: flex;
        flex-wrap: nowrap;
       }

        .prod-itemn a{
            text-decoration: none;
            color: black;
            font-size: 25px;
        }

        .prod-itemn button{
            background-color: rgb(98, 93, 93);
            padding: 10px;
            color: white;
            border-radius: 5px;
        }

        li{
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
            margin-top: 50px;
            width: 65%;
            margin-bottom: 80px;

        }

        .prod-itemn {
            display: flex;
            background-color: rgb(204, 200, 200);
            width: 400px;
            flex-wrap: wrap;
            padding: 10px;
            border: 1px solid black;

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

                    <li><a href="#" id="vlprice"><?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <button type="button" id="comprar">Comprar</button>
                    <img src="./res/site/img/products/<?php echo htmlspecialchars( $value1["url_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    
                    <!-- <li><?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li> -->
                   
                </div>
               

            </div>
            <?php } ?>
        </div>

    </div>
</body>

</html>