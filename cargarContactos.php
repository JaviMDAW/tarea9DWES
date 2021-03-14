
//cargarContactos.php

<?php
    $salida = "";

    if (isset($_GET["q"]))
{
    $nombre = $_GET["q"];

    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
  {
    $mysqli->set_charset("utf8");

    $sql = "SELECT titulo FROM Libro WHERE titulo LIKE '%$nombre%' ORDER BY titulo";

    if (($resultado = $mysqli->query($sql)) && (!$mysqli->error))
    {

    //Trabajar con datos
    while ($fila = $resultado->fetch_assoc())
    {
    //Procesar result set como asociativo
    $salida = $salida . "<br>". $fila["titulo"]; 
    }

    $resultado->free();
    $mysqli->close();
    //echo json_encode($final);
    }
  }

}

echo $salida;
?>

