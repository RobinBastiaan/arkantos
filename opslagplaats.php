<?
include("include/session.php");
$result = mysql_query("SELECT grondstoffen, hout FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$goud = $row['grondstoffen'];
$hout = $row['hout'];
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
<FONT size="+3">Opslagplaats</FONT>
</center>
<HR size="1">
<p>Om je goud en hout te beschermen tegen dieven en weersomstandigheden, is er de opslagplaats. Gelukkig is je opslagplaats oneindig groot dus wees niet ongerust dat er iets niet inpast.</p>

<TABLE bgcolor="#FAF1D1" border="1" width="40%" >
  <tr>
    <td bgcolor="#F5DEB3" colspan=2><B>Aantal grondstoffen:</B></td>
  </tr>
  <tr>
    <td>Goud</td>
	<td><? echo"$goud"; ?></td>
  </tr>
  <tr>
	<td>Hout</td>
	<td><? echo"$hout"; ?></td>
  </tr>
</TABLE><p>

</td></TABLE></body>
</html>
