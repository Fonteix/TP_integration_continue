<?php
/*include('bdd.php');
$email = 'bernard.campan@mondomaine.fr';
$reponse = $bdd->prepare("SELECT * FROM clients WHERE cli_email = ?");
$reponse->execute(array($_POST['cli_email']));
while ($donnees = $reponse->fetch())
{
	echo $donnees['cli_pass'];
}*/

include('bdd.php');

	$nom = 'Campan, Bernard';
 	$adr = '17 rue de la république';
  	$cps = '75001';
  	$ville = 'Paris';
  	$email = 'bernard.campan@mondomaine.fr';
  	$dnai = '1958-04-04';
  	$pass = 'qwerty5';
  	$ca = 0.00;

 $stmt = $bdd->prepare("INSERT INTO clients (cli_nom, cli_adr, cli_cps, cli_ville, cli_email, cli_dnai, cli_ca, cli_pass) VALUES (:cli_nom, :cli_adr, :cli_cps, :cli_ville, :cli_email, :cli_dnai, :cli_ca, :cli_pass)");
	$stmt->bindParam(':cli_nom', $nom);
	$stmt->bindParam(':cli_adr', $adr);
	$stmt->bindParam(':cli_cps', $cps);
	$stmt->bindParam(':cli_ville', $ville);
	$stmt->bindParam(':cli_email', $email);
	$stmt->bindParam(':cli_dnai', $dnai);
	$stmt->bindParam(':cli_ca', $ca);
	$stmt->bindParam(':cli_pass', $pass);

$stmt->execute();




?>