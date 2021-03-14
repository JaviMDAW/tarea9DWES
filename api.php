<?php
// Esta API tiene dos posibilidades; Mostrar una lista de autores o mostrar la información de un autor específico.

function get_lista_autores(){

/**
 * Esta función devuelve en formato json los Autores de la Tabla Autor de la 
 * base de datos Libros
 * @author Fco. Javier Martínez Rodríguez 44257244T javimdaw@gmail.com
 * @version 1.0.1
 * @copyright (c) 2021, javimdaw
 * @param type $name Si no se da ningún nombre los lista todos
 * @return type json De todos los autores o del que se introduzcan por parámetro.
 */    
    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
    {
        //Trabajar con conexión
        if (!$mysqli->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
        } else {
        printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
    }

        echo "Conexión establecida<br>";

        $sql = "SELECT nombre, apellidos FROM Autor";

        if ($resultado = $mysqli->query($sql))
    {

        while ($fila = $resultado->fetch_assoc())
    {
        $final[] = $fila;
    }

        $resultado->free();
        $mysqli->close();

//Mostrar los datos codificados

        $datos_json = json_encode($final);
        echo $datos_json;

    }
        else echo "Error en consulta: " . $mysqli->error;
    }
        else echo "Error de conexión: " . $mysqli->connect_error;

    
    
}

function get_datos_autor($id){
    
/**
 * Esta función se ha modificado devuelve en formato json los datos de cada libro 
 * de cada Autor de la Tabla Autor de la base de datos Libros
 * @author Fco. Javier Martínez Rodríguez 44257244T javimdaw@gmail.com
 * @version 1.0.1
 * @copyright (c) 2021, javimdaw
 * @param type $id Si no se da ningún nombre los lista todos si se facilita el
 * id sólo saca los datos del autor identificado.
 * @return type json De la lista de los libros de cada autor
 * o del que se introduzcan por parámetro.
 */    
    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
    {
        //Trabajar con conexión
        if (!$mysqli->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
        } else {
        printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
    }

        echo "Conexión establecida<br>";

        $sql = "SELECT * FROM Libro WHERE ($id) === id";

        if ($resultado = $mysqli->query($sql))
    {

        while ($fila = $resultado->fetch_assoc())
    {
        $final[] = $fila;
    }

        $resultado->free();
        $mysqli->close();

//Mostrar los datos codificados

        $datos_json = json_encode($final);
        echo $datos_json;

    }
        else echo "Error en consulta: " . $mysqli->error;
    }
        else echo "Error de conexión: " . $mysqli->connect_error;

        
    
}

function get_lista_libros(){

/**
 * Esta función devuelve en formato json los id y título de los libros de
 * la Tabla Libro de la base de datos Libros
 * @author Fco. Javier Martínez Rodríguez 44257244T javimdaw@gmail.com
 * @version 1.0.1
 * @copyright (c) 2021, javimdaw
 * @param type $name Si no se da ningún nombre los lista todos
 * @return type json De los id y título.
 */    
    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
    {
        //Trabajar con conexión
        if (!$mysqli->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
        } else {
        printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
    }

        echo "Conexión establecida<br>";

        $sql = "SELECT id, titulo FROM Libro";

        if ($resultado = $mysqli->query($sql))
    {

        while ($fila = $resultado->fetch_assoc())
    {
        $final[] = $fila;
    }

        $resultado->free();
        $mysqli->close();

//Mostrar los datos codificados

        $datos_json = json_encode($final);
        echo $datos_json;

    }
        else echo "Error en consulta: " . $mysqli->error;
    }
        else echo "Error de conexión: " . $mysqli->connect_error;

    
    
}

function get_datos_libro($id){

/**
 * Esta función devuelve en formato json el título y fecha de publicación
 * de los libros de la Tabla Libro de la base de datos Libros. Además, recuperará 
 * a partir del id el nombre y apellidos del autor 
 * @author Fco. Javier Martínez Rodríguez 44257244T javimdaw@gmail.com
 * @version 1.0.1
 * @copyright (c) 2021, javimdaw
 * @param type $id del título del libro
 * @return type json título y fecha de publicación y nombre y apellidos del autor
 */    
    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
    {
        //Trabajar con conexión
        if (!$mysqli->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
        } else {
        printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
    }

        echo "Conexión establecida<br>";

        $sql = "SELECT titulo, f_publicacion, nombre, apellidos FROM Libro JOIN Autor WHERE ($id) === id";

        if ($resultado = $mysqli->query($sql))
    {

        while ($fila = $resultado->fetch_assoc())
    {
        $final[] = $fila;
    }

        $resultado->free();
        $mysqli->close();

//Mostrar los datos codificados

        $datos_json = json_encode($final);
        echo $datos_json;

    }
        else echo "Error en consulta: " . $mysqli->error;
    }
        else echo "Error de conexión: " . $mysqli->connect_error;

    
    
}


function get_lista_autores_y_libros($nombre){

/**
 * Esta función devuelve en formato json los Autores de la Tabla Autor y sus libros
 * de la base de datos Libros
 * @author Fco. Javier Martínez Rodríguez 44257244T javimdaw@gmail.com
 * @version 1.0.1
 * @copyright (c) 2021, javimdaw
 * @param type $name El nombre del autor.
 * @return type json De los datos del autor y la lista de sus libros.
 */    
    $mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if (!$mysqli->connect_error)
    {
        //Trabajar con conexión
        if (!$mysqli->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
        exit();
        } else {
        printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
    }

        echo "Conexión establecida<br>";

        $sql = "SELECT nombre, apellidos, titulo FROM Autor JOIN Libro WHERE $name === nombre ";

        if ($resultado = $mysqli->query($sql))
    {

        while ($fila = $resultado->fetch_assoc())
    {
        $final[] = $fila;
    }

        $resultado->free();
        $mysqli->close();

//Mostrar los datos codificados

        $datos_json = json_encode($final);
        echo $datos_json;

    }
        else echo "Error en consulta: " . $mysqli->error;
    }
        else echo "Error de conexión: " . $mysqli->connect_error;

    
}




$posibles_URL = array("get_lista_autores", "get_datos_autor", "get_lista_libros", "get_datos_libro", "get_lista_autores_y_libros");

$valor = "Ha ocurrido un error";

if (isset($_GET["action"]) && in_array($_GET["action"], $posibles_URL))
{
  switch ($_GET["action"])
    {
      case "get_lista_autores":
        $valor = get_lista_autores();
        break;
      case "get_datos_autor":
        if (isset($_GET["id"]))
            $valor = get_datos_autor($_GET["id"]);
        else
            $valor = "Argumento no encontrado";
        break;
        case "get_lista_libros":
            $valor = get_lista_libros();
        break;
        case "get_datos_libro":
            $valor = get_datos_libro();
        break;
        case "get_lista_autores_y_libros":
            $valor = get_lista_autores_y_libros();
        break;
        
    }
}

//devolvemos los datos serializados en JSON
exit(json_encode($valor));
?>