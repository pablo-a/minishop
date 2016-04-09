<?PHP session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>minishop</title>
		<link rel="stylesheet" href="minishop.css" title="text/css" type="screen"/>
	</head>
	<body>
		<header>
			<h1>minishop</h1>
			<?PHP
				if ($_SESSION['user_log'] === "")
					echo '<a href="suscribe.html">s\'inscrire</a> <br />' .
					'<a href="login.html">se connecter</a> <br />';
				if ($_SESSION['user_log'] !== "")
					echo 'comment ca va ' . $_SESSION["user_log"] . '? <br />' .
					'<a href="logout.php">se deconnecter</a> <br />' .
					'<a href="supp_account.html">supprimer son compte :\'(</a>';
			?>
		</header>
		<div id="primary">
			<div class="navigateur">
				navigateur
			</div>
			<div class="elem2">
				articles
			</div>
			<div class="elem3">
				<a href="panier.php">votre panier</a>
			</div>
		</div>
		<hr style="position:fixed; bottom: 230px; width: 100%">
		<footer>
			footer
		</footer>
	</body>
</html>
