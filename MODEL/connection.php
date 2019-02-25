<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: ../index.php');
	
	$bddpass = "null";
	$password = "null";
	$username = "null";

	if (empty($_POST))
	{
		$username = $_SESSION['user'];
		$password = $_SESSION['password'];
	}
	else
	{
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
	}

	include('../bdd.php');
	$email = 'bernard.campan@mondomaine.fr';
	$reponse = $bdd->prepare("SELECT * FROM clients WHERE cli_email = ?");
	$reponse->execute(array($_POST['username']));
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['cli_pass'];
	}



    if($bddpass == $password)
    {
    	$_SESSION['password_error'] = 0;
		if (!(empty($_POST)))
		{
			$_SESSION['password'] = htmlspecialchars($_POST['password']);
			$_SESSION['user'] = htmlspecialchars($_POST['username']);
		}
    }

?>