<?
include("include/session.php");
$snd = mysql_real_escape_string($_POST["geluid"]);
mysql_query("UPDATE users SET geluid='$snd' WHERE username = '$session->username' ");
header("Location: main.php");
?>
