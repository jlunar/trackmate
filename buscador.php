<?php
  session_start();
  //incluimos config.php que es quien conecta a la base de datos
  include ('config.php');



  //$musica= glob("upload/*.mp3");
  //$aleatorio= array_rand($musica);

  $consulta = "select * from musica limit 0";
  $result = mysqli_query($conn, $consulta);

  if (isset($_POST['submit'])){
      $autor = $_POST['autor'];
      $consulta= "select * from musica where autor='$autor'";
      $result= mysqli_query($conn, $consulta);
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jesus Maria Lunar Garcia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
    <link rel=stylesheet href="css/estilo.css" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Trackmate</title>
    <script type="text/javascript">
    </script>
  </head>

  <body>


    <header class="cabecera">
      <div class="title">TrackMate</div>
      <nav id="menu">
        <ul>
          <?php if (isset($_SESSION['usuario'])) { ?>
            <li><a href="index.php"><i class="fa fa-play" aria-hidden="true"></i>Player</a></li>
            <li><a href="buscador.php"><i class="fa fa-search" aria-hidden="true"></i>Buscador</a></li>
            <li><a href="inicio.php"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $_SESSION['usuario'];?></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Exit</a></li>



          <?php } else { ?>
                  <li><a href="index.php"><i class="fa fa-play" aria-hidden="true"></i>Player</a></li>
                  <li><a href="buscador.php"><i class="fa fa-search" aria-hidden="true"></i>Buscador</a></li>
          				<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
          				<li><a href="registro.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Registro</a></li>
          <?php } ?>
        </ul>
      </nav>

    </header>


      <article class="articulo">


        <div class="subida">
            <form class="formSubida" action="buscador.php" method="post">
                <p class="psubida">Buscador de canciones:</p>
                    <input type="text" name="autor" required  placeholder="Artista">
                    <!--<select type='text' name="Genero" placeholder="Genero">
                       <option value="Tech House">Tech House</option>
                        <option value="Techno">Techno</option>
                        <option value="House">House</option> -->
                    </select>
                    <input type="submit" name="submit" value="Buscar" class="boton"></div>
            </form>
        </div>

        <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>Genero</th>
                            <th>Fecha Creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['filename']; ?></td>
                        <td><?php  echo $row['autor']; ?></td>
                        <td><?php  echo $row['genero']; ?></td>
                        <td><?php echo $row['creado']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

      </article>

      <div><br><br><br><br></div>



    </section>
    <footer class="piePagina">
      <a>Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
    </footer>




  </body>
</html>
