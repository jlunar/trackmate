<?php

  //Evitamos que salgan errores por variables vacías
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  include ('config.php');

  if (isset($_POST['submit'])) {
        $usuario=$_SESSION['usuario'];

      //realizamos la consulta
      $consulta="delete from usuarios where nombre='$usuario'";

      $resultado=mysqli_query($conn,$consulta);
      $error= "Usuario eliminado";
      sleep(5);
      header("Location: logout.php");


  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jesus Maria Lunar Garcia</title>
    <link rel=stylesheet href="css/estilo.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
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

<section>
  <div class="contenido">
    <div class="menulateral">
      <ul>
        <?php if (isset($_SESSION['usuario'])) { ?>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="eliminar.php">Eliminar Cuenta</a></li>
        <?php } ?>
      </ul>

    </div>

    <div class="subida">
        <form class="formSubida" action="eliminar.php" method="post">
            <p class="psubida">Pulsa el boton para eliminar la cuenta</p>

            <input type="submit"  name="submit" value="Borrar" class="boton">



          </form>
    </div>




      <div><br><br><br><br></div>
</div>
</section>

<footer class="piePagina">
  <a>Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
</footer>
  </body>
</html>
