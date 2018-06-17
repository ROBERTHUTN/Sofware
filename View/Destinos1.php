<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once '../Model/Destino1.php';
include_once '../Model/CrudModel.php';
?>
<html>
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">				
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-2.1.4.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-table.css">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" >
        <title>PANAMERICANA INTERNACIONAL</title>
        <style type="text/css">
            h1,h2,h3.titulo{
                border-bottom: 2px solid #fff600;
            }
        </style>
    </head>
    <body bgcolor=#832B2B>
        
    <div id="wrapper">
        
        <div>
            <table  border="0" class="table" style="padding-right: 50px;" style="padding-left: 20px;">
                <tr class="warning">
                    <td width="25">
                        
                    </td>
                    <td>
                        <?php
                        if (isset($_SESSION['TIPO_DESTINO'])) {
                            $dest=$_SESSION['TIPO_DESTINO'];
                                if ($dest == "Nacionales") {
                                    echo "<h2><center>NACIONALES</center></h2>";
                                } else if ($dest == "Internacionales") {
                                    echo "<h2><center>INTERNACIONALES</center></h2>";                                
                                } else {
                                    echo "No se ha seleccionado el Tipo de destino";
                                }
                            }
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="25">
                        <button>
                            <i class="fa fa-folder"></i><h4>TIPO DESTINO</h4>
                        </button>
                            <a type="submit" style="font-size: 12pt; font-family: verdana; width: 150px; text-align: left" class="btn btn-info" role="button" href="../controller/controller.php?opcion=listarDestino&TIPO_DESTINO=Nacionales">Nacionales</a>
                            <a type="submit" style="font-size: 12pt; font-family: verdana; width: 150px; text-align: left" class="btn btn-info" role="button" href="../controller/controller.php?opcion=listarDestino&TIPO_DESTINO=Internacionales">Internacionales</a>
                    </td>
                    <td> 
            <table  border="0" data-toggle="table">
                            <thead>
                                <tr>
                                    <th width="20%"><h3>Lugar de salida</h3></th>
                            <th width="20%"><h3>Lugar de destino</h3></th>
                            <th width="20%"><h3>Hora de salida</h3></th>
                            <th width="3%"><h3>Valor de boleto</h3></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['listadoDestinoTipo'])) {
                        $listadoDestinoTipo = unserialize($_SESSION['listadoDestinoTipo']);
                        foreach ($listadoDestinoTipo as $dest) {
                            echo "<tr>";
                            echo "<td width='20%'><h4>" . $dest->getLUGAR_SALIDA() . "</h4></td>";
                            echo "<td width='20%'><h4>" . $dest->getLUGAR_DESTINO() . "</h4></td>";
                            echo "<td width='20%'><h4>" . $dest->getHORA_SALIDA() . "</h4></td>";
                            echo "<td width='3%'><h4>" . $dest->getVALOR_BOLETO() . "</h4></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
            </td>
            </tr>
            </table>
        </div>



        <div style="clear: both;">&nbsp;</div>
    </div>

    <div style="clear: both;">&nbsp;</div>

    <!-- end #page -->
</div>
<div id="footer" align="center">
        <p>Copyright (c) 2018  All rights reserved.<br>
        Otavalo Lizeth.</p>
        <br>
    </div>
<!-- end #footer -->
<div style="text-align: center; font-size: 0.75em;"></a>.</div>
    <?php
    // put your code here
    ?>
</body>
</html>


