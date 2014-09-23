<?php
    require_once './config.php';
    // Conectando, seleccionando la base de datos
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db(DB_DATABASE) or die('No se pudo seleccionar la base de datos');
