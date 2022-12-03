<?php
try{
$llave=mysqli_connect("127.0.0.1", "miguel", "123", "tarea1");
} catch (exception $ex){
    $codErr = mysqli_connect_errno();
    die("Error de codigo $codErr al conectarse a la base de datos" . $ex->getMessage());
  

}