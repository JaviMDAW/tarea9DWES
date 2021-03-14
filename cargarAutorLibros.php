

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//cargarAutorLibros.php

<?php
    $salida = "";

    if (isset($_GET["q"]))
{
    $nombre = $_GET["q"];

    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
  {
    $mysqli->set_charset("utf8");

    $sql = "SELECT nombre, titulo FROM Autor JOIN Libro WHERE nombre LIKE '%$nombre%' ORDER BY nombre";

    if (($resultado = $mysqli->query($sql)) && (!$mysqli->error))
    {

    //Trabajar con datos
    while ($fila = $resultado->fetch_assoc())
    {
    //Procesar result set como asociativo
    $salida = $salida . "<br>". $fila["nombre"]. "<br>" . $fila["titulo"]; 
    }

    $resultado->free();
    $mysqli->close();
    
   echo json_encode($final);

    
    }
  }

}

//echo $salida;
?>

