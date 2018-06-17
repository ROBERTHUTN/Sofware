<?php

class Reservaciones1 {
    private $id_reservab;
    private $CED_CLIENTE;
    private $id_transporte;
    private $id_destino;
    private $TIPO_DESTINO;
    private $CANTIDAD_BOLETOS;
    private $ASIENTOS;
    private $DETALLE_DESTINO;
    private $FECHA_RESERVA;
    
    function __construct($id_reservab, $CED_CLIENTE, $id_transporte, $id_destino, $TIPO_DESTINO, $CANTIDAD_BOLETOS, $ASIENTOS, $DETALLE_DESTINO, $FECHA_RESERVA) {
        $this->id_reservab = $id_reservab;
        $this->CED_CLIENTE = $CED_CLIENTE;
        $this->id_transporte = $id_transporte;
        $this->id_destino = $id_destino;
        $this->TIPO_DESTINO = $TIPO_DESTINO;
        $this->CANTIDAD_BOLETOS = $CANTIDAD_BOLETOS;
        $this->ASIENTOS = $ASIENTOS;
        $this->DETALLE_DESTINO = $DETALLE_DESTINO;
        $this->FECHA_RESERVA = $FECHA_RESERVA;
    }
    
    function getId_reservab() {
        return $this->id_reservab;
    }

    function getCED_CLIENTE() {
        return $this->CED_CLIENTE;
    }

    function getId_transporte() {
        return $this->id_transporte;
    }

    function getId_destino() {
        return $this->id_destino;
    }

    function getTIPO_DESTINO() {
        return $this->TIPO_DESTINO;
    }

    function getCANTIDAD_BOLETOS() {
        return $this->CANTIDAD_BOLETOS;
    }

    function getASIENTOS() {
        return $this->ASIENTOS;
    }

    function getDETALLE_DESTINO() {
        return $this->DETALLE_DESTINO;
    }

    function getFECHA_RESERVA() {
        return $this->FECHA_RESERVA;
    }

    function setId_reservab($id_reservab) {
        $this->id_reservab = $id_reservab;
    }

    function setCED_CLIENTE($CED_CLIENTE) {
        $this->CED_CLIENTE = $CED_CLIENTE;
    }

    function setId_transporte($id_transporte) {
        $this->id_transporte = $id_transporte;
    }

    function setId_destino($id_destino) {
        $this->id_destino = $id_destino;
    }

    function setTIPO_DESTINO($TIPO_DESTINO) {
        $this->TIPO_DESTINO = $TIPO_DESTINO;
    }

    function setCANTIDAD_BOLETOS($CANTIDAD_BOLETOS) {
        $this->CANTIDAD_BOLETOS = $CANTIDAD_BOLETOS;
    }

    function setASIENTOS($ASIENTOS) {
        $this->ASIENTOS = $ASIENTOS;
    }

    function setDETALLE_DESTINO($DETALLE_DESTINO) {
        $this->DETALLE_DESTINO = $DETALLE_DESTINO;
    }

    function setFECHA_RESERVA($FECHA_RESERVA) {
        $this->FECHA_RESERVA = $FECHA_RESERVA;
    }

}
