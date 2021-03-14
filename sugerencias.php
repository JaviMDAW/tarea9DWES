
<!DOCTYPE html>
<html>
<!-- Versión 1.0 -->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$("#texto").keyup(function(){
$("#sugerencias").load("cargarContactos.php?q=" + $("#texto").val());
});
});
</script>
</head>
<body>
<p><b>Búsqueda de Libros por Título:</b></p>
<form>
<!--
Cada vez que tecleamos algo en este field se ejecutará mostrar_sugerencias
-->
Título: <input type="text" id="texto">
</form>
<!-- En el span con id="sugerencias" mostraremos las coincidencias -->
<p><strong>Sugerencias:</strong> <span id="sugerencias" style="color: #0080FF;"></span></p>
</body>
</html>
