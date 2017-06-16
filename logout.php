<?php
session_start();

if(isset($_SESSION['usuario'])) {
	session_destroy();
	unset($_SESSION['usuario']);
	unset($_SESSION['clave']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>
