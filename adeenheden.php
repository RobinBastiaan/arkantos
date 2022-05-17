<?
include("include/rassen.php");
?>
<?
/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT naam,ras,type,waar "
       ."FROM eenheden ORDER BY kosten DESC,naam";
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
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
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
?>