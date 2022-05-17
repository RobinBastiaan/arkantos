<?
include("../include/session.php");
$resgrond= $_POST["resgrond"];
$reshout= $_POST["reshout"];
$resboog= $_POST["resboog"];
$respaard= $_POST["respaard"];
$resspeer= $_POST["resspeer"];
$hoofd= $_POST["hoofdgebouw"];
$bar= $_POST["barakken"];
$markt= $_POST["marktplaats"];
$hout= $_POST["houtlvl"];
$reslvl= $_POST["reslvl"];

mysql_query("UPDATE users SET grondstoffen=$resgrond");
mysql_query("UPDATE users SET hout=$reshout");
mysql_query("UPDATE users SET booggozers=$resboog");
mysql_query("UPDATE users SET speergozers=$resspeer");
mysql_query("UPDATE users SET paardgozers=$respaard");
mysql_query("UPDATE users SET hoofdgebouw=$hoofd");
mysql_query("UPDATE users SET Barakken=$bar");
mysql_query("UPDATE users SET marktplaats=$markt");
mysql_query("UPDATE users SET houtlvl=$hout");
mysql_query("UPDATE users SET inkomenlvl=$reslvl");  /* where username !='dmystic' AND username !='robin' */

//mysql_query("UPDATE users SET grondstoffen=$resgrond AND booggozers=$resboog AND paardgozers=$respaard AND speergozers = $resspeer AND inkomenlvl=$reslvl And Barakken=$bar")

echo"
<html>
<head>
<link rel=\"stylesheet\" 
type=\"text/css\" href=\"../szn.css\" />
</head>
<body>";
echo"<TABLE bgcolor=\"#FAF1D1\" border=\"1\" width=\"70%\" align=\"center\"><tr><td>";

echo"<b>Het resetten was succesvol!</b> <br> Iedere speler heeft nu de door jou ingevulde waarden.";
echo"<p>Je kan nu weer terug keren naar <a href=\"admin.php\">\"Admin Centrum\"</a>.";

echo "</td></tr></TABLE>";
echo"</body>";
echo"</html>";
?>