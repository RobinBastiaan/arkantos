<?
include("../include/session.php");

?>
<?
$connectie = mysql_connect($server,$gebruiker,$wachtwoord) 
   or trigger_error("Kon niet connecteren met de server");

mysql_select_db($db,$connectie) 
   or trigger_error("Kon de database niet selecteren");
   
/**
zou de eenheden moeten laten zien
 */
function displayUsers(){
   global $database;
   $q = "SELECT naam,ras,kosten,type,waar FROM units ORDER BY kosten DESC,naam";
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
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Eenheid</b></td><td><b>Ras (n/a)</b></td><td><b>Kosten</b></td><td><b>Soort</b></td><td><b>waar kan je het kopen (n/a)</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"naam");
      $ulevel = mysql_result($result,$i,"ras");
      $email  = mysql_result($result,$i,"kosten");
      $time   = mysql_result($result,$i,"type");
	  $waar   = mysql_result($result,$i,"waar");

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td><td>$waar</td></tr>\n";
   }
   echo "</table><br>\n";
   }
   
displayUsers();
?>