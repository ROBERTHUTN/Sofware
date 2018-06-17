<?php

require_once '../model/CrudModel.php';
session_start();
$crudModel = new CrudModel();

$opcion = $_REQUEST['opcion'];
$opcion1 = $_REQUEST['opcion1'];
unset($_SESSION['mensaje']);
unset($_SESSION['mensajeD']);
unset($_SESSION['mensajeContrase']);
unset($_SESSION['mensajeError']);

switch ($opcion) {

//LISTAR

    case "listarDestino":
        $TIPO_DESTINO = $_REQUEST['TIPO_DESTINO'];
        $_SESSION['TIPO_DESTINO'] = $TIPO_DESTINO;

        $listadoDestinoTipo = $crudModel->getDestinoTipo($TIPO_DESTINO);
        $_SESSION['listadoDestinoTipo'] = serialize($listadoDestinoTipo);
        header('Location: ../View/Menu.php');
        break;

    case "actualizarTransporte":
        $id_transporte = $_REQUEST['id_transporte'];
        $crudModel->actualizarTransporte($id_transporte);
        $listadoTr = $crudModel->getTransportes($id_transporte);
        $_SESSION['listadoTr'] = serialize($listadoTr);
        header('Location: ../View/ReservacionLogin.php');
        break;

    case 'buscarTransporte':
        $COD_TRANSPORTE = $_REQUEST['COD_TRANSPORTE'];
        $_SESSION['COD_TRANSPORTE'] = $COD_TRANSPORTE;
        $FECHA = $_REQUEST['FECHA'];
        $_SESSION['FECHA'] = $FECHA;
        $ESTADO_ASIENTOS = $_REQUEST['ESTADO_ASIENTOS'];
        
        $listadoTransportes = $crudModel->getTransporte($COD_TRANSPORTE, $ESTADO_ASIENTOS);
        $_SESSION['listadoTransportes'] = serialize($listadoTransportes);
        header('Location: ../View/ReservacionLogin.php');
        break;

//CREAR    
    case "crearClientes":
        $id_cliente = $_REQUEST['id_cliente'];
        $CED_CLIENTE = $_REQUEST['CED_CLIENTE'];
        $NOMBRE_CLIENTE = $_REQUEST['NOMBRE_CLIENTE'];
        $APELLIDO_CLIENTE = $_REQUEST['APELLIDO_CLIENTE'];
        $FECHANA_CLIENTE = $_REQUEST['FECHANA_CLIENTE'];
        $TELEF_CLIENTE = $_REQUEST['TELEF_CLIENTE'];
        $DIRECCION_CLIENTE = $_REQUEST['DIRECCION_CLIENTE'];
        $PASS_CLIENTE = $_REQUEST['PASS_CLIENTE'];       
        try {
            $crudModel->crearClientes($id_cliente, $CED_CLIENTE, $NOMBRE_CLIENTE, $APELLIDO_CLIENTE, $FECHANA_CLIENTE, $TELEF_CLIENTE, $DIRECCION_CLIENTE, $PASS_CLIENTE);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }

        $listadoC = $crudModel->getClientes();
        $_SESSION['listadoC'] = serialize($listadoC);

        header('Location: ../view/Reservaciones.php');
        break;

//GUARDAR
    case "guardarClientes":
        $CED_CLIENTE = $_REQUEST['CED_CLIENTE'];
        $NOMBRE_CLIENTE = $_REQUEST['NOMBRE_CLIENTE'];
        $APELLIDO_CLIENTE = $_REQUEST['APELLIDO_CLIENTE'];
        $FECHANA_CLIENTE = $_REQUEST['FECHANA_CLIENTE'];
        $TELEF_CLIENTE = $_REQUEST['TELEF_CLIENTE'];
        $DIRECCION_CLIENTE = $_REQUEST['DIRECCION_CLIENTE'];
        $PASS_CLIENTE = $_REQUEST['PASS_CLIENTE'];        
        try {
            $crudModel->crearCliente($CED_CLIENTE, $NOMBRE_CLIENTE, $APELLIDO_CLIENTE, $FECHANA_CLIENTE, $TELEF_CLIENTE, $DIRECCION_CLIENTE, $PASS_CLIENTE);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoC = $crudModel->getClientes();
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../view/Reservaciones.php');
        break;

//ACTUALIZAR
    case "actualizarClientes":
        $id_cliente = $_REQUEST['id_cliente'];
        $NOMBRE_CLIENTE = $_REQUEST['NOMBRE_CLIENTE'];
        $APELLIDO_CLIENTE = $_REQUEST['APELLIDO_CLIENTE'];
        $FECHANA_CLIENTE = $_REQUEST['FECHANA_CLIENTE'];
        $TELEF_CLIENTE = $_REQUEST['TELEF_CLIENTE'];
        $DIRECCION_CLIENTE = $_REQUEST['DIRECCION_CLIENTE'];
        $PASS_CLIENTE = $_REQUEST['PASS_CLIENTE']; 
        $crudModel->actualizarCliente($id_cliente, $CED_CLIENTE, $NOMBRE_CLIENTE, $APELLIDO_CLIENTE, $FECHANA_CLIENTE, $TELEF_CLIENTE, $DIRECCION_CLIENTE, $PASS_CLIENTE);
        $listadoC = $crudModel->getClientes();
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../view/ReservacionLogin.php');
        break;

    //////////////////
    //RESERVACIONES//
    /////////////////
    
    case "listarReservacion":
        $cliente = $_REQUEST['CED_CLIENTE'];
        $listadoReserva = $crudModel->getReservacion($cliente);
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //header('Location: ../View/ReservacionLogin.php');
        break;
    
    case "Reservaciones":
        $listadoReserva = $crudModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //header('Location: ../View/ReservacionLogin.php');
        break;
//CREAR
    case "crearReservacion":
        $id_reservacionb = $_REQUEST['id_reservacionb'];
        $_SESSION['id_reservacionb']=$id_reservacionb;
        $CED_CLIENTE = $_REQUEST['CED_CLIENTE'];
        $id_transporte = $_REQUEST['id_transporte'];
        $_SESSION['id_transporte']=$id_transporte;
        $id_destino = $_REQUEST['id_destino'];
        $_SESSION['id_destino']=$id_destino;
        $TIPO_DESTINO = $_REQUEST['TIPO_DESTINO'];
        $_SESSION['TIPO_DESTINO']=$TIPO_DESTINO;
        $CANTIDAD_BOLETOS = $_REQUEST['CANTIDAD_BOLETOS'];
        $_SESSION['CANTIDAD_BOLETOS']=$CANTIDAD_BOLETOS;
        $DETALLE_DESTINO = $_REQUEST['DETALLE_DESTINO'];
        $FECHA_RESERVA= $_REQUEST['FECHA_RESERVA'];
        $_SESSION['FECHA_RESERVA']=$FECHA_RESERVA;
        try {
            $crudModel->crearReservacion($id_reservacionb, $CED_CLIENTE, $id_transporte, $id_destino, $TIPO_DESTINO, $CANTIDAD_BOLETOS, $DETALLE_DESTINO, $FECHA_RESERVA);
            $crudModel->actualizarTransporte($id_transporte);
            $listadoTr = $crudModel->getTransportes($id_transporte);
            $_SESSION['listadoTr'] = serialize($listadoTr);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoReserva = $crudModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);

        header('Location: ../View/ReservacionLogin.php');
        break;

    case "eliminarReservacion":
        $id_reservab = $_REQUEST['id_reservab'];
        $id_transporte = $_REQUEST['id_transporte'];
        $id_destino = $_REQUEST['id_destino'];
        $crudModel->eliminarReservacion($id_reservab);
        $crudModel->actualizarTransporte1($id_transporte);
        $listadoReserva = $crudModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        header('Location: ../view/ReservacionLogin.php');
        break;

    case "actualizarReservacion":
        $id_reservacionb = $_REQUEST['id_reservab'];
        $CED_CLIENTE = $_REQUEST['CED_CLIENTE'];
        $id_transporte = $_REQUEST['id_transporte'];
        $id_transporte1 = $_REQUEST['id_transporte1'];
        $id_destino = $_REQUEST['id_destino'];
        $id_destino1 = $_REQUEST['id_destino1'];
        $TIPO_DESTINO = $_REQUEST['TIPO_DESTINO'];
        $CANTIDAD_BOLETOS = $_REQUEST['CANTIDAD_BOLETOS'];
        $DETALLE_DESTINO = $_REQUEST['DETALLE_DESTINO'];
        $FECHA_RESERVA = $_REQUEST['FECHA_RESERVA'];
        $crudModel->actualizarReservacion($id_reservacionb, $CED_CLIENTE, $id_transporte, $id_destino, $TIPO_DESTINO, $CANTIDAD_BOLETOS, $DETALLE_DESTINO, $FECHA_RESERVA);
        $crudModel->actualizarTransporte($id_transporte);    
        $crudModel->actualizarTransporte1($id_transporte1);
        $crudModel->actualizarDestino($id_destino);    
        $crudModel->actualizarDestino1($id_destino1);
        $listadoReserva = $crudModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        header('Location: ../view/ReservacionLogin.php');
        break;
}

switch ($opcion1) {

    ////////////////
    //USUARIO //
    ////////////
    case "iniciar_sesion1":
        $cedula = $_REQUEST['cedula'];
        $contrasenia = $_REQUEST['password'];
        $login = $crudModel->buscarUsuario($cedula, $contrasenia);
        $cliente = $crudModel->getCliente($cedula);

        try {
            if ($login == true) {
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = serialize($cliente);
                header("Location: ../view/ReservacionLogin.php");
            } else {
                $_SESSION['mensajeError'] = 'Datos incorrectos!! Vuelva a intentar';
                header("Location: ../view/Reservaciones.php");
            }
        } catch (Exception $e) {
            $_SESSION['mensajeError'] = 'Datos incorrectos!! Vuelva a intentar.';
        }
        break;


    case "iniciar_sesion":
        $cedula = $_REQUEST['cedula'];
        $contrasenia = $_REQUEST['password'];
        $cliente = $crudModel->getCliente($cedula);
        if ($cliente->getCED_CLIENTE() == NULL && $cliente->getPASS_CLIENTE() == NULL) {
            $_SESSION['mensajeError'] = 'Datos incorrectos!! Vuelva a intentar';
            header("Location: ../View/Reservaciones.php");
        } else
            {
            if ($cliente->getPASS_CLIENTE() != $contrasenia) {
            $_SESSION['mensajeContrase'] = 'Contraseña Incorrecta';
            header("Location: ../View/Reservaciones.php");
        } else
            {
            if ($cliente->getCED_CLIENTE() == $cedula && $cliente->getPASS_CLIENTE() == $contrasenia) {
                $_SESSION['usuario'] = serialize($cliente);
                header("Location: ../view/ReservacionLogin.php");
            }
            }}
        break;


    case "cerrar":
        unset($_SESSION['login']);
        session_destroy();
        header("Location: ../View/Reservaciones.php");
        break;
    
    case "aceptar":
        header("Location: ../View/ReservacionLogin.php");
        break;
    default :
}

