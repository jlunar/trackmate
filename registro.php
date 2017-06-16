<?php
  include ('config.php');
  $nu="";

  if (isset($_POST['enviar'])) {

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $email=$_POST['email'];

    $consulta="insert into usuarios values ('$usuario','$clave','$email')";

    $resultado=$conn->query($consulta);

    $nu=$conn->affected_rows;

    if ($nu==1){
      $acierto="Usuario Registrado";

    }
    else {
      $error= "Nombre de usuario existente";

      }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jesus Maria Lunar Garcia</title>
    <link rel=stylesheet href="css/estilo.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Gestion Aprofian</title>
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
                  <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
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
        <div class="login">
          <form class="formulario" action="registro.php" method="post">
             <input type="text" name="usuario" required  placeholder="Nombre Usuario"><br>
             <input type="password" name="clave" placeholder="Contraseña" required><br>
             <input type="text" name="email" placeholder="Email" required>

             <input type="submit" name="enviar" value="REGISTRAR" class="boton"><br>


               <span class="aciertos"><?php if (isset($acierto)) { echo $acierto; } ?></span>
               <span class="errores"><?php if (isset($error)) { echo $error; } ?></span>
             </form>
        </div>

    </section>
    <footer class="piePagina">
      <a >Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
    </footer>
  </body>
</html>
