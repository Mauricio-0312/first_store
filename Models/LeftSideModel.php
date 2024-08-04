<?php
class LeftSideModel{
    public $database;
    function __construct(){
        require "DbConection.php";

        $this->database = new DbConection();
        $this->conection = $this->database->connect();


    }
    function registerConsult($nombre, $apellidos, $email, $password){
       

        $consult = $this->conection->query("insert into usuarios values(null, '$nombre', '$apellidos',  '$email', '$password', null, null)");
        return $consult;
    }

    function loginConsult($email, $password){
        

        $consult = $this->conection->query("Select * from usuarios where email='$email' and password='$password'");
        return $consult;
    }
}