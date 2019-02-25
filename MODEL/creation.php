<?php
  include 'bdd.php';
  $reponse = $bdd->prepare('INSERT INTO clients (cli_nom, cli_adr, cli_cps, cli_ville, cli_email, cli_dnai, cli_pass) VALUES () ');
  $reponse->execute();
  $result = $reponse->get_result();
?>
