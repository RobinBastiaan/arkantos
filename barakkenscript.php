<?php
include("include/session.php");
if($session->logged_in){
//de sql zooi
?>
<html>
<head>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>

<?
$result3 = mysql_query("SELECT Barakken FROM users WHERE username = '$session->username'");
$blvl = $row3 ['Barakken'];  ?>
<h3>Barakken (level <? echo"$blvl"; ?>) </h3>

<?
$connectie = mysql_connect($server,$gebruiker,$wachtwoord) 
   or trigger_error("Kon niet connecteren met de server");

mysql_select_db($db,$connectie) 
   or trigger_error("Kon de database niet selecteren"); 
   $id= mysql_real_escape_string($_GET["id"]);
   //de invoer
$wapentype = mysql_real_escape_string($_GET["soort"]);
$soort = mysql_real_escape_string($_GET["soort"]);
$result = mysql_query("SELECT grondstoffen, username, $soort FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$hoeveelheid = mysql_real_escape_string($_GET[$soort]);
$hoevoor = $row[$soort];
$hoena = $hoevoor + $hoeveelheid;
//$hoeveelheid = hoeveelheid * 1 ;
/*
//anti letters en anti min
$hoeveelheid = $hoeveelheid * 1 ;
if($hoeveelheid < 0)
{
$hoeveelheid = 0 ;
}
*/

//wat gezien wordt
$result2 = mysql_query("SELECT kosten FROM units WHERE naam = '$soort'");
$row2 = mysql_fetch_assoc($result2);
$kosten = $row2['kosten'];
$price = $kosten * $hoeveelheid;

$uname = $row['username'];
$ugrond = $row['grondstoffen'];
$ugrondna = $ugrond - $price;
if($ugrondna > 0 ){
mysql_query("UPDATE users SET grondstoffen = '$ugrondna' WHERE username = '$uname' ");
mysql_query("UPDATE users SET $soort = '$hoena' WHERE username = '$uname' ");

echo "<b> De training was succesvol!</b>";
echo "<p>Je hebt $hoeveelheid $wapentype getrained"  ; 
echo "<br> Je had eerst $hoevoor $soort";
echo "<br>Je hebt nu $hoena $soort heeft";
echo "<br>Je hebt zoveel grondstoffen:".$row['grondstoffen']."<br/>";
echo "je hebt $hoeveelheid $soort gekocht, dat heeft je $price gekost";
echo "<br>U heeft nog $ugrondna grondstoffen over." ;
}
else{
echo "je hebt niet genoeg geld";
}
 }
 else{
 echo "fout, log eerst in";
 }
 ?>
 
<p><a href="barakken.php" target="main">Ga terug naar je barakken!</a></p>
</td></tr></table>
</body></html>