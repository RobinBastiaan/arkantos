<?php
include("include/session.php");
$x = $_GET["x"];
$y = $_GET["y"];
if($session->logged_in){
?>

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Bekijk Gebied</title>
<? echo"<link rel=\"stylesheet\" 
type=\"text/css\" href=\"szn.css\" />";
?>
</head>

<body>
<?
$result = mysql_query("SELECT van, type FROM map WHERE x = $x AND y = $y");
$row = mysql_fetch_assoc($result);
$vanwie = $row['van'];
$type = $row['type'];

$result2 = mysql_query("SELECT stadnaam FROM users WHERE username ='$vanwie'");
$row2 = mysql_fetch_assoc($result2);
$stadnaam = $row2['stadnaam'];

$result3 = mysql_query("SELECT steden FROM users WHERE username ='$session->username'");
$row3 = mysql_fetch_assoc($result3);
$aantal = $row3['steden'];

echo"<table width=\"20%\" border=\"1\">
  <tr><td>
    Coördinaten:
    <td>$x - $y </td>
  </td></tr>

  <tr><td>
    Van:
    <td>$vanwie</td>
  </td></tr>

  <tr><td>
    Type:
    <td>$type</td>
  </td></tr>  ";
  
  
  
  if($vanwie != neutraal){
    echo"
  <tr><td>
    Naam van de stad:
    <td>$stadnaam</td>
  </td></tr>";
  }
  
  
	if($vanwie == neutraal){
	if($aantal == 0){
    echo"<tr><td>
	Wil je op deze plek een nieuw stad beginnen?
    <td><a href=\"pakstad.php?x=$x&y=$y\">Bouw hier je stad!</a></td>
   </td></tr>";
  }
  }
  if($vanwie != neutraal && $vanwie != $session->username){
  echo"<tr><td colspan = 2 >
    <form action=\"aproc.php\" method=\"get\" name=\"form1\"  id=\"form1\">
      <input name=\"x\" type=\"hidden\" value=\"$x\" />
      <input name=\"y\" type=\"hidden\" value=\"$y\" />
      <input name=\"Submit\" type=\"submit\" value=\"Verstuur snel troepen!\" />
    </form>
	<a href=\"verzamelplaats.php?x=$x&y=$y\">verstuur troepen</a>
	<form action=\"marktplaats.php\" method=\"get\" name=\"form2\"  id=\"form2\">
      <input name=\"x\" type=\"hidden\" value=\"$x\" />
      <input name=\"y\" type=\"hidden\" value=\"$y\" />
      <input name=\"Submit\" type=\"submit\" value=\"Verstuur grondstoffen!\" />
    </form></td></tr>";
  }
 echo" </td></tr></table> ";

?> 

</body>
</html>
<?
}
?>