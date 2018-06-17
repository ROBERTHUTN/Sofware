<?php
?>

<html>
    <head>
        <style type="text/css">
            h1,h2,h3.titulo{
                border-bottom: 1px solid #fff600;
            }
        </style>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">				
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="View/js/jquery-2.1.4.js"></script>
        <script src="View/js/bootstrap.js"></script>
        <link href="View/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" >

    </head>
    <body  bgcolor=#832B2B>
        <!--CODIGO PARA INSERTAR  UN SLIDER-->
        <!--<div class="row">-->
            <div id="carousel1" class="carousel slide" data-ride="carousel">
                <!--Indicadores--> 
                <ol class="carousel-indicators">
                    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel1" data-slide-to="1"></li>
                    <li data-target="#carousel1" data-slide-to="2"></li>
                    <li data-target="#carousel1" data-slide-to="3"></li>
                </ol> 

                <!--Contenedor de las imagenes--> 
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <img src="View/imagenes/banner1.png" width="100%" alt="Imagen 1">
                    </div>
                    <div class="item active">
                        <img src="View/imagenes/banner2.png" width="100%" alt="Imagen 2">
                    </div>
                    <div class="item">
                        <img src="View/imagenes/banner3.png" width="100%" alt="Imagen 3">
                    </div>
                    <div class="item">
                        <img src="View/imagenes/bannerMenu2.jpg" width="100%" alt="Imagen 4">
                    </div>
                </div>
                <!--Controls--> 
                <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        
                <h1><marquee> PANAMERICANA INTERNACIONAL </marquee></h1>

    </body>
</html>
