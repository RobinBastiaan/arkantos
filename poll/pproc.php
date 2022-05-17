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

if (!isSet($_POST['vraag'])) {
echo"Je moet wel iets invullen om een geldige stem uit te bregen, aap. :) <br />"; }

$sql = "SELECT ip FROM poll where ip ='$ip'";
$res = mysql_query($sql);

if (mysql_num_rows($res) >= 1 & !isSet($_POST['vraag']))  {
echo"  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &amp; <br />"; }

if (mysql_num_rows($res) >= 1) {
 echo "Je hebt al een keer gestemd op deze vraag. Daarom kan je niet nog een keer stemmen.<br />";  }

else {
$antwoord = $_POST['vraag'];
if($antwoord == 1){$volantwoord = Arkanos; }
if($antwoord == 2){$volantwoord = Arkantos; }
if($antwoord == 3){$volantwoord = Feodor; }
mysql_query("INSERT INTO poll (antwoord, volantwoord, ip) VALUES ('$antwoord', '$volantwoord' , '$ip')");
echo"Je hebt gestemd op $volantwoord, en je stem was succesvol! Bedankt voor het meedoen met de poll!<br />";
  } 
  
echo"<br />Ga terug naar het <a href=\"index.php\" target=\"_SELF\">Hoofdscherm</a>";
if ($antwoord = $_POST['vraag']) { echo", of bekijk de <a href=\"stand.php\" target=\"main\">Tussenstand</a>."; }

?>
<p></p></TD></TR></TABLE>
</body>
</html>