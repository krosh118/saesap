<?php

include './conexion.php';

// Realizar una consulta MySQL
$query = 'SELECT id, nombre FROM personal';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

echo "<select name=\"solicitante\">";
// Imprimir los resultados en HTML
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $id = $row['id'];
    $descripcion = $row['nombre'];
    echo "<option value=\"$id\">$descripcion</option>";
}
echo "</select>";
// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>