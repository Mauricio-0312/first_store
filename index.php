<?php 
        session_start(); 
        require "autoload.php";
      
        require "helpers/helpers.php";
?>
<?php 
    
    
    $helpers = new helpers();
    $CategoriesController = new CategoriesController();
    $CategoriesController->getCategories();
   ?>

<?php require "Templates/Header.php"; ?>


<?php require "Templates/LeftSide.php"; ?>
        <div id="content">
        <?php 
    if(isset($_GET["controller"]) && isset($_GET["action"])){
        $controller = $_GET["controller"];
        $action = $_GET["action"];

        if(class_exists($controller) && method_exists($controller, $action)){
            $actual_controller = new $controller();
            $actual_controller->$action();
        }else{
            echo "no existe la clase";
        }
       
    }
    else{
        $actual_controller = new MainController();
        $actual_controller->firstPage();
    }
 ?> 
        </div>

<?php 

    require "Templates/Footer.php"; 
    
?>