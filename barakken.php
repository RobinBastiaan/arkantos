<?php
include("include/session.php");

?>
<?
if($session->logged_in){
$result = mysql_query("SELECT Inkomenlvl, Barakken, hoofdgebouw, steden FROM users WHERE username = '$session->username'");
	$row = mysql_fetch_assoc($result);
	$steden = $row['steden'];
if($steden == 0){
header("Location: stad.php");
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>
<? $blvl = $row['Barakken'];  ?>

<h3>Barakken (level <? echo"$blvl"; ?>) </h3>
<p><? 
  echo "Welkom $session->username "
  ?> 
in je kazerne met je <strike>slaven</strike> rekruten die je kunt trainen.</p>
Hoe hoger het level van je kazerne, hoe sneller je troepen kan recruteren. Echter, bij deze versie van dit spel is alles meteen geproduceerd.<br>
Welke eenheid wil je rekruteren? <p>
<?
/*$connectie = mysql_connect($server,$gebruiker,$wachtwoord) 
   or trigger_error("Kon niet connecteren met de server");

mysql_select_db($db,$connectie) 
   or trigger_error("Kon de database niet selecteren");
  */
   
/**
zou de eenheden moeten laten zien
 */
 
function displayUsers(){
   global $database;
   $q = "SELECT naam,ras,kosten,type,waar FROM units WHERE type != 'gebouw'ORDER BY kosten DESC,naam";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"center\" width=\"98%\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td bgcolor=\"#F5DEB3\"><b>Eenheid</b></td><td bgcolor=\"#F5DEB3\"><b>Ras (n/a)</b></td><td bgcolor=\"#F5DEB3\"><b>Kosten</b></td><td bgcolor=\"#F5DEB3\"><b>Soort</b></td><td bgcolor=\"#F5DEB3\"><b>Traintijd</b></td><td colspan=2 bgcolor=\"#F5DEB3\"><b>hoeveel wil je?</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"naam");
      $ulevel = mysql_result($result,$i,"ras");
      $email  = mysql_result($result,$i,"kosten");
      $email  = mysql_result($result,$i,"kosten");
      $emailh  = $email;
	  $emailh = $emailh/2;
      $time   = mysql_result($result,$i,"type");
	  $waar   = mysql_result($result,$i,"waar");

echo <<<END
<tr><td>$uname</td><td>$ulevel</td><td>$email G, $emailh H</td><td>$time</td><td>0:00:00</td>
<td><form method="get" action="barakken.php" >
<input type="hidden"  name="soort"   value="$uname" id=soort/>
<input type="hidden"  name="verzonden"   value="1" id=verzonden/>
<input type="text"    name="$uname"  type=text id="$uname "/>
<input type="submit"  name="Submit"  value="Train!" /></td></form></td></tr>\n
END;
   }
   echo "</table><br>\n";
   echo "</form>" ;
   }
   
displayUsers();
$ishetzo = mysql_real_escape_string($_GET["verzonden"]);
if($ishetzo == 1){
?>
<?
$result3 = mysql_query("SELECT Barakken FROM users WHERE username = '$session->username'");
$blvl = $row3 ['Barakken'];  ?>
<h3>&nbsp;</h3>

<?
$connectie = mysql_connect($server,$gebruiker,$wachtwoord) 
   or trigger_error("Kon niet connecteren met de server");

mysql_select_db($db,$connectie) 
   or trigger_error("Kon de database niet selecteren"); 
   $id= $_GET["id"];
   
   
   //de invoer
$wapentype = mysql_real_escape_string($_GET["soort"]);
$soort = mysql_real_escape_string($_GET["soort"]);
$result = mysql_query("SELECT grondstoffen, username, $soort FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$hoeveelheid = mysql_real_escape_string($_GET[$soort]);
if($hoeveelheid > 0){
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

echo "<b> De training was succesvol! </b>";
echo "<br>Je hebt $hoeveelheid $soort getraint, dat heeft je $price goud gekost.";
echo "<p>Je had eerst $hoevoor $soort.";
echo "<br>Je hebt nu $hoena $soort.";
echo "<br>Je had eerst zoveel goud: ".$row['grondstoffen']."";
echo "<br>Je hebt nu zoveel goud over: $ugrondna <p>";
}
else{
echo "je hebt niet genoeg geld";
}
}
 ?>
<? 
}
}
else{
echo "Voordat je eenheden kan kopen, moet je eerst inloggen, dat doe je:  <a href=main.php>hier</a> ";
}







?>

</td></tr></TABLE>
</body>
</html>