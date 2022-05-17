<?php
include("include/session.php");
$x = mysql_real_escape_string($_GET["x"]);
$y = mysql_real_escape_string($_GET["y"]);

$result = mysql_query("SELECT van, type FROM map WHERE x = $x AND y = $y");
$row = mysql_fetch_assoc($result);
$vanwie = $row['van'];

$result3 = mysql_query("SELECT steden FROM users WHERE username ='$session->username'");
$row3 = mysql_fetch_assoc($result3);
$aantal = $row3['steden'];

if($vanwie == neutraal){
	if($aantal == 0){
mysql_query("UPDATE users SET steden=steden+1 WHERE username = '$session->username' ");
mysql_query("UPDATE map SET van='$session->username' WHERE x = '$x' AND y='$y'");
header("Location: plek.php?x=$x&y=$y");

} }
?>
