<?
include("include/session.php");
$uname = $session->username;
if($session->logged_in){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Het spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<td>

<HR size="1">
<center>
<FONT size="+3">Verzamelplaats</FONT>
</center>
<HR size="1">
<p>Op de verzamelplaats kun je leiding geven over je troepen. Hier kun je je troepen verplaatsen of opdrachten geven.</p>
<?
$result2 = mysql_query("SELECT timer FROM users WHERE username = '$session->username'");
$row2 = mysql_fetch_assoc($result2);
$timer = $row2[timer];
 if($timer != 0){
 echo "LET OP! Pas over $timer minuten zijn je troepen terug en kan je een nieuwe aanval doen.<p>"; }
?>

<form action="aproc.php" method="get" name="Aanvallen" target="_top">
<TABLE bgcolor="#FAF1D1" border="1">
<tr><td bgcolor="#F5DEB3" colspan=2><b>Bevelen geven</b></td></tr>
<tr><td><p>Speergozer</td><td><input type="text" size="6" name="speergozer" />
  ( max. "maximale  verplaatsing t.o.v. beschikbaar" )</td></tr>
<tr><td><br>Booggozer</td><td><input type="text" size="6" name="booggozer" />
  ( max. "maximale  verplaatsing t.o.v. beschikbaar" )</td></tr>
<tr><td><br>Paardgozer</td><td><input type="text" size="6" name="paardgozer" />
  ( max. "maximale  verplaatsing t.o.v. beschikbaar" )</td></tr>
</table>
<p>Coördinaten:
<br>
 <table border="0" cellpadding="0">
  <tr>
   <td width="90">x: <input type="text" size="5" name="x" /></td>
   <td width="90">y: <input type="text" size="5" name="y" /></td>
  </tr>
 </table>
 
<p><input type="submit" name="Submit" value="Aanvallen" /></form>

</td></TABLE></body>
</html>
<?
}
?>
