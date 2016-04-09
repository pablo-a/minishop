<?PHP

if ($_POST[submit] !==  "OK" || !$_POST[login] || !$_POST[passwd])
{
	echo "renseignez tous les champs svp\n";
	return (0);
}
$array = array();
if (file_exists("./private/passwd"))
	$array = (array)unserialize(file_get_contents("./private/passwd"));

$number = 0;
foreach ($array as $key => $elem)
{
	if ($elem[login] === $_POST[login])
	{
		echo "ERROR login deja pris\n";
		return (0);
	}
	if ($key > $number)
		$number = $key;
}
$array[$number + 1][login] = $_POST[login];
$array[$number + 1][passwd] = hash("whirlpool", $_POST[passwd]);
@mkdir("./private/");
file_put_contents("./private/passwd", serialize($array));

echo "<p> c'est ok retournez  a la page principale mainteannt</p><br />"
	. '<a href="index.php">accueil</a>';

?>
