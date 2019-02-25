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

	include ('../bdd.php');
	$reponse = $bdd->prepare('SELECT * FROM clients WHERE cli_email= ?');
	$reponse->bind_param('s', $username);
    $reponse->execute();
    $result = $reponse->get_result();
    while ($donnees = $result->fetch_assoc())
    {
        $bddpass = $donnees['pass'];
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