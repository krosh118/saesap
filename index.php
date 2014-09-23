<!DOCTYPE html>

<html lang="es">
    
    <?php
    include_once 'head.php';
    ?>
    <body>
        <?php
        // put your code here
        include_once 'header.php';
        ?>
        <section id="stuck_container">
            <div class="container">
                <div class="row">
                  <div class="grid_12 ">
                    <div class="navigation ">
                      <nav>
                        <ul class="sf-menu">
                         <li class="current"><a href="index.php">Inicio</a></li>
                         <li><a href="cursos.php">Cursos</a></li>
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
        
        <?php
        echo "<section class=\"page1_header\">
                <div class=\"container\">
                  <div class=\"row\">
                    <div class=\"grid_4\">
                      <a href=\"cursos.php\" class=\"banner \"><div class=\"maxheight\">
                        <div class=\"fa fa-globe\"></div>Cursos</div>
                      </a>
                      <a href=\"salones.php\" class=\"banner \"><div class=\"maxheight\">
                        <div class=\"fa fa-lightbulb-o\"></div>Salones</div>
                      </a>
                      <a href=\"personal.php\" class=\"banner \"><div class=\"maxheight1\">
                        <div class=\"fa fa-cog\"></div>Personal</div>
                      </a>
                      <a href=\"reservaciones.php\" class=\"banner \"><div class=\"maxheight1\">
                        <div class=\"fa fa-briefcase\"></div>Reservaciones</div>
                      </a>
                    </div>
                    <div class=\"grid_5\">
                        <h2>Sistema de <br> Gestión de <br> Cursos</h2>
                    </div>
                  </div>
                </div>
            </section>
            </header>";
        include_once 'footer.php';
        // create and execute query
        
        ?>
    </body>
</html>
