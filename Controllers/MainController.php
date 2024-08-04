<?php

class MainController{
    public $categories;
    public $model;

    public function __construct(){
        require_once "Models/MainModel.php";
        $this->model = new MainModel();
    }

    public function categories(){
        
       
        require_once "Templates/Categories.php";

            
    }





    
    public function adminCategories(){
        if(isset($_POST["categoryName"])){
            $categoryName = trim($_POST["categoryName"]);
            if(empty($categoryName)){
                $_SESSION["category-error"] = "Ingrese el nombre de la categoria";
            }
            else{
                $this->model->insertCategory($categoryName);
                $_SESSION["categoryAdded"] = "Categoria añadida";

            }

        }
        header("location: index.php?controller=MainController&action=categories");

    }

    public function addProducts(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $productsGotten = $this->model->getProduct($id);
            if($product = $productsGotten->fetch_assoc()){
                $name = $product['nombre'];
                $description = $product['descripcion'];
                $price = $product['precio'];
                $stock = $product['stock'];
                $ofert = $product['oferta'];
                $image = $product['imagen'];
                $categoryGot = $product['categoria'];
                $id = $product["id"];
    
            }
        }
        require_once "Templates/AddProducts.php";
      
    }

    public function insertProduct(){
        if(isset($_POST["productName"]) && isset($_POST["productPrice"]) && isset($_POST["productDescription"]) &&
        isset($_POST["productStock"]) && isset($_POST["productOfert"]) && isset($_POST["productCategory"])
        ){
            $productName = trim($_POST["productName"]);
            $productPrice = trim($_POST["productPrice"]);
            $productDescription = trim($_POST["productDescription"]);
            $productStock = trim($_POST["productStock"]);
            $productOfert = trim($_POST["productOfert"]);
            $productCategory = trim($_POST["productCategory"]);
            $productImage = $_FILES['productImage'];
            $imageName = $productImage['name'];

            if(empty($productName)){
                $_SESSION["product-name-error"] = "Ingrese el nombre del producto $imageName";
            }
            if(empty($productPrice) || !filter_var($productPrice, FILTER_VALIDATE_FLOAT)){
                $_SESSION["product-price-error"] = "Ingrese el precio ";
            }
            if(empty($productDescription)){
                $_SESSION["product-description-error"] = "Ingrese la descripcion";
            }
            if(empty($productStock) || !filter_var($productStock, FILTER_VALIDATE_INT)){
                $_SESSION["product-stock-error"] = "Ingrese la cantidad que hay en stock";
            }
            if(empty($productOfert)){
                $_SESSION["product-ofert-error"] = "Seleccione si es oferta o no";
            }
            if(empty($productCategory)){
                $_SESSION["product-category-error"] = "Seleccione la categoria";
            }
            if(empty($imageName)){
                $_SESSION["product-image-error"] = "Suba la imagen del producto ";
            }
            if(!isset($_SESSION["product-image-error"]) && !isset($_SESSION["product-category-error"]) &&
            !isset($_SESSION["product-ofert-error"]) && !isset($_SESSION["product-stock-error"]) &&
            !isset($_SESSION["product-description-error"]) && !isset($_SESSION["product-price-error"]) &&
            !isset($_SESSION["product-name-error"])){
                if(isset($_GET["id"]) && $_GET["id"] == null){ 
                    $this->model->insertProduct($productCategory, $productName, $productDescription, $productPrice, $productStock, $productOfert, $imageName);
                    $_SESSION["productAdded"] = "Producto publicado";

                }
                if(isset($_GET["id"])  && $_GET["id"] != null){
                    $id = $_GET["id"];
                    $this->model->editProduct($id, $productName, $productCategory,  $productDescription, $productPrice, $productStock, $productOfert, $imageName);
                    $_SESSION["productAdded"] = "Producto editado";
                }
                move_uploaded_file($productImage['tmp_name'], "images/".$imageName);

                

            }

        }
        header("location: index.php?controller=MainController&action=addProducts");

    }

    public function logOut(){
        session_destroy();
        header("location: index.php");

    }

    public function firstPage(){
        if(isset($_GET["category"])){ 
            $category = $_GET["category"];
                $productsGotten = $this->model->getProductsByCategory($category);
        }else{
            $productsGotten = $this->model->getProducts();
        }
        require_once "Templates/ProductsView.php";
    }

    public function productPage(){
        $id = $_GET["id"];
        $productsGotten = $this->model->getProduct($id);
        if($product = $productsGotten->fetch_assoc()){
            $name = $product['nombre'];
            $description = $product['descripcion'];
            $price = $product['precio'];
            $stock = $product['stock'];
            $ofert = $product['oferta'];
            $image = $product['imagen'];
            $category = $product['categoria'];
            $id = $product["id"];

        }
        require_once "Templates/ProductView.php";
    }

    public function deleteProduct(){
        $id = $_GET["id"];
        $productsGotten = $this->model->getProduct($id);
        $product = $productsGotten->fetch_assoc();
        unlink("images/".$product['imagen']);
        $this->model->deleteProduct($id);
        header("location: index.php");
    }
}

?>