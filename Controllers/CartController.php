<?php

class CartController{
    public $model;

    public function __construct(){
        require_once "Models/CartModel.php";
        $this->model = new CartModel();

    }

    public function showTemplate(){

      
         require_once "Templates/Cart.php";
     
    }

    public function addToCart(){
        $product_id = $_GET["product_id"];
        $amount = $_POST["amount"];
        $consult = $this->model->getProduct($product_id);
        if($product = $consult->fetch_assoc()){
            $stock = $product["stock"];
        }
        $stockCalc = $stock - $amount;
        if($stockCalc < 0 || $amount < 0){
            $_SESSION["stock-error"] = "Esta cantidad de unidades no esta disponible";
        }
        else{
            $this->model->addToCart($product_id, $amount, $_SESSION["id"], true);
            $this->model->UpdateProductStock($product_id,  $stockCalc);

            $_SESSION["productInCart"] = "Producto Añadido al carrito exitosamente";

        }
        header("location: index.php?controller=MainController&action=productPage&id=$product_id");
    }

    public function getProductsInCart(){

        $consult = $this->model->getProductsInCart($_SESSION["id"]);
        $consult2 = $this->model->getProductsInCart($_SESSION["id"]);

        require_once "Templates/Cart.php";
    }

    function makeOrder(){

        $consult = $this->model->getProductsInCart($_SESSION["id"]);
        $consultForTotal = $this->model->getProductsInCart($_SESSION["id"]);
        $total=0;
        $costoTable = 0;
        while($totalFetch = $consultForTotal->fetch_assoc()){ 
         
                $total += ($totalFetch["precio"]*$totalFetch["unidades"]);
        }
       
       
        require_once "Templates/MakeOrder.php";

        
    }

    function makeFinalOrder(){
     
        if(isset($_POST["direccion"]) && isset($_POST["localidad"]) && isset($_POST["municipio"])){
            $municipio = trim($_POST["municipio"]);
            $localidad = trim($_POST["localidad"]);
            $direccion = trim($_POST["direccion"]);
            $costo = trim($_GET["costo"]);

            if(empty($municipio)){
                $_SESSION["municipio-error"] = "Requerido";
            }
            if(empty($localidad)){
                $_SESSION["localidad-error"] = "Requerido";
            }
            if(empty($direccion)){
                $_SESSION["direccion-error"] = "Requerido";
            }

            if(!isset($_SESSION["direccion-error"]) && !isset($_SESSION["localidad-error"]) &&
                !isset($_SESSION["municipio-error"])){
                    $order =$this->model->makeOrder($_SESSION["id"], $municipio, $localidad, $direccion, $costo);
                    $getOrder = $this->model->getOrder($_SESSION["id"], $costo);
                    if($orderFetch = $getOrder->fetch_assoc()){
                        $orderId = $orderFetch["id"];
                    }
                    
                    $updateOrderLinesId = $this->model->updateOrderLines($orderId ,$_SESSION["id"]);
                    $this->model->removeProductsOrdered($_SESSION["id"]);

                    $_SESSION["orderDone"] = "Pedido hecho exitosamente";
            }
            else{
                $_SESSION["orderFailed"] = "Pedido Fallido";
            }
            header("location: index.php?controller=CartController&action=makeOrder");


        }


    }

    function deleteProductInCart(){
         $this->model->deleteProductFromCart($_GET["id"]);
         header("location: index.php?controller=CartController&action=getProductsInCart");

    }
}
?>