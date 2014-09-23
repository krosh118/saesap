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
                         <li><a href="personal.php">Personal</a></li>
                         <li class="current"><a href="reservaciones.php">Reservaciones</a></li>
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
            if(isset($_POST['fechaInicio']) && !isset($_POST['reservacionModificar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $curso = $_POST['curso'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFinal = $_POST['fechaFinal'];
                $asignado = $_POST['asignado'];
                $solicitante = $_POST['solicitante'];
                $salon = $_POST['salon'];
                mysql_query("INSERT INTO reservacion values(null, $curso, '$fechaInicio', '$fechaFinal', $asignado, $solicitante, $salon);", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La nueva reservación ha sido agregada exitosamente</center></div>';
                
                unset($_POST['insertar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['reservacionModificar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $reservacion = $_POST['reservacionModificar'];
                $curso = $_POST['curso'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFinal = $_POST['fechaFinal'];
                $asignado = $_POST['asignado'];
                $solicitante = $_POST['solicitante'];
                $salon = $_POST['salon'];
                mysql_query("UPDATE reservacion SET curso_id = $curso, fecha_inicio = '$fechaInicio', fecha_final = '$fechaFinal', asignado_id = $asignado, solicitante_id = $solicitante, salon_id = $salon where id = $reservacion", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La reservación ha sido modificada exitosamente</center></div>';
                
                unset($_POST['nombre']);
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
            
            if(isset($_POST['reservacionEliminar'])){
                
                require './conexion.php';

                // Realizar una consulta MySQL
                $reservacion = $_POST['reservacionEliminar'];
                mysql_query("DELETE FROM reservacion WHERE id = $reservacion;", $link) or die('Consulta fallida: ' . mysql_error());
                
                echo '<br><br><div class="container"><center>La reservación ha sido eliminada exitosamente</center></div>';
                
                unset($_POST['personaModificar']);

                // Cerrar la conexión
                mysql_close($link);
            }
        ?>
  
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Gestión de reservaciones</h3>
        </div>
          <table border="1" style="margin: 0 auto; width:100%;">
              <tr>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">CREAR RESERVACIÓN</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">MODIFICAR RESERVACIÓN</th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:33%; color: #ffffff; background-color: #000">ELIMINAR RESERVACIÓN</th>
              </tr>
              <tr>
                  <td style="border: #000 1px solid; margin: 0 auto; width:33%;">
                      <br>
                      <br>
                      <form method="post" action="reservaciones.php">
                          <center>
                            <label>Curso:</label>
                            <?php
                                require './mostrarCursos.php';
                            ?>
                            <br>
                            <br>
                            <label>Fecha de inicio:</label>
                            <input type="date" name="fechaInicio">
                            <br>
                            <br>
                            <label>Fecha de finalización:</label>
                            <input type="date" name="fechaFinal">
                            <br>
                            <br>
                            <label>Asignado:</label>
                            <?php
                                require './mostrarAsignados.php';
                            ?>
                            <br>
                            <br>
                            <label>Solicitante:</label>
                            <?php
                                require './mostrarSolicitantes.php';
                            ?>
                            <br>
                            <br>
                            <label>Salón:</label>
                            <?php
                                require './mostrarSalones.php';
                            ?>
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
                      <form method="post" action="reservaciones.php">
                          <center>
                            <label>Código de la reservación:</label>
                                <?php
                                require './mostrarReservaciones.php';
                                ?>
                            <br>
                            <br>
                            <label>Nuevo curso:</label>
                            <?php
                                require './mostrarCursos.php';
                            ?>
                            <br>
                            <br>
                            <label>Nueva fecha de inicio:</label>
                            <input type="date" name="fechaInicio">
                            <br>
                            <br>
                            <label>Nueva fecha de finalización:</label>
                            <input type="date" name="fechaFinal">
                            <br>
                            <br>
                            <label>Nuevo asignado:</label>
                            <?php
                                require './mostrarAsignados.php';
                            ?>
                            <br>
                            <br>
                            <label>Nuevo solicitante:</label>
                            <?php
                                require './mostrarSolicitantes.php';
                            ?>
                            <br>
                            <br>
                            <label>Nuevo salón:</label>
                            <?php
                                require './mostrarSalones.php';
                            ?>
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
                      <form method="post" action="reservaciones.php">
                          <center>
                            <label>Código de la reservación:</label>
                            <?php
                                require './mostrarReservaciones2.php';
                            ?>
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
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Codigo
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Curso
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Fecha de inicio
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Fecha de finalización
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Asignado
                  </th>
                  <th style="border: #000 1px solid; margin: 0 auto; width:16%; color: #ffffff; background-color: #000">
                      Salón
                  </th>
              </tr>
              <?php
              include_once './cargarReservaciones.php';
              ?>
          </table>
    </div>
  
</section>

    <?php
              include './footer.php';
    ?>
    
    </body>
</html>