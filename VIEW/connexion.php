<?php
	session_start();
	if (!isset($_SESSION['prm']))
        header('Location: ../index.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
        <title>Connexion</title>
        <link rel="shortcut icon" type="image/x-icon" href="../IMAGES/favicon.ico" />
</head>
<body>
	<div class="content">
		<?php
		if ($_SESSION['password_error'] == 1)
		{
			?>
				<script type="text/javascript">alert("Mauvais mot de passe");</script>
			<?php
		}
		?>
		<h1>CONNEXION</h1>
		<form action="../MODEL/connection.php" method="post">
			<input type="text" name="username">
			<input type="password" name="password">
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>