<?php

require './conexion.php';

// Realizar una consulta MySQL
$query = 'SELECT * FROM personal';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr style=\"border: #000000 1px solid; margin: 0 auto; width:100%;\">\n";
    foreach ($line as $col_value) {
        echo "\t\t<td style=\"text-align:center\">$col_value</td>\n";
    }
    echo "\t</tr>\n";
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>