<?
include("include/session.php"); 
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = mysql_real_escape_string($_GET["geluid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; }?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>
<body>
<?
echo"<TABLE bgcolor=\"#FAF1D1\" border=\"1\" width=\"70%\" align=\"center\"><tr><td>";

echo"<H3>Berichten</H3>";
echo"Hier vind je een overzicht van de gebeurtenissen en berichten van andere spelers. Ook kan je zelf een bericht sturen aan andere spelers.";
echo"<a href=\"bericht.php\" target=\"main\">Verstuur een bericht.</a> ";
echo"<p>";
echo "</td></tr></TABLE>";
echo"<p>";
/*
$result = mysql_query("SELECT bericht, van FROM msg WHERE username = $session->username");
$row = mysql_fetch_assoc($result);
*/
   global $database;
   $q = "SELECT bericht,van,aan,indnum, datum FROM msg WHERE aan='$session->username' ORDER BY indnum DESC";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Je hebt nog geen berichten.";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" align=\"center\" cellpadding=\"3\">\n";
   echo "<tr><td bgcolor=\"#F5DEB3\"><b>Van</b></td><td bgcolor=\"#F5DEB3\"><b>Datum</b></td><td bgcolor=\"#F5DEB3\"><b>Bericht</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $bericht  = mysql_result($result,$i,"bericht");
      $van = mysql_result($result,$i,"van");
      $datum = mysql_result($result,$i,"datum");
	  
            echo "<tr><td>$van</td><td>$datum</td><td>";
	 echo nl2br("$bericht");
	  echo"</td></tr>\n";
   }
   echo "</table><br>\n";
   
   
echo"</body>";
echo"</html>";
?>