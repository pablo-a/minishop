<?php
session_start();
include ("auth.php");

$login = $_POST['login'];
$hashpw = hash("whirlpool", $_POST['passwd']);

if ((auth($login, $_POST['passwd'])) === False)
{
	echo "mauvaise combinaison <br />" . '<a href="supp_account.html"> retry </a>';
	return (0);
}
$array = (array)unserialize(file_get_contents("./private/passwd"));
$good_key = -1;
foreach ($array as $key => $elem)
{
	if ($elem['login'] === $login)
		$good_key = $key;
}
if ($array[$good_key]['passwd'] !== $hashpw)
{
	echo 'mauvaise combinaison login/mdp <br />' . '<a href="supp_account.html">retry</a>';
}
unset($array[$good_key]);
$array = array_values($array);
$_SESSION['user_log'] = "";
file_put_contents("./private/passwd", serialize($array));
echo 'suppression du compte reussie <br /> ' . '<a href="index.php">retour au menu</a> <br />';



?>
