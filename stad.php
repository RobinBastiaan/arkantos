<?
include("include/session.php");

$result = mysql_query("SELECT steden FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$steden = $row['steden'];
if ($steden != 0){

$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];

$uname = $session->username;
if(!$session->magmeedoen()){
   header("Location: main.php");
}
$result = mysql_query("SELECT x, y FROM map WHERE van = '$session->username'");
$row = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT stadnaam, barakken, hoofdgebouw, inkomenlvl, houtlvl, marktplaats FROM users WHERE username = '$session->username'");
$row2 = mysql_fetch_assoc($result2);
$x = $row['x'];
$y = $row['y'];
$stadnaam = $row2['stadnaam'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>De stad</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Spel zonder naam</title>
<link rel="stylesheet" type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>

<HR size="1">
<center>
<FONT size="+3">Je Stad</FONT>
</center>
<HR size="1">

<b>Naam dorp:</b>	<? echo"$stadnaam"?><br>
<b>Coördinaten:</b>	"<? echo"$x - $y" ?>"<p>


<TABLE bgcolor="#FAF1D1" border="1" width="40%" >
<tr><td rowspan=15></td>
<td bgcolor="#F5DEB3"><B>Gebouwen:</B></td></tr>
<tr><td><a href="bouwen.php" target="main">Hoofdgebouw</a> (level <? echo $row2['hoofdgebouw']; ?>)</td></tr>
<td bgcolor="#F5DEB3"><B>Economie:</B></td></tr>
<tr><td><a href="marktplaats.php" target="main">Marktplaats</a> (level <? echo $row2['marktplaats']; ?>)</td></tr>
<tr><td><a href="houthakkerij.php" target="main">Houthakkerij</a> (level <? echo $row2['houtlvl']; ?>)</td></tr>
<tr><td><a href="grondstoffenmijn.php" target="main">Mijn</a> (level <? echo $row2['inkomenlvl']; ?>)</td></tr>
<tr><td><a href="opslagplaats.php" target="main">Opslagplaats</a> (level 1)</td></tr>
<td bgcolor="#F5DEB3"><B>Eenheden:</B></td></tr>
<tr><td><a href="verzamelplaats.php" target="main">Verzamelplaats</a> (level 1)</td></tr>
<tr><td><a href="barakken.php" target="main">Barakken</a> (level <? echo $row2['barakken']; ?>)</td></tr>
<td bgcolor="#F5DEB3"><B>Heroes:</B></td></tr>
<tr><td><a href="heroes overzicht.php" target="main">Heroes overzicht</a> (level <? echo $row2['']; ?>)</td></tr>
<tr><td><a href="smid.php" target="main">Smid</a> (level <? echo $row2['']; ?>)</td></tr>
<tr><td><a href="vaardigheidtrainer.php" target="main">Vaardigheidtrainer</a> (level <? echo $row2['']; ?>)</td></tr>
<tr><td><a href="skilltrainer.php" target="main">Skilltrainer</a> (level <? echo $row2['']; ?>)</td></tr>
</TABLE>

<p><table border="1" al align="center" width="98%">
 <tr><td bgcolor="#F5DEB3">Aankomst</td><td bgcolor="#F5DEB3">Missie</td><td bgcolor="#F5DEB3">Herkomst</td><td bgcolor="#F5DEB3">Doel</td><td bgcolor="#F5DEB3">Hoeveel</tr>
 <tr><td>00:00:00</td><td>Aanval/Ondersteuning</td><td>Welke stad</td><td>Welke stad</td><td>speer/boog/paard/onbekend</td></tr>
</table>
<p>
<embed src="szngevecht.wav" hidden="true" autostart="true" loop="false">
</td></tr></table>
<? } 

else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>De stad</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Spel zonder naam</title>
<link rel="stylesheet" type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>

<HR size="1">
<center>
<FONT size="+3">Je Stad</FONT>
</center>
<HR size="1">

Je hebt nog geen locatie gekozen om je eerste stad te bouwen!<br />
Doe dit bij "Toon map" en klik vervolgens op 1 van de vakjes om daar een stad te bouwen.<br />
Zolang je nog geen locatie hebt kan je niets maken, bouwen of versturen.<br />

</body>
</html>
<? } ?>