<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: index.php');
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>INTEGRATION CONTINUE</title>
</head>
<body>
<h1>ACCUEIL</h1>
<a href="inscription.php"></a>
<a href="connexion.php"></a>
</body>
</html>