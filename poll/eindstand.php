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

<HR size="1">
<p><center>
<FONT size="+3">Eindstand</FONT>
</center></p>
<HR size="1">
<?
if($_GET['vraag'] == 1){
echo"<p><b>Je kijkt nu naar de vraag: \"Welke naam moet ons spel krijgen?\"</b><br />";
echo"Antwoord Nr.1, Arkanos : 4 stemmen<br />";
echo"Antwoord Nr.2, Arkantos : 8 stemmen<br />";
echo"Antwoord Nr.3, Feodor : 7 stemmen<br />";
echo"Totaal aantal uitgebracht: 19 stemmen<br />";
echo"<p>De uiteindelijke winnaar is geworden: <b>Arkantos!!</b></p>";  }
?>
   
<p>Bedankt voor het grote aantal stemmen!
<br />Ga terug naar het <a href="index.php">Hoofdscherm</a>.</p>

</TD></TR></TABLE>
</body>
</html>