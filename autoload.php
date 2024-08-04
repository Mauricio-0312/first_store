<?php

 function autoload($classname){
     
    require "Controllers/".$classname.".php";
    
}
spl_autoload_register("autoload");

?>