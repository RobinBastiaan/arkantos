<?
include("include/session.php");
$naam = mysql_real_escape_string($_GET["naam"]);
mysql_query("UPDATE users SET stadnaam = '$naam' WHERE username = '$session->username' ");
header("Location: stad.php ");

?>