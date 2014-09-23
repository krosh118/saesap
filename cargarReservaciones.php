<?php

require './conexion.php';

// Realizar una consulta MySQL
$query = 'select r.id as codigo, c.descripcion as curso, r.fecha_inicio as inicio, r.fecha_final as final, p.nombre as asignado, s.descripcion as salon from curso c, reservacion r, personal p, salon s where r.curso_id = c.id and r.asignado_id = p.id and r.salon_id = s.id order by r.id;';
$result = mysql_query($query, $link) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "<tr style=\"border: #000000 1px solid; margin: 0 auto; width:100%;\">\n";
    $codigo = $row['codigo'];
    $curso = $row['curso'];
    $inicio = $row['inicio'];
    $final = $row['final'];
    $asignado = $row['asignado'];
    $salon = $row['salon'];
    echo "<td style=\"text-align:center\">$codigo</td>";
    echo "<td style=\"text-align:center\">$curso</td>";
    echo "<td style=\"text-align:center\">$inicio</td>";
    echo "<td style=\"text-align:center\">$final</td>";
    echo "<td style=\"text-align:center\">$asignado</td>";
    echo "<td style=\"text-align:center\">$salon</td>";
    echo "</tr>";
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>
