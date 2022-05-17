<?
include("include/session.php");
$aan = $_GET["aan"];
$goud= $_GET["goud"];
$hout= $_GET["hout"];
$reden= $_GET["reden"];
$van = $session->username;
$hout = ($hout*1);
$goud = ($goud*1);
if($hout < 0){
$hout = $hout*-1;
}
if($goud < 0){
$goud = $goud*-1;
}

$hout = ($hout*1);
$goud = ($goud*1);
$hout = round($hout, 0);
$goud = round($goud, 0);
mysql_query("UPDATE users SET grondstoffen = grondstoffen - $goud WHERE username = '$session->username' ");
mysql_query("UPDATE users SET grondstoffen = grondstoffen + $goud WHERE username = '$aan' ");
mysql_query("UPDATE users SET hout = hout - $hout WHERE username = '$session->username' ");
mysql_query("UPDATE users SET hout = hout + $hout WHERE username = '$aan'  ");
echo"
<html>
<head>
<link rel=\"stylesheet\" 
type=\"text/css\" href=\"szn.css\" />
</head>
<body>
";
echo"Je verstuurde aan $aan $goud goud en $hout hout ";
 mysql_query("INSERT INTO msg (aan, bericht, van, datum) 
      VALUES ('$aan', 'De handelaren van $session->username zijn je land binnengelopen, je bent $goud goud en $hout hout rijker. de reden was: $reden', 'auto-send',      CURDATE())");
echo"</body>
</html>
";
?>