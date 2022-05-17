<?
include("include/session.php");

echo"
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Het spel zonder naam</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"szn.css\" />
</head>
<body>
";

if($session->isadmin()){


/*
$result = mysql_query("SELECT bericht, van FROM msg WHERE username = $session->username");
$row = mysql_fetch_assoc($result);
*/
   global $database;
   $q = "SELECT bericht,van,aan,indnum, datum FROM msg ORDER BY indnum DESC";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database is leeg";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Van</b></td><td><b>Aan:</b></td><td><b>Bericht</b></td><td><b>datum:</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $bericht  = mysql_result($result,$i,"bericht");
      $van = mysql_result($result,$i,"van");
      $datum = mysql_result($result,$i,"datum");
	  $aan = mysql_result($result,$i,"aan");
	$bericht = nl2br($bericht);
      echo "<tr><td>$van</td><td>$aan</td><td>$bericht</td><td>$datum</td></tr>\n";
   }
   echo "</table><br>\n";
}
else {
 echo "Deze pagina kan je niet bekijken. Dit kan 2 oorzaken hebben";
 echo "<p>1. Je bent geen admin!<br /> (je moet userlevel 9 of hoger zijn (hoger dan userlevel 9 kan niet maar daar gaat het niet om... ;p ))</p> ";
 echo "<p>2. Je bent niet ingelogt! <br /> (Klik dan om in te loggen <a href=\"main.php\" target=\"main\">HIER</a>!)</p>"; }
?>