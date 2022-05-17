<?
include("include/session.php");
$snd = $_POST['geluid'];

mysql_query("UPDATE users SET geluid='$snd' WHERE username = '$session->username' ");

header("Location: main.php");


?>
