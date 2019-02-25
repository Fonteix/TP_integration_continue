<?php
	session_start();
	$_SESSION['password_error'] = 0;
	$_SESSION['password'] = null;
	$_SESSION['user'] = null;
	$_SESSION['prm'] = 0;


	header('Location: VIEW/Acceuil.php');
?>
