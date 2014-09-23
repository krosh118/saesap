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
                         <li><a href="salones.php">Salones</a></li>
                         <li class="current"><a href="personal.php">Personal</a></li>
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
                $persona = $_POST['insertar'];
                mysql_query("INSERT INTO personal values(null, '$persona');", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La persona ha sido agregada exitosamente</center></div>';
                
                unset($_POST['insertar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['nombre']) && isset($_POST['personaModificar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $persona = $_POST['personaModificar'];
                $nombre = $_POST['nombre'];
                mysql_query("UPDATE personal SET nombre = '$nombre' where id = $persona", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La persona ha sido modificada exitosamente</center></div>';
                
                unset($_POST['nombre']);
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['personaEliminar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $persona = $_POST['personaEliminar'];
                mysql_query("DELETE FROM personal WHERE id = $persona;", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La persona ha sido eliminada exitosamente</center></div>';
                
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
        ?>
  
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Gestión de personal</h3>
        </div>
          <table border="1" style="margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">CREAR PERSONA</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">MODIFICAR PERSONA</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">ELIMINAR PERSONA</th>
              </tr>
              <tr>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="personal.php">
                          <center>
                            <label>Nombre:</label>
                            <input type="text" name="insertar">
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
                      <form method="post" action="personal.php">
                          <center>
                              <label>Código de la persona:</label>
                              <select name="personaModificar">
                                <?php
                                require './listarPersonas.php';
                                ?>
                            </select>
                            <br>
                            <br>
                            <label>Nuevo nombre:</label>
                            <input type="text" name="nombre">
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
                      <form method="post" action="personal.php">
                          <center>
                            <label>Código de la persona:</label>
                            <select name="personaEliminar">
                                <?php
                                require './listarPersonas.php';
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
                  <th style="border: #000 1px solid; margin: 0 auto; width:50%; color: #ffffff; background-color: #000">
                      Código de la persona
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:50%; color: #ffffff; background-color: #000">
                      Nombre
                  </th>
              </tr>
              <?php
              include_once './cargarPersonas.php';
              ?>
          </table>
    </div>
  
</section>

    <?php
              include './footer.php';
    ?>
    
    </body>
</html>