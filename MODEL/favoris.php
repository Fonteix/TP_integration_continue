<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: ../index.php');
    
    if(isset($_GET['add']))
    {
    	$res=str_replace ("%20", " ", $_GET['add']);
        addfavart($res);
    }
    elseif (isset($_GET['less']))
    {
    	$res=str_replace ("%20", " ", $_GET['less']);
        remfavart($res);
    }
    else
    {
    	$_SESSION['favalb'] = null;
    	getfavalb();
    }



    /*function getfavart()
	{
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			echo $donnees['fa_listeart'];
		}
	}*/

	function getfavalb()
	{
		include('../bdd.php');
		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			$_SESSION['favalb'] .= $donnees['fa_alb']."<a href='../MODEL/favoris.php?less=".$donnees['fa_alb']."'> -</a>"."</br>";
		}
	}

	function addfavart($art)
	{
		include('../bdd.php');
		$err = false;

		$reponse = $bdd->prepare("SELECT * FROM favoris WHERE fa_email = ?");
		$reponse->execute(array($_SESSION['user']));
		while ($donnees = $reponse->fetch())
		{
			if($art == $donnees['fa_alb'])
				{
					$err = true;
				}
		}

		if ($err == false)
		{
			$stmt = $bdd->prepare("INSERT INTO favoris (fa_email, fa_alb)
			VALUES (:fa_email, :fa_alb)");
			$stmt->bindParam(':fa_email', $_SESSION['user']);
			$stmt->bindParam(':fa_alb', $art);
		
			$stmt->execute();
			$_SESSION['favalb'] = null;
		   	getfavalb();
		}
	}

	function remfavart($art)
	{
		include('../bdd.php');
		$reponse = $bdd->prepare("DELETE FROM favoris WHERE fa_alb = ?");
		$reponse->execute(array($art));
		$_SESSION['favalb'] = null;
		getfavalb();
	}

	/*function addfavalb($alb)
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
	}*/

?>
<script type="text/javascript">
	document.location= '../VIEW/Acceuil.php';
</script>