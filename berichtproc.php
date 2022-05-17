<?
include("include/session.php");
$aan = mysql_real_escape_string($_GET["aan"]);
$bericht = mysql_real_escape_string($_GET["bericht"]);
$van = $session->username;
$bericht = nl2br($bericht);
$bericht = str_replace("\r\n", "", $bericht); 
$bericht = str_replace("\n", "", $bericht); 
mysql_query("INSERT INTO msg (aan, bericht, van, datum) VALUES ('$aan', '$bericht', '$van', CURDATE())");
echo"<html>
<head>
<link rel=\"stylesheet\" 
type=\"text/css\" href=\"szn.css\" />
</head>
<body>";

echo"<TABLE bgcolor=\"#FAF1D1\" border=\"1\" width=\"70%\" align=\"center\"><tr><td>";
echo"Je verstuurde aan $aan het volgende bericht: <br> $bericht";
echo"</td></tr></TABLE>";

echo"</body></html>";
?>