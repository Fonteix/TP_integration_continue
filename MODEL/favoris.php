<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: ../index.php');
    switch ($_POST['choix']) {
    	case 'addfavart':
    		addfavart(htmlspecialchars($_POST['val']))
    		break;
    	case 'addfavalb':
    		addfavalb(htmlspecialchars($_POST['val']))
    		break;
    	case 'getfavart':
    		getfavart()
    		break;
    	case 'getfavalb':
    		getfavalb()
    		break;
    	
    	default:
    		echo 1;
    		break;
    }



    function getfavart()
	{
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			echo $donnees['fa_listeart'];
		}
	}

	function getfavalb()
	{
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			echo $donnees['fa_listealb'];
		}
	}

	function addfavart($art)
	{
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			$list = $donnees['fa_listeart'];
		}

		$list = $list.";".$art;
		$stmt = $bdd->prepare("INSERT INTO favoris (fa_email, fa_listeart, fa_listealb)
			VALUES (:fa_email, :fa_listeart, :fa_listealb)");
		$stmt->bindParam(':fa_email', $_SESSION['user']);
		$stmt->bindParam(':fa_listeart', $list);
		$stmt->bindParam(':fa_listealb', "");

		$stmt->execute();
	}

	function addfavalb($alb)
	{
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			$list = $donnees['fa_listeart'];
		}

		$list = $list.";".$alb;
		$stmt = $bdd->prepare("INSERT INTO favoris (fa_email, fa_listeart, fa_listealb)
			VALUES (:fa_email, :fa_listeart, :fa_listealb)");
		$stmt->bindParam(':fa_email', $_SESSION['user']);
		$stmt->bindParam(':fa_listeart', "");
		$stmt->bindParam(':fa_listealb', $list);

		$stmt->execute();
	}






?>