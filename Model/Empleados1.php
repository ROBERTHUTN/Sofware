<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleados1
 *
 * @author Liz OA
 */
class Empleados1 {
    private $id_empleado;
    private $CED_EMPLEADO;
    private $TIPO_EMPLEADO;
    private $NOMBRE_EMPLEADO;
    private $APELLIDO_EMPLEADO;
    private $FECHANA_EMPLEADO;
    private $TIPOSA_EMPLEADO;
    private $SUELDO_EMPLEADO;
    private $DIRECCION_DIRECCION;
    
    function __construct($id_empleado, $CED_EMPLEADO, $TIPO_EMPLEADO, $NOMBRE_EMPLEADO, $APELLIDO_EMPLEADO, $FECHANA_EMPLEADO, $TIPOSA_EMPLEADO, $SUELDO_EMPLEADO, $DIRECCION_DIRECCION) {
        $this->id_empleado = $id_empleado;
        $this->CED_EMPLEADO = $CED_EMPLEADO;
        $this->TIPO_EMPLEADO = $TIPO_EMPLEADO;
        $this->NOMBRE_EMPLEADO = $NOMBRE_EMPLEADO;
        $this->APELLIDO_EMPLEADO = $APELLIDO_EMPLEADO;
        $this->FECHANA_EMPLEADO = $FECHANA_EMPLEADO;
        $this->TIPOSA_EMPLEADO = $TIPOSA_EMPLEADO;
        $this->SUELDO_EMPLEADO = $SUELDO_EMPLEADO;
        $this->DIRECCION_DIRECCION = $DIRECCION_DIRECCION;
    }

    function getId_empleado() {
        return $this->id_empleado;
    }

    function getCED_EMPLEADO() {
        return $this->CED_EMPLEADO;
    }

    function getTIPO_EMPLEADO() {
        return $this->TIPO_EMPLEADO;
    }

    function getNOMBRE_EMPLEADO() {
        return $this->NOMBRE_EMPLEADO;
    }

    function getAPELLIDO_EMPLEADO() {
        return $this->APELLIDO_EMPLEADO;
    }

    function getFECHANA_EMPLEADO() {
        return $this->FECHANA_EMPLEADO;
    }

    function getTIPOSA_EMPLEADO() {
        return $this->TIPOSA_EMPLEADO;
    }

    function getSUELDO_EMPLEADO() {
        return $this->SUELDO_EMPLEADO;
    }

    function getDIRECCION_DIRECCION() {
        return $this->DIRECCION_DIRECCION;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    function setCED_EMPLEADO($CED_EMPLEADO) {
        $this->CED_EMPLEADO = $CED_EMPLEADO;
    }

    function setTIPO_EMPLEADO($TIPO_EMPLEADO) {
        $this->TIPO_EMPLEADO = $TIPO_EMPLEADO;
    }

    function setNOMBRE_EMPLEADO($NOMBRE_EMPLEADO) {
        $this->NOMBRE_EMPLEADO = $NOMBRE_EMPLEADO;
    }

    function setAPELLIDO_EMPLEADO($APELLIDO_EMPLEADO) {
        $this->APELLIDO_EMPLEADO = $APELLIDO_EMPLEADO;
    }

    function setFECHANA_EMPLEADO($FECHANA_EMPLEADO) {
        $this->FECHANA_EMPLEADO = $FECHANA_EMPLEADO;
    }

    function setTIPOSA_EMPLEADO($TIPOSA_EMPLEADO) {
        $this->TIPOSA_EMPLEADO = $TIPOSA_EMPLEADO;
    }

    function setSUELDO_EMPLEADO($SUELDO_EMPLEADO) {
        $this->SUELDO_EMPLEADO = $SUELDO_EMPLEADO;
    }

    function setDIRECCION_DIRECCION($DIRECCION_DIRECCION) {
        $this->DIRECCION_DIRECCION = $DIRECCION_DIRECCION;
    }
}
