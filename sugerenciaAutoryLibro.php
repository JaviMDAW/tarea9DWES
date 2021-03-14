<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
<!-- Versión 1.0 -->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$("#texto").keyup(function(){
$("#sugerencias").load("cargarAutorLibros.php?q=" + $("#texto").val());
});
});
</script>
</head>
<body>
<p><b>Búsqueda por Autor:</b></p>
<form>
<!--
Cada vez que tecleamos algo en este field se ejecutará mostrar_sugerencias
-->
Autor: <input type="text" id="texto">
</form>
<!-- En el span con id="sugerencias" mostraremos las coincidencias -->
<p><strong>Sugerencias:</strong> <span id="sugerencias" style="color: #0080FF;"></span></p>

    $nombres = json_decode($json, true);
    var_dump($nombres);
    echo $nombres[0]["nombre"];
?>
    <table>
        <tbody>
        <tr>
            <th>Autor</th>
            <th>Título</th>
        </tr>
<?php foreach ($nombres as $nombre){ ?>
        <tr>
            <td> <?php echo $nombres["nombre"]; ?> </td>
            <td> <?php echo $nombres["titulo"]; ?> </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>



</body>
</html>
