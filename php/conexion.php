<?php

$conexion= mysqli_connect("localhost", "root","","cuistar");

if(!$conexion){
    die ( "Conexion fallida:" . mysqli_connect_error());

    }else {
       /* echo "CONEXION EXITOSA\n";*/
    }
?>