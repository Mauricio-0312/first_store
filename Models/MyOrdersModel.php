<?php
class MyOrdersModel{
    public $database;
    function __construct(){
        require "DbConection.php";

        $this->database = new DbConection();
        $this->conection = $this->database->connect();


    }

    function getOrders(){
       
        $consult = $this->conection->query("select * from pedidos order by id desc");
        return $consult;
    }

    function getProductsOrdered(){
       
        $consult = $this->conection->query("select lp.*, pro.nombre as 'nombre', lp.unidades as 'unidades' from lineas_pedidos lp inner join productos pro on pro.id = lp.producto_id");
        return $consult;
    }

    function ChangeOrderStatus($estado, $id){
       
        $consult = $this->conection->query("update pedidos set estado = '$estado' where id = $id");
        return $consult;
    }

   

}