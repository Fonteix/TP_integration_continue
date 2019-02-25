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


	$stmt = $bdd->prepare("SELECT * FROM clients where cli_email = ?");
		if ($stmt->execute(array($_GET['cli_email'])))
		{
	  		while ($row = $stmt->fetch()) {
	    	print_r($row);
	  	}
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