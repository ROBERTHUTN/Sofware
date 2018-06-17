<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="dist/sweetalert.css">

        <title>PANAMERICANA INTERNACIONAL</title>


        <script LANGUAGE="JavaScript">
            function ELIMINAR()
            {
                swal({
                    title: "Tu reservacion ha sido eliminada",
                    type: "warning",
//                    showCancelButton: true,
//                    confirmButtonColor: "#DD6B55",
//                    confirmButtonText: "Si!",
//                    closeOnConfirm: false
                },
                        function () {
                            swal("Eliminado correctamente", "success");
                        });
            }
        </script>
        <script>
            function ACEPTAR()
            {
                swal({
                    title: "¿Esta es tu reserva?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si!",
                    closeOnConfirm: false
                },
                function () {
                    swal("aknd", "warning");
                });
            }
        </script>
        <script type="text/javascript">
            function imprSelec(print1)
            {
                var ficha = document.getElementById(print1);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }
        </script>

    </head>
    <body>
        <?php
        session_start();
        include_once '../Model/CrudModel.php';
        include_once '../Model/Clientes1.php';
        include_once '../Model/Reservaciones1.php';
        include_once '../Model/Transportes1.php';
        $usuario = unserialize(($_SESSION['usuario']));
        $nombre = $usuario->getNOMBRE_CLIENTE();
            $apellido = $usuario->getAPELLIDO_CLIENTE();
        ?>

        <div id="wrapper">

            <table border="0" class="table">
                <tr>
                    <td width="80%" align="right">
                        <h4>
                            <?php
                            echo ($nombre) . "    " . ($apellido);
                            ?>
                        </h4>
                    </td>
                    <td>&nbsp;&nbsp;</td>
                    <td width="30%" align="rigth">
                        <form action="../controller/controller.php">
                            <input type="hidden" name="opcion1" value="cerrar">
                            <input type="submit" class="btn btn-danger"  style="font-size: 14pt; font-family: arial" value="Cerrar Sesion">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div></div>

        <div class="container" id="Paneles" >
            <h1 class="titulo" style="padding-left: 30px;"> Búsqueda </h1>
            <div class="row" style="padding-left: 30px;" style="padding-right: 50px;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal"  action="../controller/controller.php">
                            <table border="0" class="table" width="40%">
                                <tr class="warning">

                                    <td width="7%" align="right">
                                        <h4>Unidad de transporte:</h4>
                                    </td>
                                    <td width="5%">
                                        <select name="COD_TRANSPORTE"  class="form-control"  width="15%" height="10%" required>
                                            <option hidden disabled selected label="Seleccione"></option>
                                            <option value="GUAYAQUIL">GUAYAQUIL</option> <option value="QUITO">QUITO</option> 
                                            <option value="TULCAN">TULCAN</option> <option value="ATACAMES">ATACAMES</option> 
                                            <option value="SMERALDAS">ESMERALDAS</option> <option value="HUAQUILLAS">HUAQUILLAS</option>
                                            <option value="CUENA">CUENCA</option> <option value="PERU">PERU</option>
                                            <option value="IBARRA">IBARRA</option> <option value="VENEZUELA">VENEZUELA</option>
                                        </select> 
                                    </td>  
                                    <td width="2%" align="right">
                                        <h4>Fecha:</h4>
                                    </td>
                                    <td width="6%">
                                        <input type="date" name="FECHA"class="form-control"  min="<?php echo date('Y-m-d'); ?>"  size="7" required >
                                        <input type="hidden" name="ESTADO_ASIENTOS" value="Disponible">
                                    </td>
                                    <td width="1%" ></td>
                                    <td width="10%" align="">
                                        <input type="hidden" name="opcion"  value="buscarTransporte" class="btn btn-success">
                                        <input type="submit"  style="font-size: 14pt; font-family: verdana" class="btn btn-info" value="Buscar Autobús">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div style="clear: both;">&nbsp;</div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <table border="0" class="table" style="padding-left: 40px;" style="padding-right: 80px;" width="100%">
                            <tr class="warning">
                                <td rowspan="9" width="40%">
                                    <table  border="0" data-toggle="table">
                                        <thead>
                                            <tr>
                                                <th><h3>ID TRANSPORTE</h3></th>
                                        <th><h3># TRANSPORTE</h3></th>
                                        <th><h3>DESTINO</h3></th>
                                        <th><h3>ESTADO ACTUAL</h3></th>
                                        <th><h3>TIPO</h3></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['listadoTransportes'])) {
                                    $listadoTransportes = unserialize($_SESSION['listadoTransportes']);
                                    foreach ($listadoTransportes as $tra) {
                                        echo "<tr>";
                                        echo "<td><h4>" . $tra->getId_transporte() . "</h4></td>";
                                        echo "<td><h4>" . $tra->getNUM_TRANSPORTE() . "</h4></td>";
                                        echo "<td><h4>" . $tra->getCOD_TRANSPORTE() . "</h4></td>";
                                        echo "<td><h4>" . $tra->getESTADO_ASIENTOS() . "</h4></td>";
                                        echo "<td><h4>" . $tra->getId_destino() ."</h4></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "No se han cargado datos.";
                                }
                                ?>
                            </tbody></table>
                        </td>
                        <td rowspan="9" width="10%"></td><td rowspan="9" width="10%"></td>
                        </tr>
                        <tr>
                            <td class="warning" width="10%"> 
                                <h2>Actualizar datos</h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="warning">
                                <input type="button" class="btn btn-primary"  href="#ventana2" data-toggle="modal"  style="font-size: 14pt; font-family: verdana; width: 200px" value="Actualizar Datos">
                                <div class="container" id="ventanasEmergentes">
                                    <div class="modal fade" id="ventana2">
                                        <div class="modal-dialog">
                                            <form class="form-horizontal"  action="../controller/controller.php">
                                                <div class="modal-content">
                                                    <!-- Header de la ventana -->
                                                    <div class="modal-header bg-success">
                                                        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Usuario </h3>
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
                                                                        <input name="id_cliente" type="text" class="form-control" readonly="readonly" 
                                                                               value="<?php echo $usuario->getId_cliente() ?>" required />
                                                                    </div>
                                                                </div>        
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cédula</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="CED_CLIENTE" type="text" class="form-control" value="<?php echo $usuario->getCED_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Nombre</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="NOMBRE_CLIENTE"  type="text" class="form-control"value="<?php echo $usuario->getNOMBRE_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Apellido</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input  name="APELLIDO_CLIENTE"  type="text" class="form-control"value="<?php echo $usuario->getAPELLIDO_CLIENTE() ?>" placeholder="Ingrese sus Apellidos" required />
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
                                                                        <label class="control-label"> Telëfono</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="TELEF_CLIENTE"  type="text" class="form-control" value="<?php echo $usuario->getTELEF_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Dirección</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input  name="DIRECCION_CLIENTE" type="text" class="form-control" value="<?php echo $usuario->getDIRECCION_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Contraseña</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input  name="PASS_CLIENTE"  class="form-control" value="<?php echo $usuario->getPASS_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Footer fde la ventana -->
                                                    <div class="modal-footer">
                                                        <button name="opcion" value="actualizarClientes" class="btn btn-success" onclick="return swal('Datos del cliente actualizados', '', 'success');">Guardar Cambios</button>
                                                        <button class="btn btn-default" data-dismiss="modal" name="opcion" value="cancelar">Cerrar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="warning">
                                <h2>Reservaciones:</h2>
                            </td>
                        </tr>
                        <tr>
                            <td  class="warning">
                                <input type="button" class="btn btn-success"  href="#ventana3" data-toggle="modal"  style="font-size: 14pt; font-family: verdana; width: 200px" value="Reservar">
                                <div class="container" id="ventanasEmergentes">
                                    <div class="modal fade" id="ventana3">
                                        <div class="modal-dialog">
                                            <form class="form-horizontal"  action="../controller/controller.php">
                                                <div class="modal-content">
                                                    <!-- Header de la ventana -->
                                                    <div class="modal-header bg-success">
                                                        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Reservación </h3>
                                                    </div>

                                                    <!-- Contenido de la ventana -->
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span>Número de Reservación</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="id_reservacionb" type="text" class="form-control" readonly="readonly" value="<?php
                                                                        $crudModel = new CrudModel();
                                                                        echo $crudModel->idReserva()
                                                                        ?>" required />
                                                                    </div>
                                                                </div>        
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cédula</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="CED_CLIENTE"  readonly="readonly" type="text" class="form-control" value="<?php echo $usuario->getCED_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Transporte</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <select name="id_transporte" class="form-control"  required>
                                                                            <?php
                                                                            echo "<option disabled selected label='Seleccione un transporte'>  </option>";
                                                                            if (isset($_SESSION['listadoTransportes'])) {
                                                                                $listadoTransportes = unserialize($_SESSION['listadoTransportes']);
                                                                                foreach ($listadoTransportes as $tra) {
                                                                                    if ($tra->getESTADO_ASIENTOS() == 'Disponible') {
                                                                                        echo "<option>" . $tra->getId_transporte() . "</option>";
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>"
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Tipo destino</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <select name="TIPO_DESTINO" class="form-control"  value="<?php echo $usuario->getTIPO_DESTINO() ?>" onkeypress="return validarOpciones(event)" required>
                                                                            <option hidden value="">Seleccione un opción</option>
                                                                            <option value="NACIONAL">NACIONAL</option>
                                                                            <option value="INTERNACIONAL">INTERNACIONAL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cantidad boletos</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input style="font-family: arial; text-align: left" name="CANTIDAD_BOLETOS" readonly="readonly" class="form-control" required value="<?php
                                                                        if (isset($_SESSION['CAPACIDAD'])) {
                                                                            $num = $_SESSION['CAPACIDAD'];
                                                                            echo $num;
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Detalle</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="DETALLE_DESTINO"  readonly="readonly" type="text" class="form-control" value="<?php echo getLUGAR_SALIDA() . " " . getLUGAR_DESTINO(); ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Fecha</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input style="text-align: left" name="FECHA_RESERVA" type="text" readonly="readonly" class="form-control" required value="<?php
                                                                        if (isset($_SESSION['FECHA'])) {
                                                                            $fecha = $_SESSION['FECHA'];
                                                                            echo $fecha;
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Footer fde la ventana -->
                                                    <div class="modal-footer">
                                                        <button name="opcion" value="crearReservacion" class="btn btn-success" onclick="return swal('Reservación exitosa', '', '');">Guardar Cambios</button>
                                                        <button type="button"  class="btn btn-default" data-dismiss="modal" name="opcion" value="cancelar">Cerrar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td  class="warning">
                                <form  class="form-horizontal"  action="../controller/controller.php">
                                    <input type="hidden" name="opcion" value="eliminarReservacion" >
                                    <input name="id_reservab"  type="hidden" class="form-control" value="
                                    <?php
                                    if (isset($_SESSION['id_reservacionb'])) {
                                        $reserva = $_SESSION['id_reservacionb'];
                                        echo $reserva;
                                    }
                                    ?>">   
                                    <input name="id_transporte"  type="hidden" class="form-control" value="
                                    <?php
                                    if (isset($_SESSION['id_transporte'])) {
                                        $reserva = $_SESSION['id_transporte'];
                                        echo $reserva;
                                    }
                                    ?>">  
                                    <button name="opcion" value="eliminarReservacion" style="font-size: 14pt; font-family: verdana; width: 200px"  class="btn btn-danger" onclick="return ELIMINAR();">Eliminar</button>
                                    <!--<input type="submit" value="eliminar" style="font-size: 14pt; font-family: verdana; width: 200px"  class="btn btn-danger" onclick="return ELIMINAR();">-->
                                    <!--<button name="opcion" value="eliminarReservacion" style="font-size: 14pt; font-family: verdana; width: 200px"  class="btn btn-danger" onclick="return swal('Reservacion Eliminada Correctamente', '', 'Success');">Eliminar</button>-->
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td  class="warning">
                                <input type="button" class="btn btn-warning"  href="#ventana6" data-toggle="modal"  style="font-size: 14pt; font-family: verdana; width: 200px" value="Ver Reservación">
                                <div class="container" id="ventanasEmergentes">
                                    <div class="modal fade" id="ventana6">
                                        <div class="modal-dialog">
                                            <form class="form-horizontal"  action="../controller/controller.php">
                                                <input  type="hidden" name="opcion1" value="aceptar">
                                                <div class="modal-content">
                                                    <div id="print1">
                                                        <!-- Header de la ventana -->
                                                        <div class="modal-header bg-success">
                                                            <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Datos de Reservación </h3>
                                                        </div>

                                                        <!-- Contenido de la ventana -->
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Id Reserva</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="id_reservab"  type="text" readonly="readonly" class="form-control" value="<?php
                                                                            if (isset($_SESSION['id_reservacionb'])) {
                                                                                $reserva = $_SESSION['id_reservacionb'];
                                                                                echo $reserva;
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cédula Usuario</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="CED_CLIENTE"  readonly="readonly" type="text" class="form-control" value="<?php echo $usuario->getCED_CLIENTE() ?>" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Id transporte</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="id_transporte"  type="text" readonly="readonly" class="form-control" value="<?php
                                                                            if (isset($_SESSION['id_transporte'])) {
                                                                                $reserva = $_SESSION['id_transporte'];
                                                                                echo $reserva;
                                                                            }
                                                                            ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Tipo destino</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <select name="TIPO_DESTINO" class="form-control"  value="<?php echo $usuario->getTIPO_DESTINO() ?>" onkeypress="return validarOpciones(event)" required>
                                                                            <option hidden value="">Seleccione un opción</option>
                                                                            <option value="NACIONAL">NACIONAL</option>
                                                                            <option value="INTERNACIONAL">INTERNACIONAL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> N. de boletos</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="CED_CLIENTE"  type="text" readonly="readonly" class="form-control" value="<?php
                                                                            if (isset($_SESSION['CANTIDAD_BOLETOS'])) {
                                                                                $reserva = $_SESSION['CANTIDAD_BOLETOS'];
                                                                                echo $reserva;
                                                                            }
                                                                            ?>" required />
                                                                        </div>
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Detalle destino</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="DETALLE_DESTINO"  readonly="readonly" type="text" class="form-control" value="<?php echo getLUGAR_SALIDA() . " " . getLUGAR_DESTINO(); ?>" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-3 col-md-offset-1">
                                                                            <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Fecha Reserva</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input name="CED_CLIENTE" type="text" readonly="readonly" class="form-control" value="<?php
                                                                            if (isset($_SESSION['FECHA_RESERVA'])) {
                                                                                $reserva = $_SESSION['FECHA_RESERVA'];
                                                                                echo $reserva;
                                                                            }
                                                                            ?>" required >
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Footer fde la ventana -->
                                                    <div class="modal-footer">
                                                        <button name="opcion1" value="aceptar" class="btn btn-success" onclick="return swal({title: 'Hola, esta es tu reserva, ten un buen dia'});">Aceptar</button>
                                                        <a class="btn btn-primary" href="javascript:imprSelec('print1')">Imprimir</a>
                                                        <!--<input  type="submit" value="Aceptar" class="btn btn-success" onclick="return swal({title: 'Hola, esta es tu reserva, ten un buen dia'});">-->
                                                        <!--<input  type="button" onclick="return ACEPTAR();"></input>-->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td  align="left"  class="warning">

                                <input type="button"  style="font-size: 14pt; font-family: verdana; width: 200px"  class="btn btn-primary"  href="#ventana5" data-toggle="modal" value="Actualizar">
                                <div class="container" id="ventanasEmergentes">
                                    <div class="modal fade" id="ventana5">
                                        <div class="modal-dialog">
                                            <form class="form-horizontal"  action="../controller/controller.php">
                                                <input type="hidden" name="opcion" value="actualizarReservacion">
                                                <div class="modal-content">
                                                    <!--Header de la ventana -->
                                                    <div class="modal-header bg-success">
                                                        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title"><span class="glyphicon glyphicon-heart"></span> Actualizar Reservación </h3>
                                                    </div>

                                                    <!--Contenido de la ventana -->
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Id Reserva</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="id_reserva"  type="text" readonly="readonly" class="form-control" value="<?php
                                                                        if (isset($_SESSION['id_reservacionb'])) {
                                                                            $reserva = $_SESSION['id_reservacionb'];
                                                                            echo $reserva;
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Cédula Usuario</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="CED_CLIENTE"  readonly="readonly" type="text" class="form-control" value="<?php echo $usuario->getCED_CLIENTE() ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Id Transporte</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <select name="id_transporte" class="form-control"  required>
                                                                            <?php
                                                                            echo "<option disabled selected label='Seleccione un transporte'>  </option>";
                                                                            if (isset($_SESSION['listadoTransportes'])) {
                                                                                $listadoTransportes = unserialize($_SESSION['listadoTransportes']);
                                                                                foreach ($listadoTransportes as $tra) {
                                                                                    if ($tra->getESTADO_ASIENTOS() == 'Disponible') {
                                                                                        echo "<option>" . $tra->getId_transporte() . "</option>";
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>"
                                                                        </select>
                                                                        <input type="hidden" name="id_transporte1" class="form-control" value="<?php
                                                                        if (isset($_SESSION['id_transporte'])) {
                                                                            $reserva = $_SESSION['id_transporte'];
                                                                            echo $reserva;
                                                                        }
                                                                        ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Tipo destino</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <select name="TIPO_DESTINO" class="form-control"  value="<?php echo $usuario->getTIPO_DESTINO() ?>" onkeypress="return validarOpciones(event)" required>
                                                                            <option hidden value="">Seleccione un opción</option>
                                                                            <option value="NACIONAL">NACIONAL</option>
                                                                            <option value="INTERNACIONAL">INTERNACIONAL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> N. Boletos</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="CANTIDAD_BOLETOS" readonly="readonly"  type="text" class="form-control"  value="<?php
                                                                        if (isset($_SESSION['CANTIDAD_BOLETOS'])) {
                                                                            $reserva = $_SESSION['CANTIDAD_BOLETOS'];
                                                                            echo $reserva;
                                                                        }
                                                                        ?>" required >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Detalle destino</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="DETALLE_DESTINO"  readonly="readonly" type="text" class="form-control" value="<?php echo strtoupper (getLUGAR_SALIDA()) . " " . strtoupper(getLUGAR_DESTINO()); ?>" required />
                                                                    </div>
                                                                </div>                                                                
                                                                <div class="form-group">
                                                                    <div class="col-md-3 col-md-offset-1">
                                                                        <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span> Fecha Reserva</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input name="FECHA_RESERVA" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php
                                                                        if (isset($_SESSION['FECHA_RESERVA'])) {
                                                                            $reserva = $_SESSION['FECHA_RESERVA'];
                                                                            echo $reserva;
                                                                        }
                                                                        ?>" required />
                                                                    </div>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Footer fde la ventana -->
                                                    <div class="modal-footer">
                                                        <!--<input type="submit" value="Actualizar" class="btn btn-success" onclick="return swal({title: 'Tu actualizacion ha sido exitosa', '', ''});">-->
                                                        <button name="opcion" value="actualizarReservacion" class="btn btn-success" onclick="return swal({title: 'Tu actualización ha sido exitosa'});">Actualizar</button>
                                                        <button type="button"  class="btn btn-default" data-dismiss="modal" name="opcion" value="cancelar">Cancelar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </td>
                    </tr>


                    <tr>
                        <td  class="warning">
                            <input type="submit" class="btn btn-block"  href="#ventana7" data-toggle="modal"  style="font-size: 14pt; font-family: verdana; width: 200px"  value="Reservaciones">
                            <div class="container" id="ventanasEmergentes">
                                <div class="modal fade" id="ventana7">
                                    <div class="modal-dialog">
                                        <form class="form-horizontal"  action="../controller/controller.php">
                                            <div class="modal-content">
                                                <div id="print1">
                                                    <!-- Header de la ventana -->
                                                    <div class="modal-header bg-success">
                                                        <h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> Datos de Reservación </h3>
                                                    </div>

                                                    <!-- Contenido de la ventana -->
                                                    <div class="modal-body">
                                                       
                                                                <div class="form-group">
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <table  border="0" data-toggle="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th><h3>ID </h3></th>
                                                                                            <th><h3>CÉDULA</h3></th>
                                                                                            <th><h3>TRANSPORTE</h3></th>
                                                                                            <th><h3>TIPO</h3></th>
                                                                                            <th><h3>N. BOLETOS</h3></th>
                                                                                            <th><h3>DETALLE</h3></th>
                                                                                            <th><h3>FECHA R.</h3></th>
                                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            if (isset($_SESSION['listadoReserva'])) {
                                                                                $listadoReserva = unserialize($_SESSION['listadoReserva']);
                                                                                foreach ($listadoReserva as $rese) {
                                                                                    echo "<tr>";
                                                                                    echo "<td><h4>" . $rese->getId_reservab() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getCED_CLIENTE() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getId_transporte() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getTIPO_DESTINO() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getCANTIDAD_BOLETOS() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getDETALLE_DESTINO() . "</h4></td>";
                                                                                    echo "<td><h4>" . $rese->getFECHA_RESERVA() . "</h4></td>";
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
                                                            </div>
                                                </div>
                                                <!-- Footer fde la ventana -->
                                                <div class="modal-footer">
                                                    <button name="opcion1" value="aceptar" class="btn btn-success">Aceptar</button>
                                                </div>
                                            </div>
                                            </form>
                                                        </div>
                                                    </div>
                                    </div>
                                        
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>    
    </div>

    <div id="footer" align="center">
        <p>Copyright (c) 2017  All rights reserved.<br>
            Armas Silvana, Otavalo Lizeth & Ulloa Helen.</p>
        <br>
    </div>
</body>
</html>
