<?
include("include/session.php");
$result = mysql_query("SELECT houtlvl FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$prodlvl = $row['houtlvl'];
$prodnext = $prodlvl + 1;
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
<FONT size="+3">Houthakkerij</FONT>
</center>
<HR size="1">
De houthakkerij zorgt voor de productie van hout, dat je zowel voor het bouwen van je nederzetting als voor de bewapening van je leger nodig hebt. Hoe hoger het level van je houthakkerij, hoe sneller het hout wordt gekapt.

<p><table border="1" width="40%"><tr>
  <td>Huidige productielvl:</td>            
  <td><? echo"$prodlvl"; ?> hout per minuut </td>
</tr>
<tr><td>Productie bij level <? echo "$prodnext"; ?>: </td> 
<td> <? echo "$prodnext"; ?>   hout per minuut </td>
</tr></table><p>


</td></TABLE></body>
</html>
