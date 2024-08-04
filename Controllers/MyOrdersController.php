<?php

class MyOrdersController{
    public $model;

    public function __construct(){
        require_once "Models/MyOrdersModel.php";
        $this->model = new MyOrdersModel();

    }

    public function showTemplate(){

        $consultOrders = $this->model->getOrders();
        

         require_once "Templates/MyOrders.php";
     
    }

    function ChangeOrderStatus(){
        $this->model->ChangeOrderStatus($_POST["status"], $_GET["orderId"]);
        header("location: index.php?controller=MyOrdersController&action=showTemplate");
    }


}
?>