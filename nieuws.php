<?
include("include/session.php"); 
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
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
<td>
<HR size="1">
<center>
<FONT size="+3">Status van het spel</FONT>
</center>
<HR size="1">
Het spel zonder naam (SZN spelversie 1) nog onder constructie. De meeste belangrijke dingen, <br> zoals het inloggen, zijn al geregeld. Een aantal dingen dat nog geregeld moet worden zijn:<p>
  o Aanvalssysteem - mee bezig (onderscheid boog/speer/paard + eenheden dood gaan)<br />
  o Van het pop-up scherm weer naar je wegbrowser gaan bij de kaart<br />
  o Activerings-email instellen<br />
  o Bouwtijden van gebouwen<br />
  o Traintijden van eenheden
  <br />
  o Beginners bescherming van een aantal dagen <br />
  o Max. aantal troepen weergeven bij verzamelplaats<br />
  o Punten ranglijst<br />
  o Inactiviteits-email instellen<br />
  o Evt. Upgrades Eenheden<br />
  o Evt. Heroes<br />
</p>
<p>Omdat er nog een paar balangrijke onderdelen niet goed werken zijn we nog niet toe gekomen <br> aan het spelen van dit spel dmv een test-ronde. Deze ronde komt er wel zo snel mogelijk aan. <br>
Een closed betaronde komt al heel erg in het zicht!


<p>

<HR size="1">
<center>
<FONT size="+3">Updates</FONT>
</center>
<HR size="1">
Er worden regelmatig dingen verandert, verbeterd of ingevoerd. Wij houden niet alles exact bij, maar <br> willen je toch graag laten weten waar we nu mee bezig zijn. Niet denken dat er weinig gebeurt, er gebeurt zoveel <br> dat we geen zin/tijd hebben om het elke keer aan te passen, dus dit is ongeveer 5% van wat er in totaal gebeurt.

<p>28-09-2008<br />
  o Een archief aangemaakt op het forum om de "vele" updates kwijt te kunnen<br />
  o Het handelssysteem in werking gebracht (er zaten hier zoveel bugs in dat we alles hebben moeten resetten)<br />
  o Een resetknop gemaakt voor de nieuwste gebouwen<br />
  o De nieuwe plaatjes van goud en hout erop krijgen</p>

<p>21-10-2008<br />
  o Sem doet weer mee met szn en hij gaat plaatjes maken/desiginen<br />
  o Hout/goud plaatjes vervangen + mijn plaatje<br />
  o Links hebben een passerende kleur gekregen en zijn nu niet meer onderstreept</p>
  
<p>24-10-2008<br />
  o De grondstoffen verversen nu elke 60 sec automatisch, zodat je hem zelf niet hoef te vernieuwen<br />
  o Admincentrum vernieuwd<br />
  o Geluiden toegevoegd aan muziek-menu</p>
  
<p>27-11-2008<br />
  o De poll in elkaar zetten (hij doet het en er wordt gestemd)<br />
  o Een nieuwe webhosting gewonnen met domein naam (daar heeft veel tijd in gezeten, vandaar een maand later een nieuwe update)<br />
  o </p>


<p><p><b>Voor alle updates vòòr deze datum, kun je ons forum bezoeken! Kijk bij "Het Archief".</b>
<p>
</TABLE>

</body>
</html>
