<?php

class Clientes1 {

    private $id_cliente;
    private $CED_CLIENTE;
    private $NOMBRE_CLIENTE;
    private $APELLIDO_CLIENTE;
    private $FECHANA_CLIENTE;
    private $TELEF_CLIENTE;
    private $DIRECCION_CLIENTE;
    private $PASS_CLIENTE;
    
    function __construct($id_cliente, $CED_CLIENTE, $NOMBRE_CLIENTE, $APELLIDO_CLIENTE, $FECHANA_CLIENTE, $TELEF_CLIENTE, $DIRECCION_CLIENTE, $PASS_CLIENTE) {
        $this->id_cliente = $id_cliente;
        $this->CED_CLIENTE = $CED_CLIENTE;
        $this->NOMBRE_CLIENTE = $NOMBRE_CLIENTE;
        $this->APELLIDO_CLIENTE = $APELLIDO_CLIENTE;
        $this->FECHANA_CLIENTE = $FECHANA_CLIENTE;
        $this->TELEF_CLIENTE = $TELEF_CLIENTE;
        $this->DIRECCION_CLIENTE = $DIRECCION_CLIENTE;
        $this->PASS_CLIENTE = $PASS_CLIENTE;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getCED_CLIENTE() {
        return $this->CED_CLIENTE;
    }

    function getNOMBRE_CLIENTE() {
        return $this->NOMBRE_CLIENTE;
    }

    function getAPELLIDO_CLIENTE() {
        return $this->APELLIDO_CLIENTE;
    }

    function getFECHANA_CLIENTE() {
        return $this->FECHANA_CLIENTE;
    }

    function getTELEF_CLIENTE() {
        return $this->TELEF_CLIENTE;
    }

    function getDIRECCION_CLIENTE() {
        return $this->DIRECCION_CLIENTE;
    }

    function getPASS_CLIENTE() {
        return $this->PASS_CLIENTE;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setCED_CLIENTE($CED_CLIENTE) {
        $this->CED_CLIENTE = $CED_CLIENTE;
    }

    function setNOMBRE_CLIENTE($NOMBRE_CLIENTE) {
        $this->NOMBRE_CLIENTE = $NOMBRE_CLIENTE;
    }

    function setAPELLIDO_CLIENTE($APELLIDO_CLIENTE) {
        $this->APELLIDO_CLIENTE = $APELLIDO_CLIENTE;
    }

    function setFECHANA_CLIENTE($FECHANA_CLIENTE) {
        $this->FECHANA_CLIENTE = $FECHANA_CLIENTE;
    }

    function setTELEF_CLIENTE($TELEF_CLIENTE) {
        $this->TELEF_CLIENTE = $TELEF_CLIENTE;
    }

    function setDIRECCION_CLIENTE($DIRECCION_CLIENTE) {
        $this->DIRECCION_CLIENTE = $DIRECCION_CLIENTE;
    }

    function setPASS_CLIENTE($PASS_CLIENTE) {
        $this->PASS_CLIENTE = $PASS_CLIENTE;
    }

}