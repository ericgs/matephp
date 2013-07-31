<?php

function conectar()
{
    $user='postgres';
    $pass='postgres';
    $host='localhost';
    $db='mobile_dashboard';
    $conexion = pg_connect("host=$host dbname=$db user=$user password=$pass") or die('No pudo conectarse: ' . pg_last_error());
    return $conexion;
}

?>
