<?PHP session_start(); 
include("gere_panier.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>votre panier</title>
		<link rel="stylesheet" href="minishop.css" title="text/css" type="screen" />
	</head>
	<body>
		<table >
			<tr>
				<th>produit</th>
				<th>quantite</th>
				<th>prix a l'unite</th>
				<th colspan="3">actions</th>
			</tr>
<?PHP
add_to_panier("balai", 1, 10);
if (!isset($_SESSION['panier']))
	echo "<tr><td colspan=\"4\"> votre panier est vide pour le moment</td></tr>";
else
{
	$nb = count($_SESSION['panier']['nom']);// combien de ligne on a a afficher
	for ($i = 0; $i < $nb; $i++)
	{
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['nom'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['qtt'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] . "&euro;</td>";
		echo '<td class="action_tab"><a href="panier.php?action=add&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/cross-of-plus-sign_318-27606.jpg" alt="croix" class="action"/></a>';
		echo '<td><a href="panier.php?action=sub&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/noir-moins_318-8480.jpg" alt="croix" class="action"/></a>';
		echo '<td><a href="panier.php?action=del&nom=' . $_SESSION[panier][nom][$i] . '"><img src="./img/fermer-croix-supprimer-erreurs-sortie-icone-4368-128.png" alt="croix" class="action"/></a>';
		echo "</tr>";
		$i++;
	}
}
?>
		</table>
	</body>
</html>
