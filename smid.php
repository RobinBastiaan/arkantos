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
<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<td>
<HR size="1">
<center>
<FONT size="+3">Smid</FONT>
</center>
<HR size="1">
<p>Koop hier je wapens en armour om de aanvals waarde van je heroes te verbeteren.</p>

<TABLE bgcolor="#FAF1D1" border="1">
<tr><td colspan=2 bgcolor="#F5DEB3">Wapens</td><td colspan=2 bgcolor="#F5DEB3">Armour</td></tr>
<tr><td>Plaatje</td><td>schade</td><td>Plaatje</td><td>verdediging</td></tr>
</TABLE>

</td></TABLE><p></p></body>
</html>
<?
}
?>