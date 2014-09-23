<?php

require './conexion.php';

// Realizar una consulta MySQL
$query = 'select c.id as codigo, c.tipo_id as tipo, c.descripcion as descripcion, s.descripcion as salon from caracteristica c, salon s where c.salon_id = s.id order by s.id;';
$result = mysql_query($query, $link) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "<tr style=\"border: #000000 1px solid; margin: 0 auto; width:100%;\">\n";
    $id = $row['codigo'];
    $tipo_id = $row['tipo'];
    $descripcion = $row['descripcion'];
    $salon = $row['salon'];
    echo "<td style=\"text-align:center\">$id</td>";
    if($tipo_id == 1){
        echo "<td style=\"text-align:center\">Software</td>";
    }else{
        echo "<td style=\"text-align:center\">Hardware</td>";
    }
    echo "<td style=\"text-align:center\">$descripcion</td>";
    echo "<td style=\"text-align:center\">$salon</td>";
	// Comentario hecho por Mario //
    echo "</tr>";
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>
