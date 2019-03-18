<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: ../index.php');

    $_SESSION['rechalb'] = null;

    include('../bdd.php');

    $reponse = $bdd->prepare("SELECT * FROM albums WHERE alb_art = ?");
	$reponse->execute(array($_POST['choix']));
	while ($donnees = $reponse->fetch())
	{
		$_SESSION['rechalb'] .=  $donnees['alb_nom']."<a href='../MODEL/favoris.php?add=".$donnees['alb_nom']."'> +</a>"."</br>";
	}


?>

<script type="text/javascript">
	document.location= '../VIEW/Acceuil.php';
</script>