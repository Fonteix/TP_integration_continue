<?php
	session_start();
	$_SESSION['password_error'] = 0;
	$_SESSION['password'] = null;
	$_SESSION['user'] = null;

	header('Location:VIEW/Acceuil.php');
?>
