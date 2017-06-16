<?php
  session_start();
  //incluimos config.php que es quien conecta a la base de datos
  include ('config.php');
  //comprobamos que le hemos pasado  el formulario
if (isset($_POST['submit'])) {
    //recojemos los datos que se le pasan por el formulario
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];


    //realizamos la consulta para comparar el login con la base de datos
    $consulta="select * from usuarios where nombre='$usuario' and clave='$clave'";
    //$resultado=$conn->query($consulta);
    $resultado=mysqli_query($conn,$consulta);
    //$fila=$resultado->fetch_object();
    if ($row = mysqli_fetch_array($resultado)) {
      //if ($clave==$fila->clave) {
        $_SESSION['usuario']="$usuario";
        $_SESSION['clave']="$clave";
        header("Location: inicio.php");
    }
    else {
      $error= "Usuario o clave incorrectos";
     }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jesus Maria Lunar Garcia</title>
    <link rel=stylesheet href="css/estilo.css" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Trackmate</title>
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
        <form class="formulario" action="login.php" method="post">
           <input type="text" name="usuario" required  placeholder="Nombre"><br>
           <input type="password" name="clave" placeholder="Contraseña" required><br>

           <input type="submit" name="submit" value="ENTRAR" class="boton"><br>

           <span class="errores"><?php if (isset($error)) { echo $error; } ?></span>
      </form>
      </div>

    </section>
    <footer class="piePagina">
      <a>Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
    </footer>




  </body>
</html>
