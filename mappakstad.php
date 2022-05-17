<?php
include("include/session.php");
$x = $_GET["x"];
$y = $_GET["y"];
mysql_query("UPDATE users SET steden=steden+1 WHERE username = '$session->username' ");
mysql_query("UPDATE map SET van='$session->username' WHERE x = '$x' AND y='$y'");
header("Location: plek.php?x=$x&y=$y");
?>