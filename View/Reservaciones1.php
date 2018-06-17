<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once '../model/Clientes1.php';
include_once '../model/CrudModel.php';
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
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/Validaciones.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-table.css">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" >
        
        <!-- MODIFICAR -->
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  
        <script src="dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="dist/sweetalert.css">
        
        <script LANGUAGE="JavaScript">
                function Error(msjError)
                {
                    sweetAlert("Oops...", msjError, "error");
                }
        </script>
        <!-- MODIFICAR -->
        
        <title>LA CASONA IBARREÑA</title>
        <style type="text/css">
            h1,h2,h3.titulo{
                border-bottom: 2px solid #fff600;
            }
        </style>
    </head>
    <body bgcolor=#832B2B>
        
    <div id="wrapper">
        <div><br></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Inicio de Sesión</h1>
                    <div class="account-wall" align="center">
                        <img class="profile-img" height="90" src="imagenes/userlogin.png" alt="">
                        <form class="form-signin" action="../controller/controller.php">
                            <input type="hidden" name="opcion1" value="iniciar_sesion">
                            <input type="text" name="cedula" onchange="validarCedula(this.form.cedula.value)"  onKeyPress="return validarNumeros(event)"  maxlength="10" class="form-control" placeholder="Cédula" required>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar Sesión" >
                        </form>

                        <div height="30%"></div>

                        <div align="left">                            
                            <div class="container" id="ventanasEmergentes">
                                <a href="#ventana1" data-toggle="modal"><h4>Registrarse</h4></a>

                                <div class="modal fade" id="ventana1">
                                    <div class="modal-dialog">
                                        <form class="form-horizontal"  action="../controller/controller.php">                  
                                            <div class="modal-content">
                                                <!-- Header de la ventana -->
                                                <div class="modal-header bg-success">
                                                    <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Nuevo Usuario</h3>
                                                </div>

                                                <!-- Contenido de la ventana -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"> Número de Cliente</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input name="id_cliente" type="text" class="form-control" readonly="readonly" value="<?php $crudModel = new CrudModel();
                                                                        echo $crudModel->idCliente() ?>" required />
                                                                </div>
                                                            </div>        
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cédula</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input name="CED_CLIENTE" maxlength="10" onchange="validarCedula(this.form.CED_CLIENTE.value)"  onKeyPress="return validarNumeros(event)" type="text" class="form-control" placeholder="Ingrese su Cédula" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input name="NOMBRE_CLIENTE" onkeypress="return validarLetras(event)" type="text" class="form-control" placeholder="Ingrese su nombre" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Apellido</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input  name="APELLIDO_CLIENTE" onkeypress="return validarLetras(event)" type="text" class="form-control" placeholder="Ingrese su apellido" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Fecha nacimiento</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <td><input type="date" name="FECHANA_CLIENTE"  min="1948-01-01" max="2001-01-01" class="form-control"  required=""/><a class="glyphicon-calendar"></a></td>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"> Teléfono</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input name="TELEF_CLIENTE" onKeyPress="return validarNumeros(event)" type="text" class="form-control" placeholder="Ingrese su N. teléfono" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Dirección</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input  name="DIRECCION_CLIENTE" type="text" class="form-control" placeholder="Ingrese su dirección" required />
                                                                </div>
                                                            </div>                                                                                             
                                                            <div class="form-group">
                                                                <div class="col-md-3 col-md-offset-1">
                                                                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Contraseña</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input  name="PASS_CLIENTE" type="password" class="form-control" placeholder="Contraseña" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Footer fde la ventana -->
                                                <div class="modal-footer">
                                                    <button name="opcion" value="crearClientes" class="btn btn-success" onclick="return swal('Registro exitoso','Click OK para continuar', 'success');">Guardar Cambios</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" name="opcion" value="cancelar">Cerrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <?php
                        if (isset($_SESSION['mensajeError'])) {
                            echo "<script language='javascript'> window.addEventListener('load', Error('" . $_SESSION['mensajeError'] . "'), false); </script>";
                            unset($_SESSION['mensajeError']);
//                            echo "<br><center><h4><font color='red'>" . $_SESSION['mensajeError'] . "</h4></center></font><br>";
                        }else if(isset ($_SESSION['mensajeContrase'])){
//                            echo "<br><center><h4><font color='red'>" . $_SESSION['mensajeContrase'] . "</h4></center></font><br>";
                            echo "<script language='javascript'> window.addEventListener('load', Error('" . $_SESSION['mensajeContrase'] . "'), false); </script>";
                            unset($_SESSION['mensajeContrase']);
                        }
                        ?>
                    </div>
                </div>
            </div>
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
</body>
</html>
