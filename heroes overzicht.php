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
<FONT size="+3">Heroes Overzicht</FONT>
</center>
<HR size="1">
<p>Hier kan je de status van je hero(es) bekijken.</p>

<TABLE bgcolor="#FAF1D1" border="1">
<tr><td colspan=2 bgcolor="#F5DEB3">Hero</td><td bgcolor="#F5DEB3">Level</td><td bgcolor="#F5DEB3">Armous/Schade</td><td bgcolor="#F5DEB3">Geëquipte Skill</td></tr>
<tr><td>Plaatje hero</td><td>$naamhero</td><td>$hp<br />$lvl<br />$xp</td><td>$armour<br />$schade</td><td>$skill</td></tr>
</TABLE>
<p></p>
</td></TABLE></body>
</html>
<?
}
?>