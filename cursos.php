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
                         <li class="current"><a href="cursos.php">Cursos</a></li>
                         <li><a href="salones.php">Salones</a></li>
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
                $curso = $_POST['insertar'];
                mysql_query("INSERT INTO curso values(null, '$curso');", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El curso ha sido agregado exitosamente</center></div>';
                
                unset($_POST['insertar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['descripcion']) && isset($_POST['cursoModificar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $curso = $_POST['cursoModificar'];
                $descripcion = $_POST['descripcion'];
                mysql_query("UPDATE curso SET descripcion = '$descripcion' where id = $curso", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El curso ha sido modificado exitosamente</center></div>';
                
                unset($_POST['descripcion']);
                unset($_POST['cursoModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['cursoEliminar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $curso = $_POST['cursoEliminar'];
                mysql_query("DELETE FROM curso WHERE id = $curso;", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>El curso ha sido eliminado exitosamente</center></div>';
                
                unset($_POST['descripcion']);
                
                // Cerrar la conexión
                mysql_close($link);
            }
        ?>
  
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Gestión de cursos</h3>
        </div>
          <table border="1" style="margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">CREAR CURSO</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">MODIFICAR CURSO</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">ELIMINAR CURSO</th>
              </tr>
              <tr>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="cursos.php">
                          <center>
                            <label>Descripción:</label>
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
                      <form method="post" action="cursos.php">
                          <center>
                              <label>Código del curso:</label>
                              <select name="cursoModificar">
                                <?php
                                require './listarCursos.php';
                                ?>
                            </select>
                            <br>
                            <br>
                            <label>Nueva descripción:</label>
                            <input type="text" name="descripcion">
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
                      <form method="post" action="cursos.php">
                          <center>
                            <label>Código del curso:</label>
                            <select name="cursoEliminar">
                                <?php
                                require './listarCursos.php';
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
                      Código del curso
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:50%; color: #ffffff; background-color: #000">
                      Descripción
                  </th>
              </tr>
              <?php
              include_once './cargarCursos.php';
              ?>
          </table>
    </div>
  
</section>

    <?php
              include './footer.php';
    ?>
    
    </body>
</html>