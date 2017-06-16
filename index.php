<?php
  session_start();
  //incluimos config.php que es quien conecta a la base de datos
  include ('config.php');
  include ('getsong.php');



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
//<![CDATA[
var url=  "getsong.php";
var song = "upload/";
var cssSelector = {
        jPlayer: "#jquery_jplayer_1",
        cssSelectorAncestor: "#jp_container_1"
    };

var playlist = []; // creamos un array para la lista dinamica
var options = {
  swfPath: "js",
  supplied: "mp3"
};
$(document).ready(function(){
    var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);
   $.getJSON(url, {songurl: song}, function(data) {
      $.each(data, function(key, val) {
        myPlaylist.add(val);
      })
   });

});
//]]>
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


    <section>
      <article class="music">
        <div id="jquery_jplayer_1" class="jp-jplayer"></div>

		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-playlist">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
						<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
					</div>
					<ul class="jp-toggles">
						<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
						<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
						<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
						<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
					</ul>
				</div>
				<div class="jp-playlist">
          <ul>
						<li> </li>
					</ul>

				</div>
			  <div><br><br><br></div>
    </section>
    <footer class="piePagina">
      <a>Creado por </a><a href="https://www.linkedin.com/in/jes%C3%BAs-maria-lunar-garc%C3%ADa-8b406a81/">Jesús Lunar Garcia</a>
    </footer>




  </body>
</html>
