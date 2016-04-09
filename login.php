<?PHP


session_start();
include("auth.php");

if (!$_POST['login'] || !$_POST['passwd'])
{
	$_SESSION['user_log'] = "";
	echo "ERROR\n";
}

if (auth($_POST['login'], $_POST['passwd']) === TRUE)
{
	$_SESSION['user_log'] = $_POST['login'];
	echo 'vous etes maintenant connecte ' . $_POST['login'] . '!<br />';
	echo "<a href='index.php'>retourner a l'accueil</a>";
	return (0);
}

else
{
	$_SESSION['user_log'] = "";
	echo "erreur mauvaise combinaison login/mdp\n";
}

?>
