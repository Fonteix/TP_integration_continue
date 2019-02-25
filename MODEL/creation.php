<?php
  include ('../bdd.php');

  $nom=$_POST['nom'];
  $adresse=$_POST['adresse'];
  $codePostal=$_POST['codePostal'];
  $ville=$_POST['ville'];
  $email=$_POST['email'];
  $dnai=$_POST['dnai'];
  $password=$_POST['password'];

  $reponse = $bdd->prepare("INSERT INTO clients (cli_nom, cli_adr, cli_cps, cli_ville, cli_email, cli_dnai, cli_pass)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
  $reponse->bind_param('sssssss', $nom, $adresse, $codePostal, $ville, $email, $dnai, $password);
  $reponse->execute();
  //$result = $reponse->get_result();
?>
