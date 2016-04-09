<?PHP

function set_cookie($name, $value, $time)
{
	setcookie($name, $value, time() + $time, null, null, false, true);
}

function get_cookie($name)
{
	if (!isset($_COOKIE[$name]))
		return (FALSE);
	return ($_COOKIE[$name]);
}

function del_cookie($name)
{
	if (!isset($_COOKIE[$name]))
		return (FALSE);
	set_cookie($name, "remove", time() - 3600);
}

?>
