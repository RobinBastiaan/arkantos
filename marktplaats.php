<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<tr><td>

<HR size="1">
<center>
<FONT size="+3">Marktplaats</FONT>
</center>
<HR size="1">
<p>Met de marktplaats kun je je grondstoffen versturen naar andere spelers. Hoe groter je markt plaats, hoe meer grondstoffen je tegelijk kunt vervoeren.</p>

<form action="vprocc.php" method="get" target="_top">
<TABLE bgcolor="#FAF1D1" border="1">
<tr><td bgcolor="#F5DEB3" colspan=2><b>Grondstoffen versturen</b></td></tr>
<tr><td><p>Goud</td><td><input type="text" size="6" name="goud" />
  ( max. "maximale  verplaatsing t.o.v. beschikbaar" )</td></tr>
<tr><td><br>Hout</td><td><input type="text" size="6" name="hout" />
  ( max. "maximale  verplaatsing t.o.v. beschikbaar" )</td></tr>
</table>

<br><table border="1" width="40%">
 <tr><td bgcolor="#F5DEB3">Aan:</td>
 <td><input type="text" name="aan" /></td></tr>
 <tr><td bgcolor="#F5DEB3">Reden:</td>
 <td><textarea name="reden" cols="33" rows="3">Vul hier je reden in!</textarea></td></tr>
</table>

<p><input type="submit" name="Submit" value="Versturen" /></form></p>

</td></tr></table>
</body>
</html>
