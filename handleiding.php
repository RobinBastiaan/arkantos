<?
include("include/session.php"); 
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><head><? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<td>

<HR size="1">
<center>
<FONT size="+3">Handleiding</FONT>
</center>
<HR size="1">
<h3>Spelprincipe</h3>
Iedere speler heeft een eigen dorp die hij steeds machtiger kan maken door zijn gebouwen te upgraden en zijn troepenmacht te vergroten. Bovendien kan je ook andere spelers klein maken door zijn troepen aan te vallen.</p>

<h3>Een Stad Creëren</h3>
Het allereerste wat je wilt doen is het creëren van je eigen nederzetting. Zonder een nederzetting geen gebouwen en troepen en dus geen macht. Een stad maak je door naar "De Map" te gaan in de navigatiebar. Eenmaal daar kan je een eigen grondgebied innemen door op een leeg vakje op de kaart te klikken en te bouwen. Nadat je je dorp hebt aangemaakt kan je hem niet verplaatsen of nieuwe dorpen aanmaken. Belangrijk is dat je een dorp nodig hebt om gebouwen te bouwen. Zonder een dorp is troepenverplaatsing onmogelijk.<p>

<h3>De Map</h3>
  <p>Op de kaart kun je je omgeving bekijken. Waar jou eigen stad ligt, waar andere steden van andere spelers liggen en waar creeps zijn.<br>Dit is allemaal aangegeven met verschillende kleuren.
 <TABLE border="0">
  <tr><td>o Groen</td>	<td>Dit is een leeg veld; je kunt er niets mee doen.</td>
  <tr><td>o Geel</td>   <td>De plaats van je eigen dorp.</td>
  <tr><td>o Rood</td>  	<td>Dit zijn de dorpen van andere spelers.</td>
  <tr><td>o Grijs</td> 	<td>Dit zijn de creeps; val deze wezens aan om grondstoffen te jatten uit hun gebied.</td>
 </TABLE><p>

<h3>Gebouwen</h3>
  In ieder dorp staan gebouwen en elk gebouw heeft zijn eigen functie. Het goed uitbouwen van alle gebouwen is van groot belang in elk dorp. In totaal zijn er 4 gebouwen die je in je dorp kunt bouwen. Dit zijn:<br />
  <TABLE border="0">
  <tr><td>o Hoofdgebouw</td>		
  <td>Vanuit dit gebouw kan je alle andere gebouwen  bouwen en uitbouwen.</td>
  <tr><td>o Barakken</td>   		<td>Met dit gebouw kan je eenheden maken voor de aanval of de verdediging.</td>
  <tr><td>o Verzamelplaats</td>  	<td>Geeft je troepen opdracht om een andere locatie aan te vallen of te verdedigen.</td>
  <tr><td>o Grondstoffenmijn</td> 	<td>Dit gebouw produceert grondstoffen. Hoe hoger het level, hoe meer per uur.</td>
  </TABLE>
  De kosten van een upgrade nemen bij elk level toe.</p>
  
<h3>Eenheden en gevechtssysteem</h3>
  <p>Eenheden worden geproduceerd in de barakken. Er zijn 3 verschillende soorten eenheden. Dit zijn: Speergozers, Booggozers en Paardgozers.<br>
    Bij een gevecht vind er een soort van steen-papier-schaar plaats. Speergozers zijn namelijk goed tegen Paardgozers. Paardgozers goed tegen Booggozers. En Booggozers goed tegen Speergozers. Bij een aanval tegen die bepaalde eenheden wordt de verdedigende en de aanvallende waarde verhoogd of verlaagd.</p><p>
</body>
</html>
