<?
include("include/session.php");
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];

function displayUsers(){
   global $database;
   $q = "SELECT username,punten FROM users WHERE puntendoen='1' ORDER BY punten DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Er zijn geen spelers, hmmm, hoe kan jij dit zien?";
      return;
   }
   /* Display table contents */
   echo "<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Rang</b></td><td><b>Speler</b></td><td><b>Punten</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $username  = mysql_result($result,$i,"username");
      $punten = mysql_result($result,$i,"punten");

      $rang = $i+1;
      echo "<tr><td>$rang</td><td>$username</td><td>$punten</td></tr>\n";

   }
   echo "</table><br>\n";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<tr><td>
<HR size="1">
<center>
<FONT size="+3">Ranglijst</FONT>
</center>
<HR size="1">
Je score wordt bijgehouden om te meten welke spelers het het beste doen. 

<p>Helaas doet de ranglijst het nog niet omdat er nog een punten-systeem in elkaar moet worden geflanst.</p>

Aantal Punten = hoofdgebouwlvl*4 + barakken + inkomengebouw + houthakkerij + marktplaats + grondstoffen/1000 + hout/1000
<?
displayUsers();
?>
<p></p>
</td></td></TABLE>
</body>
</html>