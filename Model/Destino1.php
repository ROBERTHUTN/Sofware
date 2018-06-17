<?php

class Destino1 {
    private $id_destino;
    private $LUGAR_SALIDA;
    private $LUGAR_DESTINO; 
    private $HORA_SALIDA;
    private $VALOR_BOLETO;
    private $TIPO_DESTINO;
    
    function __construct($id_destino, $LUGAR_SALIDA, $LUGAR_DESTINO, $HORA_SALIDA, $VALOR_BOLETO, $TIPO_DESTINO) {
        $this->id_destino = $id_destino;
        $this->LUGAR_SALIDA = $LUGAR_SALIDA;
        $this->LUGAR_DESTINO = $LUGAR_DESTINO;
        $this->HORA_SALIDA = $HORA_SALIDA;
        $this->VALOR_BOLETO = $VALOR_BOLETO;
        $this->TIPO_DESTINO = $TIPO_DESTINO;
    }

    function getId_destino() {
        return $this->id_destino;
    }

    function getLUGAR_SALIDA() {
        return $this->LUGAR_SALIDA;
    }

    function getLUGAR_DESTINO() {
        return $this->LUGAR_DESTINO;
    }

    function getHORA_SALIDA() {
        return $this->HORA_SALIDA;
    }

    function getVALOR_BOLETO() {
        return $this->VALOR_BOLETO;
    }

    function getTIPO_DESTINO() {
        return $this->TIPO_DESTINO;
    }

    function setId_destino($id_destino) {
        $this->id_destino = $id_destino;
    }

    function setLUGAR_SALIDA($LUGAR_SALIDA) {
        $this->LUGAR_SALIDA = $LUGAR_SALIDA;
    }

    function setLUGAR_DESTINO($LUGAR_DESTINO) {
        $this->LUGAR_DESTINO = $LUGAR_DESTINO;
    }

    function setHORA_SALIDA($HORA_SALIDA) {
        $this->HORA_SALIDA = $HORA_SALIDA;
    }

    function setVALOR_BOLETO($VALOR_BOLETO) {
        $this->VALOR_BOLETO = $VALOR_BOLETO;
    }

    function setTIPO_DESTINO($TIPO_DESTINO) {
        $this->TIPO_DESTINO = $TIPO_DESTINO;
    }
}
