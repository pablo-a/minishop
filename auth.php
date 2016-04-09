<?PHP

function auth($login, $passwd)
{
	$modif_key = -1;
	$hashpw = hash("whirlpool", $passwd);
	$array = (array)unserialize(file_get_contents("./private/passwd"));
	$good_key = -1;
	foreach ($array as $key => $elem)
	{
		if ($elem['login'] === $login)
			$good_key = $key;
	}
	if ($array[$good_key]['passwd'] === $hashpw)
		return (TRUE);
	return(FALSE);
}
?>
