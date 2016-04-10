<?PHP

function add_line($csv, $nom, $qtt, $prix, $array_ctg)
{
	$number = 0;
	if ($f = @fopen('bdd.csv', 'w'))
	{
		foreach ($data as $ligne) 
		{
			$number++;
		}

		fclose($f);
	}
	else {
		echo "Impossible d'acc&eacute;der au fichier de base de donn&eacute;e";
	}
}



?>
