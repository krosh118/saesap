<?php

include './conexion.php';

// Realizar una consulta MySQL
$query = 'SELECT id FROM reservacion order by id';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

echo "<select name=\"reservacionModificar\">";
// Imprimir los resultados en HTML
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $id = $row['id'];
    echo "<option value=\"$id\">$id</option>";
}
echo "</select>";
// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>