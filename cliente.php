<html>
 <body>

<?php
// Si se ha hecho una peticion que busca informacion de un autor "get_datos_autor" a traves de su "id"...
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_datos_autor") 
{
    //Se realiza la peticion a la api que nos devuelve el JSON con la información de los autores
    $app_info = file_get_contents('http://localhost/xampp/htdocs/Libros/api.php?action=get_datos_autor&id=' . $_GET["id"]);
    // Se decodifica el fichero JSON y se convierte a array
    $app_info = json_decode($app_info, true);
?>
    <table>
        <tr>
            <td>Nombre: </td><td> <?php echo $app_info["nombre"] ?></td>
        </tr>
        <tr>
            <td>Apellidos: </td><td> <?php echo $app_info["apellidos"] ?></td>
        </tr>
        <tr>
            <td>Nacionalidad: </td><td> <?php echo $app_info["nacionalidad"] ?></td>
        </tr>
    </table>
    <br />
    <!-- Enlace para volver a la lista de autores -->
    <a href="http://localhost/xampp/htdocs/Libros/cliente.php?action=get_lista_autores" alt="Lista de autores">Volver a la lista de autores</a>
<?php
}
else //sino muestra la lista de autores
{
    // Pedimos al la api que nos devuelva una lista de autores. La respuesta se da en formato JSON
    $lista_autores = file_get_contents('http://localhost/xampp/htdocs/Libros/api.php?action=get_lista_autores');
    // Convertimos el fichero JSON en array
	var_dump($lista_autores);
    $lista_autores = json_decode($lista_autores, true);
?>
    <ul>
    <!-- Mostramos una entrada por cada autor -->
    <?php foreach($lista_autores as $autores): ?>
        <li>
            <!-- Enlazamos cada nombre de autor con su informacion (primer if) -->
            <a href="<?php echo "http://localhost/xampp/htdocs/Libros/cliente.php?action=get_datos_autor&id=" . $autores["id"]  ?>">
            <?php echo $autores["nombre"] . " " . $autores["apellidos"] ?>
            </a>
        </li>
        
    <?php endforeach; ?>
    </ul>
    <ul>
    <!-- Mostramos una entrada por cada libro -->
    <?php foreach($lista_libros as $libro): ?>
        <li>
            <!-- Enlazamos cada nombre de libro con su informacion (primer if) -->
            <a href="<?php echo "http://localhost/xampp/htdocs/Libros/cliente.php?action=get_lista_libros&id=" . $libro["id"]  ?>">
            <?php echo $libro["titulo"] . " " . $libro["f_publicacion"] ?>
            </a>
        </li>
        
    <?php endforeach; ?>
    </ul>
  <?php
} ?>
    
    

<?php
// Si se ha hecho una peticion que busca informacion de libros "get_lista_libros" a traves de su "id"...
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_lista_libros") 
{
    //Se realiza la peticion a la api que nos devuelve el JSON con la información de los autores
    $app_info = file_get_contents('http://localhost/xampp/htdocs/Libros/api.php?action=get_lista_libros&id=' . $_GET["id"]);
    // Se decodifica el fichero JSON y se convierte a array
    $app_info = json_decode($app_info, true);
?>
    <table>
        <tr>
            <td>Título: </td><td> <?php echo $app_info["titulo"] ?></td>
        </tr>
        <tr>
            <td>Fecha de Publicación: </td><td> <?php echo $app_info["f_publicacion"] ?></td>
        </tr>
        
    </table>
    <br />
    <!-- Enlace para volver a la lista de autores -->
    <a href="http://localhost/xampp/htdocs/Libros/cliente.php?action=get_lista_autores" alt="Lista de autores">Volver a la lista de autores</a>
<?php
}
else //sino muestra la lista de libros
{
    // Pedimos a la api que nos devuelva una lista de libros. La respuesta se da en formato JSON
    $lista_libros = file_get_contents('http://localhost/xampp/htdocs/Libros/api.php?action=get_lista_libros');
    // Convertimos el fichero JSON en array
	var_dump($lista_libros);
    $lista_libros = json_decode($lista_libros, true);
?>
    <ul>
    <!-- Mostramos una entrada por cada libro -->
    <?php foreach($lista_libros as $libros): ?>
        <li>
            <!-- Enlazamos cada nombre del libro con su informacion (primer if) -->
            <a href="<?php echo "http://localhost/xampp/htdocs/Libros/cliente.php?action=get_datos_libro&id=" . $libros["id"]  ?>">
            <?php echo $libros["titulo"] . " " . $libros["f_publicacion"] . "" . $libros["id_autor"]  ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
  <?php
} ?>
    
    
    
 </body>
</html>