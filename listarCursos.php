<?php

// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('calendario_sae') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT id FROM curso';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    foreach ($line as $col_value) {
        echo "<option value=\"$col_value\">$col_value</option>";
    }
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>