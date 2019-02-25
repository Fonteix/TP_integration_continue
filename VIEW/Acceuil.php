<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: index.php');
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>INTEGRATION CONTINUE</title>
	<link rel="stylesheet" href="../PUBLIC/AAAAAAA.css" type="text/css"/>
</head>
<body>
<h1>ACCUEIL</h1>
<a href="inscription.php">INSCRIVEZ VOUS!!!!</a>
<a href="connexion.php">CONNECTEZ VOUS!!!!</a>
</body>
</html>