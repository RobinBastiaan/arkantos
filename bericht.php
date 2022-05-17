<?
include("include/session.php");
?>

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
<form action="berichtproc.php" method="get">

<HR size="1">
<center>
<FONT size="+3">Bericht versturen</FONT>
</center>
<HR size="1">

 <p>
  Aan: <input name="aan" type="text" />
 </p>
 <p>Bericht:
  <textarea name="bericht" cols="153" rows="8"></textarea>
   <input name="Submit" type="submit" value="Verstuur" />
 </p>
</form>

</td></tr></TABLE></body>
</html>
