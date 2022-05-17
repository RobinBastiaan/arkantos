<?
include("../include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Poll</title>
<link rel="stylesheet" type="text/css" href="../szn.css" />
</head>
<body>

<CENTER>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<tr><td>

<?
$ip = getenv('REMOTE_ADDR');
$sql = "SELECT ip FROM poll where ip ='$ip'";
$res = mysql_query($sql);
if (mysql_num_rows($res) == 0) {
?>

<p><b>Welke naam moet ons spel krijgen?</b> (Wat vind jij een leuke naam voor ons spel?)<br />
<i>LET OP: Je kan maar 1 keer stemmen.</i></p>
<form id="form1" name="form1" method="post" action="pproc.php">
 <p><input name="vraag" type="radio" value="1" /> 
  Antwoord 1: Arkanos</p>
 <p><input name="vraag" type="radio" value="2" />
  Antwoord 2: Arkantos</p>
 <p><input name="vraag" type="radio" value="3" />
  Antwoord 3: Feodor</p>
 <p>Vind jij geen van deze namen goed, of heb jij een betere verzonnen?<br /> Vul je zelfverzonnen nieuwe naam in. Je stemt gelijk op je verzonnen naam, dus nog een keer stemmen is niet meer mogelijk.<br />
  <input name="naam" type="text" value="Nieuwe naam" /><br />
 <i>LET OP: Deze laatste functie doet het nog niet want er zal worden aangegeven dat je niets hebt ingevult.<br /> Als je ons toch wilt tippen met een goede naam, stuur dan een mailje naam robin_bastiaan@hotmail.com en ik zal jouw antwoord/naam er ook tussen zetten (als het een goede is :P ).</i>

  </p>
 <p><input name="Submit" type="submit" value="Stem!" />
  </p>
</form>
<p></p>

<?
}
else{
echo "<p><b>Tussenstand: Welke naam moet ons spel krijgen?</b></p>";
for($i=1; $i<4; $i++){
$result = mysql_query( "SELECT antwoord FROM poll WHERE antwoord=$i" );
    $num_rows = mysql_numrows($result);
if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database is leeg";
      return;
   }
   if($i == 1){$n = Arkanos; }
   if($i == 2){$n = Arkantos; }
   if($i == 3){$n = Feodor; }
   $num_rows = $num_rows - 1;
   echo"Antwoord Nr.$i, $n : $num_rows stem(men) <br>";
}

$result = mysql_query( "SELECT antwoord FROM poll" );
    $num_rows = mysql_numrows($result);
	   $num_rows = $num_rows - 3;
?>
<p>Totaal aantal uitgebracht: <? echo "$num_rows";  ?> stem(men)<br />
   De definitieve uitslag van deze vraag wordt bekend gemaakt op a.s. vrijdag 5 dec.</p>
<p>Ga terug naar het <a href="index.php">Hoofdscherm</a>.</p>
</TD></TR></TABLE>
</body>
</html>
<?
}
?>