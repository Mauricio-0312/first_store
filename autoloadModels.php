<?php

 function autoloadModels($classname){
    require "Models/".$classname.".php";
}
spl_autoload_register("autoloadModels");

?>