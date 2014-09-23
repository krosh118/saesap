<html>
<?php

include_once 'head.php';

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
                         <li class="current"><a href="salones.php">Salones</a></li>
                         <li><a href="personal.php">Personal</a></li>
                         <li><a href="reservaciones.php">Reservaciones</a></li>
                         <li><a href="tecnologias.php">Tecnologías</a></li>
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
            if(isset($_POST['insertar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $descripcion = $_POST['insertar'];
                $capacidad = $_POST['capacidad'];
                mysql_query("INSERT INTO salon values(null, '$descripcion', $capacidad);", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El salón ha sido agregado exitosamente</center></div>';
                
                unset($_POST['insertar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['salonModificar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $salon = $_POST['salonModificar'];
                $descripcion = $_POST['nuevaDescripcion'];
                $capacidad = $_POST['nuevaCapacidad'];
                mysql_query("UPDATE salon SET descripcion = '$descripcion', capacidad = $capacidad where id = $salon", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El salón ha sido modificado exitosamente</center></div>';
                
                unset($_POST['nombre']);
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['salonEliminar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $salon = $_POST['salonEliminar'];
                mysql_query("DELETE FROM salon WHERE id = $salon;", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El salón ha sido eliminado exitosamente</center></div>';
                
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
        ?>
  
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Gestión de salones</h3>
        </div>
          <table border="1" style="margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">CREAR SALON</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">MODIFICAR SALON</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">ELIMINAR SALON</th>
              </tr>
              <tr>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="salones.php">
                          <center>
                            <label>Descripcion:</label>
                            <input type="text" name="insertar">
                            <br>
                            <br>
                            <label>Capacidad:</label>
                            <input type="text" name="capacidad">
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
                      <form method="post" action="salones.php">
                          <center>
                              <label>Código del salón:</label>
                              <select name="salonModificar">
                                <?php
                                require './listarSalones.php';
                                ?>
                            </select>
                            <br>
                            <br>
                            <label>Nueva descripcion:</label>
                            <input type="text" name="nuevaDescripcion">
                            <br>
                            <br>
                            <label>Nueva capacidad:</label>
                            <input type="text" name="nuevaCapacidad">
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
                      <form method="post" action="salones.php">
                          <center>
                            <label>Código del salón:</label>
                            <select name="salonEliminar">
                                <?php
                                require './listarSalones.php';
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
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">
                      Código de salón
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">
                      Descripcion
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">
                      Capacidad
                  </th>
              </tr>
              <?php
              include_once './cargarSalones.php';
              ?>
          </table>
    </div>
  
</section>

    <?php
              include './footer.php';
    ?>
    
    </body>
</html>