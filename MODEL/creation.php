<?php
  include ('../bdd.php');

  $nom = $POST['nom'];
  $adr = $POST['adresse'];
  $cps = $POST['codePostal'];
  $ville = $POST['ville'];
  $email = $POST['email'];
  $dnai = $POST['dnai'];
  $pass = $POST['password'];

  $stmt = $bdd->prepare("INSERT INTO clients (cli_id, cli_nom, cli_adr, cli_cps, cli_ville, cli_email, cli_dnai, cli_ca, cli_pass) VALUES (:cli_id, :cli_nom, :cli_adr, :cli_cps, :cli_ville, :cli_email, :cli_dnai, :cli_ca, :cli_pass)");
	$stmt->bindParam(':cli_id', uniqid());
	$stmt->bindParam(':cli_nom', $nom);
	$stmt->bindParam(':cli_adr', $adr);
	$stmt->bindParam(':cli_cps', $cps);
	$stmt->bindParam(':cli_ville', $ville);
	$stmt->bindParam(':cli_email', $email);
	$stmt->bindParam(':cli_dnai', $dnai);
	$stmt->bindParam(':cli_ca', 'a');
	$stmt->bindParam(':cli_pass', $pass);

	$stmt->execute();
?>
