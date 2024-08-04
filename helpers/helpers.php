<?php 

class helpers{
    static function deleteSingUpErrors(){
        if(isset($_SESSION["name-error"])){
            $_SESSION["name-error"] = null;
        }
        if(isset($_SESSION["email-error"])){
            $_SESSION["email-error"] = null;
        }
        if(isset($_SESSION["lastName-error"])){
            $_SESSION["lastName-error"] = null;
        }
        if(isset($_SESSION["password-error"])){
            $_SESSION["password-error"] = null;
        }
        if(isset($_SESSION["registered"])){
            $_SESSION["registered"] = null;
        }
        if(isset($_SESSION["email-login-error"])){
            $_SESSION["email-login-error"] = null;
        }
        if(isset($_SESSION["password-login-error"])){
            $_SESSION["password-login-error"] = null;
        }
        if(isset($_SESSION["login-error"])){
            $_SESSION["login-error"] = null;
        }
        if(isset($_SESSION["loggedin"])){
            $_SESSION["loggedin"] = null;
        }
    


    }

    static function deleteCategoryErrors(){
        if(isset($_SESSION["categoryAdded"])){
            $_SESSION["categoryAdded"] = null;
        }
        if(isset($_SESSION["category-error"])){
            $_SESSION["category-error"] = null;
        }
    }

    static function deleteProductErrors(){
        if(isset($_SESSION["productAdded"])){
            $_SESSION["productAdded"] = null;
        }
        if(isset($_SESSION["product-name-error"])){
            $_SESSION["product-name-error"] = null;
        }
        if(isset($_SESSION["product-price-error"])){
            $_SESSION["product-price-error"] = null;
        }
        if(isset($_SESSION["product-stock-error"])){
            $_SESSION["product-stock-error"] = null;
        }
        if(isset($_SESSION["product-category-error"])){
            $_SESSION["product-category-error"] = null;
        }
        if(isset($_SESSION["product-description-error"])){
            $_SESSION["product-description-error"] = null;
        }
        if(isset($_SESSION["product-ofert-error"])){
            $_SESSION["product-ofert-error"] = null;
        }
        if(isset($_SESSION["product-image-error"])){
            $_SESSION["product-image-error"] = null;
        }
    }

    static function deleteProductInCartErrors(){
        if(isset($_SESSION["productInCart"])){
            $_SESSION["productInCart"] = null;
        }
        if(isset($_SESSION["stock-error"])){
            $_SESSION["stock-error"] = null;
        }
      
    }

    static function deleteOrderErrors(){
        if(isset($_SESSION["orderDone"])){
            $_SESSION["orderDone"] = null;
        }
        if(isset($_SESSION["orderFailed"])){
            $_SESSION["orderFailed"] = null;
        }
        if(isset($_SESSION["municipio-error"])){
            $_SESSION["municipio-error"] = null;
        }
        if(isset($_SESSION["localidad-error"])){
            $_SESSION["localidad-error"] = null;
        }
        if(isset($_SESSION["direccion-error"])){
            $_SESSION["direccion-error"] = null;
        }
      
    }


}

?>