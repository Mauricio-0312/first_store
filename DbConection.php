<?php

class DbConection{
    public function connect(){
        $conection = new mysqli("localhost", "root", "", "tienda_master");
        $conection->query("SET NAMES 'utf-8'");
        return $conection;
    }

}

?>