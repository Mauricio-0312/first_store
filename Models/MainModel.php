<?php

class MainModel{
    public $database;
    function __construct(){
        require "DbConection.php";

        $this->database = new DbConection();
        $this->conection = $this->database->connect();

    }

    function categories(){

        $consult = $this->conection->query("Select nombre from categorias");
        return $consult;
    }

    function insertCategory($nombre){

        $consult = $this->conection->query("insert into categorias values(null, '$nombre')");
        return $consult;
    }

    function insertProduct($category, $name, $description, $price, $stock, $ofert, $image){
        
        $searchCategoryId = $this->conection->query("select id from categorias where nombre = '$category'");
        $category = $searchCategoryId->fetch_assoc();
        $categoryId = $category["id"];
        
        $consult = $this->conection->query("insert into productos values(null, $categoryId, '$name', '$description', $price, $stock, '$ofert', CURDATE(), '$image')");
        return $consult;
    }

    //Get All Products
    function getProducts(){
        $consult = $this->conection->query("select * from productos" );
        return $consult;
    }

    //Get products by category
    function getProductsByCategory($category){

        $consult = $this->conection->query("select p.* from productos p inner join categorias c on p.categoria_id = c.id where c.nombre = '$category'");
        return $consult;
    }

    //Get only one product
    function getProduct($id){
        $consult = $this->conection->query("select p.*, c.nombre as 'categoria' from productos p inner join categorias c on p.categoria_id = c.id where p.id = $id");
        return $consult;
    }

    function deleteProduct($id){
        $consult = $this->conection->query("delete from productos where id=$id");
        return $consult;
    }

    function editProduct($id, $nombre, $category, $descripcion, $precio, $stock, $oferta, $imagen){
        $searchCategoryId = $this->conection->query("select id from categorias where nombre = '$category'");
        $category = $searchCategoryId->fetch_assoc();
        $categoryId = $category["id"];

        $consult = $this->conection->query("update productos set nombre = '$nombre', descripcion = '$descripcion', precio = $precio, stock = $stock, oferta = '$oferta', categoria_id = $categoryId, imagen = '$imagen' where id = $id");
        return $consult;
    }


}
?>
