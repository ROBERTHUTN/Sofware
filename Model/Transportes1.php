<?php

class Transportes1 {
    private $id_transporte;
    private $id_empleado;
    private $id_destino;
    private $COD_TRANSPORTE;
    private $NUM_TRANSPORTE;
    private $CAPACIDAD;
    private $PLACA;
    private $CONDUCTOR;
    private $COOPILOTO;
    private $ESTADO_ASIENTOS;
    
    function __construct($id_transporte, $id_empleado, $id_destino, $COD_TRANSPORTE, $NUM_TRANSPORTE, $CAPACIDAD, $PLACA, $CONDUCTOR, $COOPILOTO, $ESTADO_ASIENTOS) {
        $this->id_transporte = $id_transporte;
        $this->id_empleado = $id_empleado;
        $this->id_destino = $id_destino;
        $this->COD_TRANSPORTE = $COD_TRANSPORTE;
        $this->NUM_TRANSPORTE = $NUM_TRANSPORTE;
        $this->CAPACIDAD = $CAPACIDAD;
        $this->PLACA = $PLACA;
        $this->CONDUCTOR = $CONDUCTOR;
        $this->COOPILOTO = $COOPILOTO;
        $this->ESTADO_ASIENTOS = $ESTADO_ASIENTOS;
    }

    function getId_transporte() {
        return $this->id_transporte;
    }

    function getId_empleado() {
        return $this->id_empleado;
    }
    
    function getId_destino() {
        return $this->id_destino;
    }

    function getCOD_TRANSPORTE() {
        return $this->COD_TRANSPORTE;
    }

    function getNUM_TRANSPORTE() {
        return $this->NUM_TRANSPORTE;
    }

    function getCAPACIDAD() {
        return $this->CAPACIDAD;
    }

    function getPLACA() {
        return $this->PLACA;
    }

    function getCONDUCTOR() {
        return $this->CONDUCTOR;
    }

    function getCOOPILOTO() {
        return $this->COOPILOTO;
    }

    function getESTADO_ASIENTOS() {
        return $this->ESTADO_ASIENTOS;
    }

    function setId_transporte($id_transporte) {
        $this->id_transporte = $id_transporte;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }
    
    function setId_destino($id_destino) {
        $this->id_destino = $id_destino;
    }

    function setCOD_TRANSPORTE($COD_TRANSPORTE) {
        $this->COD_TRANSPORTE = $COD_TRANSPORTE;
    }

    function setNUM_TRANSPORTE($NUM_TRANSPORTE) {
        $this->NUM_TRANSPORTE = $NUM_TRANSPORTE;
    }

    function setCAPACIDAD($CAPACIDAD) {
        $this->CAPACIDAD = $CAPACIDAD;
    }

    function setPLACA($PLACA) {
        $this->PLACA = $PLACA;
    }

    function setCONDUCTOR($CONDUCTOR) {
        $this->CONDUCTOR = $CONDUCTOR;
    }

    function setCOOPILOTO($COOPILOTO) {
        $this->COOPILOTO = $COOPILOTO;
    }

    function setESTADO_ASIENTOS($ESTADO_ASIENTOS) {
        $this->ESTADO_ASIENTOS = $ESTADO_ASIENTOS;
    }
}
