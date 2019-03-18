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
	<div style="width: 20%; position: absolute; left: 0px; padding: 3%;">
<h1>ACCUEIL</h1>
<a href="inscription.php">Inscription</a>
<a href="connexion.php">Connection</a>
<p>
<?php 
if (isset($_SESSION['user']))
	echo "Bonjour ".$_SESSION['username'];
?>
</p>
</div>

<div style="position: absolute; right: 0px;">
	<form action="../MODEL/RechAlbum.php" method="post">
		<input type="text" name="choix">
	</form>

	<?php
	if (isset($_SESSION['rechalb']))
		echo $_SESSION['rechalb'];
	?>
</div>

</body>
</html>