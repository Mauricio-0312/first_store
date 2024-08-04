<?php

class CategoriesController{




    function getCategories(){
        $newMysql = new mysqli("localhost", "root", "", "tienda_master");
        $consult = $newMysql->query("select nombre from categorias");
        $categories = array();
        while($category = $consult->fetch_assoc()){
            array_push($categories, $category["nombre"]);
        }
        $_SESSION["categories"] = $categories;
    }
}