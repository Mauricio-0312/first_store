<?php

class LeftSideController{
    public $model;
    public function __construct(){
        require_once "Models/LeftSideModel.php";
        $this->model = new LeftSideModel();

    }

    public function showTemplate(){

      
         require_once "Templates/LeftSide.php";
     
    }

    public function register(){

        if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["lastName"]) && isset($_POST["password"])){
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $lastName = trim($_POST["lastName"]);
            $password = trim($_POST["password"]);
            $errors = array();
            if(empty($name)){
                $_SESSION["name-error"] = "Coloque su nombre";
            }
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION["email-error"] = "Coloque su correo completo";
            }
            if(empty($lastName)){
                $_SESSION["lastName-error"] = "Coloque su apellido";
            }
            if(empty($password) || strlen($password) < 8){
               $_SESSION["password-error"] = "La contraseña debe tener al menos 8 caracteres";
            }
            if(!isset($_SESSION["password-error"]) && !isset($_SESSION["name-error"]) 
                && !isset($_SESSION["lastName-error"]) && !isset($_SESSION["email-error"])){ 
                $this->model->registerConsult($name, $lastName, $email, $password);
                $_SESSION["registered"] = "Usuario $name registrado";
            }
            
            header("location: index.php?controller=MainController&action=firstPage");
           
        }


    }

    public function login(){

        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            if(empty($email)){
                $_SESSION["email-login-error"] = "Coloque su correo";
            }
            if(empty($password) ){
               $_SESSION["password-login-error"] = "Coloque su contraseña";
            }
            if(!isset($_SESSION["email-login-error"]) && !isset($_SESSION["password-login-error"])){ 
                $consult = $this->model->loginConsult($email, $password);
                $user = $consult->fetch_assoc();
                if($user){
                    $_SESSION["name"] = $user["nombre"];
                    $_SESSION["lastName"] = $user["apellidos"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["password"] = $user["password"];
                    $_SESSION["rol"] = $user["rol"];
                    $_SESSION["loggedin"] = "Usuario logeado";
                    $_SESSION["id"] = $user["id"];

                }
                elseif(!$user){
                    $_SESSION["login-error"] = "Contraseña o email incorrectos";
                }

            }
            header("location: index.php?controller=MainController&action=firstPage");
            
        }
    }

    

}

?>