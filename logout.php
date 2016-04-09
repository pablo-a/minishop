<?PHP
session_start();
include("redirection.php");
$_SESSION['user_log'] = "";
redirect("index.php");

?>
