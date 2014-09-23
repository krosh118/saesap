<?php

require './conexion.php';

// Realizar una consulta MySQL
$query = 'select id, descripcion, capacidad from salon;';
$result = mysql_query($query, $link) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "<tr style=\"border: #000000 1px solid; margin: 0 auto; width:100%;\">\n";
    $id = $row['id'];
    $descripcion = $row['descripcion'];
    $capacidad = $row['capacidad'];
    echo "<td style=\"text-align:center\">$id</td>";
    echo "<td style=\"text-align:center\">$descripcion</td>";
    echo "<td style=\"text-align:center\">$capacidad</td>";
    echo "</tr>";
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>
