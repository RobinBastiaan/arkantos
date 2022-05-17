<?
include("include/session.php");
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><? if($geluid){ echo" <embed src=\"muziek/klik.wav\" hidden=\"true\"> "; } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<table bgcolor="#FAF1D1" border="1" width="70%"  align="CENTER">
<tr><td>
<hr size="1" />
<CENTER>
<font size="+3">Over ons spel</font>
</CENTER>
<hr size="1" />
  Ons  spel is een spel van strijden en verovering. <br />
  Je  begint met een paar grondstoffen en je kan eindigen<br />
  &nbsp;als een machtig rijk die zijn omgeving volledig  domineert.<br />
  Maak gebruik van je zelf getrainde helden en gebruik ze <br />
  &nbsp;om je economie te boosten en ze vijanden te verpletteren.<br />
  Of je nou angst aanjaagt bij je vijanden of veel nieuwe<br />
  &nbsp;vrienden en  bondgenoten maakt, ligt helemaal aan jou!</p>
<p>Ons spel blijft altijd voor verbetering vatbaar dus heb je  suggesties of aanmerkingen, voel je dan vrij om op het forum iets te posten.</p>
<hr size="1" />
<CENTER>
<font size="+3">De makers</font>
</CENTER>
<hr size="1" />
<p>Dit spel is gemaakt door een aantal vrienden die het leuk vinden on een spel te maken en te spelen met elkaar.<br />Ons doel is dan ook om plezier te maken tijdens het maken &egrave;n tijdens het spelen. <br />Hieronder staan de makers van het spel zonder naam.</p>
<p> Dennis             - zo'n beetje alles met database en code<br />
  Robin                - zo'n beetje de rest (code, teksten, layout, het forum mooi maken etc.)<br />
  Sem              -  Design verprutser, niksdoener, archief dat niet bestaat bijhouder, nieuwsbrief niet maken<br />    <? /*designer/ nieuws/archief bijhouder/nieuwsbrief maker <br />*/ ?>
  Christian         - idee&euml;n brainstormer<br /></p>

</td></tr></table>
</body>
</html>
