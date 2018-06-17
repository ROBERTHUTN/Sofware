<?php
include_once 'Database.php';
include_once 'Clientes1.php';
include_once 'Transportes1.php';
include_once 'Destino1.php';
include_once 'Reservaciones1.php';

class CrudModel {
    
        
                    ///////////////
                    //RESERVACION//
                    //////////////
    //Get todo
    public function getReservaciones(){
        $pdo = Database::connect();
        $sql = "select * from reserva_boleto order by id_reservab asc";
        $resultado = $pdo->query($sql);
        $listadoReserva = array();
        foreach ($resultado as $res) {
            $rese = new Reservaciones1($res['id_reservab'],$res['CED_CLIENTE'],$res['id_transporte'],$res['id_destino'],$res['TIPO_DESTINO'],$res['CANTIDAD_BOLETOS']
                    ,$res['DETALLE_DESTINO'],$res['FECHA_RESERVA']);
            array_push($listadoReserva, $rese);
        }
        Database::disconnect();
        return $listadoReserva;
    }    

    //Get uno solo
    public function getReservacion($CED_CLIENTE) {
        $pdo = Database::connect();
        $sql = "select * from reserva_boleto where id_reservab=".$CED_CLIENTE; 
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CED_CLIENTE));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $reservaciones = new reservaciones($res['id_reservab'],$res['CED_CLIENTE'],$res['id_transporte'],$res['id_destino'],$res['TIPO_DESTINO']
                ,$res['CANTIDAD_BOLETOS'],$res['FECHA_RESERVA']);
        Database::disconnect();
        return $reservaciones;
    }
    
    //CREAR
    public function crearReservacion($id_reservab,$CED_CLIENTE,$id_transporte,$id_destino,$TIPO_DESTINO,$CANTIDAD_BOLETOS,$DETALLE_DESTINO,$FECHA_RESERVA){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into reserva_boleto(id_reservab,CED_CLIENTE,id_transporte,id_detino,TIPO_DESTINO,CANTIDAD_BOLETOS,DETALLE_DESTINO,FECHA_RESERVA) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);        
        try{
            $consulta->execute(array($id_reservab,$CED_CLIENTE,$id_transporte,$id_destino,$TIPO_DESTINO,$CANTIDAD_BOLETOS,$DETALLE_DESTINO,$FECHA_RESERVA));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
          Database::disconnect();
    }
    //ELIMINAR
    public function eliminarReservacion($id_reservab) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from reserva_boleto where id_reservab=".$id_reservab;
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_reservab));
        Database::disconnect();
    }
    //ACTUALIZAR  
    public function actualizarReservacion($id_reservab,$CED_CLIENTE,$id_transporte,$id_destino,$TIPO_DESTINO,$CANTIDAD_BOLETOS,$DETALLE_DESTINO,$FECHA_RESERVA){
        $pdo = Database::connect();
        $sql = "update reserva_boleto set CED_CLIENTE=?,id_transporte=?,id_destino=?,TIPO_DESTINO=?,CANTIDAD_BOLETOS=?,DETALLE_DESTINO=?,FECHA_RESERVA=? where id_reservab=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CED_CLIENTE,$id_transporte,$id_destino,$TIPO_DESTINO,$CANTIDAD_BOLETOS,$DETALLE_DESTINO,$FECHA_RESERVA,$id_reservab));
        Database::disconnect();
    }
    public function idReserva(){
        $pdo = Database::connect();
        $sql = "select max(id_reservab) as numC from reserva_boleto";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        if($res['numC']==NULL){
            $nuevoNumC=1;
        }else{
            $nuevoNumC = $res['numC']+1;
        }
        $ceros="";
        for($i=strlen($nuevoNumC);$i<5;$i++){
            $ceros=$ceros."0";
        }
        
        $ceros=$ceros.$nuevoNumC;
        Database::disconnect();
        return $ceros;
    }
    
        
        
                    ///////////
                    //CLIENTE//
                    //////////    
    //Get todo
    public function getClientes(){
        $pdo = Database::connect();
        $sql = "select * from cliente order by id_cliente asc";
        $resultado = $pdo->query($sql);
        $listadoC = array();
        foreach ($resultado as $res) {
            $cli = new Clientes1($res['id_cliente'],$res['CED_CLIENTE'], $res['NOMBRE_CLIENTE'],$res['APELLIDO_CLIENTE'], $res['FECHANA_CLIENTE'],$res['TELEF_CLIENTE'], $res['DIRECCION_CLIENTE'],$res['PASS_CLIENTE']);
            array_push($listadoC, $cli);
        }
        Database::disconnect();
        return $listadoC;
    }    

    //Get uno solo
    public function getCliente($CED_CLIENTE) {
        $pdo = Database::connect();
        $sql = "select * from cliente where CED_CLIENTE=?"; 
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CED_CLIENTE));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = new Clientes1($res['id_cliente'],$res['CED_CLIENTE'], $res['NOMBRE_CLIENTE'],$res['APELLIDO_CLIENTE'], $res['FECHANA_CLIENTE'],$res['TELEF_CLIENTE'], $res['DIRECCION_CLIENTE'],$res['PASS_CLIENTE']);
        Database::disconnect();
        return $cliente;
    }
    //CREAR
    public function crearClientes($id_cliente,$CED_CLIENTE, $NOMBRE_CLIENTE,$APELLIDO_CLIENTE, $FECHANA_CLIENTE,$TELEF_CLIENTE, $DIRECCION_CLIENTE,$PASS_CLIENTE){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into cliente (id_cliente,CED_CLIENTE, NOMBRE_CLIENTE,APELLIDO_CLIENTE, FECHANA_CLIENTE,TELEF_CLIENTE, DIRECCION_CLIENTE,PASS_CLIENTE) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);        
        try{
            $consulta->execute(array($id_cliente,$CED_CLIENTE, $NOMBRE_CLIENTE,$APELLIDO_CLIENTE, $FECHANA_CLIENTE,$TELEF_CLIENTE, $DIRECCION_CLIENTE,$PASS_CLIENTE));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
          Database::disconnect();
    }
    //ELIMINAR
    public function eliminarCliente($CED_CLIENTE) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from cliente where CED_CLIENTE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CED_CLIENTE));
        Database::disconnect();
    }
    //ACTUALIZAR
    public function actualizarCliente($id_cliente,$CED_CLIENTE, $NOMBRE_CLIENTE,$APELLIDO_CLIENTE, $FECHANA_CLIENTE,$TELEF_CLIENTE, $DIRECCION_CLIENTE,$PASS_CLIENTE){
        $pdo = Database::connect();
        $sql = "update cliente set CED_CLIENTE=?,NOMBRE_CLIENTE=?,APELLIDO_CLIENTE=?,FECHANA_CLIENTE=?,TELEL_CLIENTE=?,DIRECCION_CLIENTE=?,PASS_CLIENTE=? where id_cliente=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CED_CLIENTE, $NOMBRE_CLIENTE,$APELLIDO_CLIENTE, $FECHANA_CLIENTE,$TELEF_CLIENTE, $DIRECCION_CLIENTE,$PASS_CLIENTE,$id_cliente));
        Database::disconnect();
    }
    
    public function idCliente(){
        $pdo = Database::connect();
        $sql = "select max(id_cliente) as numC from cliente";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        if($res['numC']==NULL){
            $nuevoNumC=1;
        }else{
            $nuevoNumC = $res['numC']+1;
        }
        $ceros="";
        for($i=strlen($nuevoNumC);$i<5;$i++){
            $ceros=$ceros."0";
        }
        
        $ceros=$ceros.$nuevoNumC;
        Database::disconnect();
        return $ceros;
    }

                    /////////////
                   ///DESTINOS//
                  /////////////    
    
    public function getDestinoTipo($TIPO_DESTINO) {
        $pdo = Database::connect();
        $sql = "select * from destino where TIPO_DESTINO='".$TIPO_DESTINO."'"; 
        $resultado = $pdo->query($sql);
        $listadoDestinoTipo = array();
        foreach ($resultado as $res) {
            $destino = new Destino1($res['id_destino'],$res['LUGAR_SALIDA'],$res['LUGAR_DESTINO'],$res['id_transporte'],$res['HORA_SALIDA'],$res['VALOR_BOLETO'],$res['TIPO_DESTINO']);
            array_push($listadoDestinoTipo, $destino);
        }
        Database::disconnect();
        return $listadoDestinoTipo;
    }
        
                      ///////////////
                     //TRANSPORTES//
                    ///////////////
    //GET TODOS
    public function getTransportes($id_transporte){
        $pdo = Database::connect();
        $sql = "update transporte set ESTADO_ASIENTOS='Ocupada' where id_transporte=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_transporte));
        Database::disconnect();
    }
    //GET UNO SOLO
    public function getTransporte($COD_TRANSPORTE, $ESTADO_ASIENTOS) {
        $pdo = Database::connect();
        $sql = "select * from transporte where COD_TRANSPORTE=".$COD_TRANSPORTE." && ESTADO_ASIENTOS='".$ESTADO_ASIENTOS."'"; 
        $resultado = $pdo->query($sql);
        $listadoTransportes = array();
        foreach ($resultado as $res) {
            $transporte = new Transportes1($res['id_transporte'],$res['id_empleado'],$res['id_destino'],$res['COD_TRANSPORTE'],$res['NUM_TRANSPORTE']
                    ,$res['CAPACIDAD'],$res['PLACA'],$res['CONDUCTOR'],$res['COOPILOTO'],$res['ESTADO_ASIENTOS']);
            array_push($listadoTransportes, $transporte);
        }
        Database::disconnect();
        return $listadoTransportes;
    }
    public function actualizarTransporte($id_transporte){
        $pdo = Database::connect();
        $sql = "update transporte set ESTADO_ASIENTOS='Ocupada' where id_transporte=".$id_transporte;
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_transporte));
        Database::disconnect();
    }
    public function actualizarTransporte1($id_mesa1){
        $pdo = Database::connect();
        $sql = "update transporte set ESTADO_ASIENTOS='Disponible' where id_mesa=".$id_mesa1;
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_mesa1));
        Database::disconnect();
    }
}