  <?php

  //Evitamos que salgan errores por variables vacías
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  include ('config.php');

  //Cantidad de resultados por página (debe ser INT, no string/varchar)
  $cantidad_resultados_por_pagina = 10;
  //Comprueba si está seteado el GET de HTTP
  if (isset($_GET["pagina"])) {

  	//Si el GET de HTTP SÍ es una string / cadena, procede
  	if (is_string($_GET["pagina"])) {

  		//Si la string es numérica, define la variable 'pagina'
  		 if (is_numeric($_GET["pagina"])) {

  			 //Si la petición desde la paginación es la página uno
  			 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'inicio.php'
  			 if ($_GET["pagina"] == 1) {
  				 header("Location: inicio.php");
  				 die();
  			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
  				 $pagina = $_GET["pagina"];
  			};

      } else { //Si la string no es numérica, redirige al index (por ejemplo: inicio.php?pagina=1)
  			 header("Location: inicio.php");
  			die();
  		 };
  	};

  } else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
  	$pagina = 1;
  };

  //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
  $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;








$consulta = "select * from musica";
$result = mysqli_query($conn, $consulta);

//Cuenta el número total de registros
$total_registros = mysqli_num_rows($result);

//Obtiene el total de páginas existentes
$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);

$consulta_resultados = mysqli_query($conn,
"SELECT * FROM musica ORDER BY  filename ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

//subida de archivos del formulario
//checkeamo el formulario, que hemos pulsado submit
if (isset($_POST['submit'])){
  $filename = $_FILES['file1']['name'];
  $url= '';

    $autor =  $_POST['autor'];
    $genero = $_POST['genero'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $tipoExt = ['mp3'];

        //chequeamos si es un tipo valido
        if (in_array($ext, $tipoExt))
        {
            // obtener el ultimo id de registro
            $consulta = 'select max(id) as id from musica';
            $result = mysqli_query($conn, $consulta);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = $filename;
            }
            else
                $filename = $filename;
            //selecciono el directorio donde se guardan los mp3
            $path = 'upload/';
            $url= $path . $filename . $ext;

            $creado = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));

            // insert file details into database
            $consulta = "INSERT INTO musica(filename, creado, autor, genero, url) VALUES('$filename', '$creado', '$autor','$genero' ,'$url')";
            mysqli_query($conn, $consulta);
            header("Location: inicio.php?st=success");
        }
        else
        {
            header("Location: inicio.php?st=error");
        }
    }
    else
        header("Location: inicio.php");
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
  <div class="subida">
      <form class="formSubida" action="inicio.php" method="post" enctype="multipart/form-data">
          <p class="psubida">Selecione el mp3 a subir:</p>
              <input type="file" class="" name="file1"/><br>
              <input type="text" name="autor" required  placeholder="Artista">
              <input type="text" name="genero" required  placeholder="Genero">
              <input type="submit" name="submit" value="Upload" class="boton">

          <?php if(isset($_GET['st'])) { ?>
              <div class="alerta">
              <?php if ($_GET['st'] == 'success') {
                      echo "¡Archivo subido con exito!";
                  }
                  else
                  {
                      echo '¡Extension invalida!';
                  } ?>
              </div>
          <?php } ?>
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
                      <th>Ver</th>
                      <th>Download</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              $i = 1;
              while($row = mysqli_fetch_array($consulta_resultados)) { ?>
              <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['filename']; ?></td>
                  <td><?php  echo $row['autor']; ?></td>
                  <td><?php  echo $row['genero']; ?></td>
                  <td><?php echo $row['creado']; ?></td>
                  <td><a href="upload/<?php echo $row['filename']; ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></td>
                  <td><a href="upload/<?php echo $row['filename']; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
              </tr>
                <?php } ?>
            </tbody>
          </table>

      </div>
      <div class="paginacion">
        <!--<hr><!----------------------------------------------->
        <?php
          //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
          //Nota: X = $total_paginas
          for ($i=1; $i<=$total_paginas; $i++) {
            //En el bucle, muestra la paginación
            echo "<a href='?pagina=".$i."'>".$i."</a> | ";
          }; ?>

        </div>
      <div><br><br><br><br></div>
</div>
</section>

<footer class="piePagina">
  <a>Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
</footer>
  </body>
</html>
