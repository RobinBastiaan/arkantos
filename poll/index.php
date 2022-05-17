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
<center>
<FONT size="+3">Welkom op de poll!</FONT>
</center>
<HR size="1">
<p>Breng hier je stem uit op de vragen die worden gesteld over het spel zonder naam. Klik op  <a href="../index.php" target="_parent">Deze Link</a> om ons spel te zien.</p>

<p>Als je nog niet hebt gestemd, moet je eerst stemmen om de tussenstand te zien. <br /> 
Andersom: Je ziet alleen de tussenstand als je al hebt gestemd. Echter, als je niet meer kan stemmen omdat een uitslag is gemaakt, kan je alleen de uitslag zien.</p>

<p>
 <b>Vraag Nr. 1</b><br />
 Bekijk eindstand: <a href="eindstand.php?vraag=1">Welke naam moet ons spel krijgen?</a>
 <br />- Tegen het einde van <i>vrijdag 5 december 2008</i> kon er niet meer gestemd worden op deze vraag.
 <br />- <? $ip = getenv('REMOTE_ADDR'); 
            $sql = "SELECT ip FROM poll where ip ='$ip'";
            $res = mysql_query($sql);
			if (mysql_num_rows($res) == 0) { echo"Je hebt niet deelgenomen aan deze poll."; }
            else{ echo"Je hebt deelgenomen aan deze poll."; }   ?>
 <br />- Gevolgen uislag: Het spel is "Arkantos" gaan heten.</p>

</TD></TR></TABLE>
</body>
</html>