<html>
<?php
    include './head.php';
?>
    <body>
<?php
include_once 'header.php';
?>
        <section id="stuck_container">
            <div class="container">
                <div class="row">
                  <div class="grid_12 ">
                    <div class="navigation ">
                      <nav>
                        <ul class="sf-menu">
                         <li><a href="index.php">Inicio</a></li>
                         <li><a href="cursos.php">Cursos</a></li>
                         <li><a href="salones.php">Salones</a></li>
                         <li><a href="personal.php">Personal</a></li>
                         <li><a href="reservaciones.php">Reservaciones</a></li>
                         <li class="current"><a href="tecnologias.php">Tecnologías</a></li>
                         <li><a href="horarios.php">Horarios</a></li>
                       </ul>
                      </nav>
                      <div class="clear"></div>
                    </div>       
                   <div class="clear"></div>  
                  </div>
                </div> 
            </div> 
        </section>
    </header>    
    
<section id="content">
    <?php
            if(isset($_POST['salonInsertar'])){
                require './conexion.php';

                // Realizar una consulta MySQL
                $salon = $_POST['salonInsertar'];
                $tipo = $_POST['tipoTecnologia'];
                $descripcion = $_POST['descripcion'];
                mysql_query("INSERT INTO caracteristica values(null, '$salon', '$tipo', '$descripcion');", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La característica ha sido agregada exitosamente</center></div>';
                
                unset($_POST['insertar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['caracteristicaModificar'])){
                require './conexion.php';

                // Realizar una consulta MySQL
                $caracteristica = $_POST['caracteristicaModificar'];
                $tipo = $_POST['tipoTecnologia'];
                $descripcion = $_POST['nuevaDescripcion'];
                $salon = $_POST['nuevoSalon'];
                mysql_query("UPDATE caracteristica SET salon_id = $salon, tipo_id = $tipo, descripcion = '$descripcion' where id = $caracteristica", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La característica ha sido modificada exitosamente</center></div>';
                
                unset($_POST['descripcion']);
                unset($_POST['cursoModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['caracteristicaEliminar'])){
                require './conexion.php';

                // Realizar una consulta MySQL
                $curso = $_POST['caracteristicaEliminar'];
                mysql_query("DELETE FROM caracteristica WHERE id = $curso;", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La caracteristica ha sido eliminada exitosamente</center></div>';
                
                unset($_POST['descripcion']);
                
                // Cerrar la conexión
                mysql_close($link);
            }
        ?>
  
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Gestión de características de salones</h3>
        </div>
          <table border="1" style="margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">CREAR CARACTERÍSTICA</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">MODIFICAR CARACTERÍSTICA</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">ELIMINAR CARACTERÍSTICA</th>
              </tr>
              <tr>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="tecnologias.php">
                          <center>
                              <label>
                                  Salón: 
                              </label>
                              <select name="salonInsertar">
                                  <?php
                                      require './conexion.php';

                                    // Realizar una consulta MySQL
                                    $query = 'SELECT id, descripcion FROM salon';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                    // Imprimir los resultados en HTML
                                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        $id = $row['id'];
                                        $descripcion = $row['descripcion'];
                                        echo "<option value=\"$id\">$descripcion</option>";
                                    }
                                    
                                    // Liberar resultados
                                    mysql_free_result($result);

                                    // Cerrar la conexión
                                    mysql_close($link);
                                  ?>
                              </select>
                              <br>
                              <br>
                              <label>Tipo:</label>
                              <select name="tipoTecnologia">
                                  <option value="1">Software</option>
                                  <option value="2">Hardware</option>
                              </select>
                              <br>
                              <br>
                            <label>Descripción:</label>
                            <input type="text" name="descripcion">
                            <br>
                            <br>
                            <input type="submit" value="Ingresar">
                        </center>
                    </form>
                      <br>
                  </td>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="tecnologias.php">
                          <center>
                              <label>
                                  Código: 
                              </label>
                              <select name="caracteristicaModificar">
                                  <?php
                                    require './conexion.php';

                                    // Realizar una consulta MySQL
                                    $query = 'SELECT id FROM caracteristica';
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
                              </select>
                            <br>
                            <br>
                            <label>Tipo:</label>
                              <select name="tipoTecnologia">
                                  <option value="1">Software</option>
                                  <option value="2">Hardware</option>
                              </select>
                            <br>
                            <br>
                            <label>Nueva descripción:</label>
                            <input type="text" name="nuevaDescripcion">
                            <br>
                            <br>
                            <label>
                                  Salón: 
                              </label>
                              <select name="nuevoSalon">
                                  <?php
                                      require './conexion.php';

                                    // Realizar una consulta MySQL
                                    $query = 'SELECT descripcion FROM salon';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                    // Imprimir los resultados en HTML
                                    $contador = 1;
                                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        foreach ($line as $col_value) {
                                            echo "<option value=\"$contador\">$col_value</option>";
                                            $contador++;
                                        }
                                    }

                                    // Liberar resultados
                                    mysql_free_result($result);

                                    // Cerrar la conexión
                                    mysql_close($link);
                                  ?>
                              </select>
                            <br>
                            <br>
                            <input type="submit" value="Modificar">
                            <br>
                            <br>
                        </center>
                    </form>
                  </td>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="tecnologias.php">
                          <center>
                            <label>
                                  Código: 
                              </label>
                              <select name="caracteristicaEliminar">
                                  <?php
                                    require './conexion.php';

                                    // Realizar una consulta MySQL
                                    $query = 'SELECT id FROM caracteristica';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                    // Imprimir los resultados en HTML
                                    $contador = 1;
                                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        foreach ($line as $col_value) {
                                            echo "<option value=\"$contador\">$col_value</option>";
                                            $contador++;
                                        }
                                    }

                                    // Liberar resultados
                                    mysql_free_result($result);

                                    // Cerrar la conexión
                                    mysql_close($link);
                                  ?>
                              </select>
                            <br>
                            <br>
                            <input type="submit" value="Eliminar">
                        </center>
                    </form>
                  </td>
              </tr>
          </table>
          <br>
          <br>
          <br>
          <table style="border: #000 1px solid; margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:25%; color: #ffffff; background-color: #000">
                      Código característica
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:25%; color: #ffffff; background-color: #000">
                      Tipo característica
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:25%; color: #ffffff; background-color: #000">
                      Descripción
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:25%; color: #ffffff; background-color: #000">
                      Salón
                  </th>
              </tr>
              <?php
              include './cargarCaracteristicas.php';
              ?>
          </table>
    </div>
  
</section>

    <?php
              include './footer.php';
    ?>
    
    </body>
</html>