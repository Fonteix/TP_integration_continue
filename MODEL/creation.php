<?php
  include ('../bdd.php');

  

  $stmt = $bdd->prepare("INSERT INTO clients (cli_nom, cli_adr, cli_cps, cli_ville, cli_email, cli_dnai, cli_ca, cli_pass) VALUES (:cli_nom, :cli_adr, :cli_cps, :cli_ville, :cli_email, :cli_dnai, :cli_ca, :cli_pass)");
	/*$stmt->bindParam(':cli_id', '1');*/
	$stmt->bindParam(':cli_nom', $nom);
	$stmt->bindParam(':cli_adr', $adr);
	$stmt->bindParam(':cli_cps', $cps);
	$stmt->bindParam(':cli_ville', $ville);
	$stmt->bindParam(':cli_email', $email);
	$stmt->bindParam(':cli_dnai', $dnai);
	$stmt->bindParam(':cli_ca', $ca);
	$stmt->bindParam(':cli_pass', $pass);


	$nom = $_POST['nom'];
 	$adr = $_POST['adresse'];
  	$cps = $_POST['codePostal'];
  	$ville = $_POST['ville'];
  	$email = $_POST['email'];
  	$dnai = date("H:i dS F");
  	$pass = $_POST['password'];
  	$ca = 0.00;
	
	$stmt->execute();
?>

<script>
	document.location= '../index.php';
</script>
