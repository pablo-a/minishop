<?PHP session_start(); 
include("gere_panier.php");
include("redirection.php");

/*add_to_panier("something",1, 14);
add_to_panier("aaa",1, 105);
add_to_panier("bbb",1, 3);
add_to_panier("ccc",1, 58);
 */
//partie sur les operations sur le panier :
//ajouter enlever supprimer etc
if (isset($_GET['action']) && isset($_GET['nom']))
{
	if ($_GET['action'] === "add")
		modify_qtt($_GET['nom'], 1);
	else if ($_GET['action'] === "sub")
		modify_qtt($_GET['nom'], -1);
	else if ($_GET['action'] === "del")
		rm_to_panier($_GET['nom']);
	redirect("panier.php");
}
else if (isset($_GET['rm_panier']) && $_GET['rm_panier'] === "supprimer mon panier")
{
	rm_panier();
	redirect("panier.php");
}
else if (isset($_GET['valider']) && $_GET['valider'] === "valider mon panier")
{
	$_SESSION['panier']['valide'] = true;
	redirect("panier.php");
}










?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>votre panier</title>
		<link rel="stylesheet" href="minishop.css" title="text/css" type="screen" />
	</head>
	<body>
		<form action="panier.php" method="get" accept-charset="utf-8">
		<table >
			<tr>
				<th>produit</th>
				<th>quantite</th>
				<th>prix a l'unite</th>
				<th colspan="3">actions</th>
			</tr>
<?PHP
if (!isset($_SESSION['panier']) || empty($_SESSION['panier']['nom']))
	echo "<tr><td colspan=\"4\"> votre panier est vide pour le moment</td></tr>";
else
{
	$prix_panier = prix_panier();
	$nb = count($_SESSION['panier']['nom']);// combien de ligne on a a afficher
	for ($i = 0; $i < $nb; $i++)
	{
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['nom'][$i] . "</td>";
		echo "<td class='toright'>" . $_SESSION['panier']['qtt'][$i] . "</td>";
		echo "<td class='toright'>" . $_SESSION['panier']['prix'][$i] . "&euro;</td>";
		echo '<td class="action_tab"><a href="panier.php?action=add&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/cross-of-plus-sign_318-27606.jpg" alt="croix" class="action"/></a>';
		echo '<td><a href="panier.php?action=sub&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/noir-moins_318-8480.jpg" alt="croix" class="action"/></a>';
		echo '<td><a href="panier.php?action=del&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/fermer-croix-supprimer-erreurs-sortie-icone-4368-128.png" alt="croix" class="action"/></a>';
		echo "</tr>";
	}
		echo "<tr>";
		echo '<td colspan="2"> prix du panier complet </td>';
		
		echo '<td class="toright">' . $prix_panier . '&euro;<?td>';
		echo "</tr>";
}
?>
		</table>
		<br />
		<input type="submit" name="valider" value="valider mon panier" />
		<input type="submit" name="rm_panier" value="supprimer mon panier" />
		</form>
<?PHP if ($_SESSION['panier']['valide'])
echo "<p>panier valid&eacute; !</p>";
?>
	</body>
</html>
