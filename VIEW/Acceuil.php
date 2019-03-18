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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="background-color: #232323; color: white;">
	<div style="width: 20%; position: absolute; left: 0px; padding: 3%;">
<h1>ACCUEIL</h1>
<a href="inscription.php">Inscription</a></br>
<a href="connexion.php">Connection</a></br>
<i class="material-icons"></i>

<?php 
if (isset($_SESSION['user']))
	echo "<p style='color: white;'> Bonjour ".$_SESSION['username']."</p>";
?>

</div>

<div style="position: absolute; right: 0px; padding: 3%;">
	<h2>Rechercher album par artiste</h2>
	<form action="../MODEL/RechAlbum.php" method="post">
		<input type="text" name="choix">
		<input type="submit" value="go">
	</form>
	<?php
	if (isset($_SESSION['rechalb']))
		echo $_SESSION['rechalb'];
	?>
</div>

<div style="position: absolute; width: 30%;padding: 3%; left: 30%;">
	<h2>Albums favoris</h2>
	<?php
	if (isset($_SESSION['favalb']))
		echo $_SESSION['favalb'];
	?>
</div>

</body>
</html>