<?PHP
session_start();


function create_panier()
{
	$_SESSION['panier'] = array();
	$_SESSION['panier']['nom'] = array();
	$_SESSION['panier']['qtt'] = array();
	$_SESSION['panier']['prix'] = array(); // un prix a l'unite on va dire
	$_SESSION['panier']['valide'] = false;
}

function add_to_panier($nom, $qtt, $prix)//verifier que les parametres sont ok avant ?
{
	if (!isset($_SESSION['panier']))
		create_panier();
	$key = array_search($nom, $_SESSION['panier']['nom']);
	if ($key === FALSE)//pas encore ajoute au panier
	{
		$_SESSION['panier']['nom'][] = $nom;
		$_SESSION['panier']['qtt'][] = $qtt;
		$_SESSION['panier']['prix'][] = $prix;
	}
	else
		$_SESSION['panier']['qtt'][$key] += $qtt;
}

function rm_to_panier($nom)
{
	if (!isset($_SESSION['panier']))
		return (FALSE);
	$key = array_search($nom, $_SESSION['panier']['nom']);
	if ($key === FALSE)//pas dans le panier
		return (FALSE);
	unset($_SESSION['panier']['nom'][$key]);
	unset($_SESSION['panier']['qtt'][$key]);// on enleve la bonne ligne sur tous les tableaux
	unset($_SESSION['panier']['prix'][$key]);
	$_SESSION['panier']['nom'] = array_values($_SESSION['panier']['nom']);//    pour reindexer 
	$_SESSION['panier']['qtt'] = array_values($_SESSION['panier']['qtt']);//    le tableau
	$_SESSION['panier']['prix'] = array_values($_SESSION['panier']['prix']);//   correctement
}

function modify_qtt($nom, $qtt)//verifier que la quantite est possible avant (pas de negatifs plz)
{
	if (!isset($_SESSION['panier']))
		return (FALSE);
	$key = array_search($nom, $_SESSION['panier']['nom']);
	if ($key === FALSE)//pas dans le panier
		return (FALSE);
	$_SESSION['panier']['qtt'][$key] = $qtt;
}

function prix_panier()// j'ai pas test mais ca m'a l'air ok comme formule
{
	$result = 0;
	foreach ($_SESSION['panier'] as $article)
	{
		$result += ($article['qtt'] * $article['price']);
	}
	return ($result);
}

function valider_panier()
{
	if (isset($_SESSION['panier']))
		$_SESSION['panier'] = true;
}

function rm_panier()
{
	if (isset($_SESSION['panier']))
		unset($_SESSION['panier']);
}

?>
