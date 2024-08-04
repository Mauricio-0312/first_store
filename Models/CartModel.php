<?php
class CartModel{
    public $database;
    function __construct(){
        require "DbConection.php";

        $this->database = new DbConection();
        $this->conection = $this->database->connect();


    }

    function addToCart($producto_id, $unidades,  $usuario_id,  $carrito){
       
        $consult = $this->conection->query("insert into lineas_pedidos values(null, null, $producto_id, $unidades, $usuario_id, $carrito)");

        return $consult;
    }

    function UpdateProductStock($producto_id, $newStock){
        $consult = $this->conection->query("update productos set stock = $newStock where id = $producto_id");
        return $consult;

    }

    function getProduct($id){
         
        $consult = $this->conection->query("select stock from productos where id = $id");
        return $consult;
    }

    function getProductsInCart($usuario_id){
       
        $consult = $this->conection->query("select p.*, lp.carrito as 'carrito', lp.unidades as 'unidades', lp.id as 'id_productLine' from productos p inner join lineas_pedidos lp on lp.producto_id = p.id where lp.usuario_id = $usuario_id and lp.carrito = true");
        return $consult;
    }

    function makeOrder($usuario_id, $municipio, $localidad, $direccion,  $costo){
       
        $consult = $this->conection->query("insert into pedidos values(null, $usuario_id, '$municipio', '$localidad', '$direccion', $costo, 'En progreso', curdate(), curtime())");
        return $consult;
    }

    function updateOrderLines($pedido_id, $usuario_id ){
        $consult = $this->conection->query("update lineas_pedidos set pedido_id = $pedido_id where usuario_id = $usuario_id and carrito = true");
        return $consult;
    }

    function getOrder( $usuario_id, $costo){
        
        $consult = $this->conection->query("select id from pedidos where usuario_id =  $usuario_id and costo = $costo and fecha = curdate() and hora = curtime()");
        return $consult;
    }

    function removeProductsOrdered( $usuario_id ){
        $consult = $this->conection->query("update lineas_pedidos set carrito = false where usuario_id = $usuario_id and carrito = true");
        return $consult;
    }

    function deleteProductFromCart($id){
        $consult = $this->conection->query("delete from lineas_pedidos where id = $id");
        return $consult;
    }

}