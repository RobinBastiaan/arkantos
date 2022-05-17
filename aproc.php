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
<?

  $x= mysql_real_escape_string($_GET["x"]);
  $y= mysql_real_escape_string($_GET["y"]);
  $boog= mysql_real_escape_string($_GET["booggozer"]);
  $paard= mysql_real_escape_string($_GET["paardgozer"]);
  $speer= mysql_real_escape_string($_GET["speergozer"]);
    

$boog = round($boog, 0);
$paard = round($paard, 0);
$speer = round($speer, 0);


	
$result = mysql_query("SELECT van FROM map WHERE x = $x AND y = $y");
$row = mysql_fetch_assoc($result);

$van = $row[van];
if($van == false){
echo"Op de coördinaten is er geen gebied. De coördinaten zijn ongeldig. Je troepen trekken weer terug omdat ze niets interessants zien.";
}
if($van == neutraal)
echo"Je kan geen neutrale gebieden aanvallen!";
if($van == $session->username)
echo"Je kan jezelf niet aanvallen!";
//1e if
if($van != neutraal && $van != $session->username && $van != false){

$result2 = mysql_query("SELECT grondstoffen, username, speergozers, booggozers, paardgozers FROM users WHERE username = '$session->username'");
$row2 = mysql_fetch_assoc($result2);
$eigenleger = $row2['speergozers'] + $row2['booggozers'] + $row2['paardgozers'];
if($speer > 0 || $boog > 0 || $paard > 0){
$eigenleger = $speer + $boog + $paard;
}
$result3 = mysql_query("SELECT grondstoffen, username, speergozers, booggozers, paardgozers FROM users WHERE username = '$van'");
$row3 = mysql_fetch_assoc($result3);
$vijandig = $row3[speergozers] + $row3[booggozers] + $row3[paardgozers];
$geldv = $row3[grondstoffen];
//if($eigenleger > $vijandig){
//if statement
if($vijandig == 0 && $van != 0){
echo"De vijand heeft geen leger. Je troepen trekken weer terug omdat ze dit geen uitdaging vinden.";
}

else{
$result1 = mysql_query("SELECT timer FROM users WHERE username = '$session->username'");
$row1 = mysql_fetch_assoc($result1);
$timer = $row1['timer'];
if($timer != 0 && $session->username !=dmystic){
echo"Je kan nog niet aanvalllen, omdat je leger nog niet terug is van de vorige aanval.<br> Probeer het over maximaal 5 minuten nog eens.";
}
else
{
mysql_query("UPDATE users SET timer=5 WHERE username = '$session->username' ");
if($eigenleger > 10*$vijandig){
$balance = $eigenleger/$vijandig*10;
$balance = round($balance, 2);
$wingeld = $balance/1000*$geldv;
$wingeld = round($wingeld, 0);
$winleger = $balance/1000*$vijandig;
if($wingeld >= (0.2*$geldv)){
$wingeld = 0.2*$geldv;
$wingeld = round($wingeld, 0);
}
if(($geldv-$wingeld) < 0){
$gtot = ($geldv-$wingeld);
$wingeld = ($wingeld-$gtot);
$wingeld = round($wingeld, 0);
}
if($winleger >= 0.2*$vijandig){
$winleger = 0.2*$vijandig;
$winleger = round($winleger, 0);
}
if($vijandig-$winleger<0){
$ltot = ($vijandig-$winleger);
$winleger = ($winleger-$ltot);
}
echo"Je had zo een grote overmacht dat het vijandige leger er vandoor is gegaan. Je hebt $wingeld resources veroverd.";
mysql_query("INSERT INTO msg (aan, bericht, van, datum) 
VALUES ('$van', 'het leger van $session->username is je land binnengevallen, je bent $wingeld resources kwijtgeraakt, het leger van de tegenstander was zo groot, dat je leger gevlucht is, waardoor je niks kwijt bent geraakt', 'auto-send', CURDATE())");
mysql_query("UPDATE users SET grondstoffen=grondstoffen+$wingeld WHERE username = '$session->username' ");
mysql_query("UPDATE users SET grondstoffen=grondstoffen-$wingeld WHERE username = '$van' ");
}
elseif($vijandig > 10*$eigenleger){
echo"Je leger was zo klein dat het gevlucht is bij het zien van de vijand.";
}
else{

$balance = $eigenleger/$vijandig*10;
$balance = round($balance, 0);
$win = rand(0,($balance+10)); 
$wingeld = $balance/1000*$geldv;
$wingeld = round($wingeld, 0);
if($balance <= $win){
echo"je hebt het gevecht gewonnen, je won hiermee $wingeld resources";
mysql_query("INSERT INTO msg (aan, bericht, van, datum) 
VALUES ('$van', 'het leger van $session->username is je land binnengevallen, je bent $wingeld resources kwijtgeraakt', 'auto-send', CURDATE())");
mysql_query("UPDATE users SET grondstoffen=grondstoffen+$wingeld WHERE username = '$session->username' ");
mysql_query("UPDATE users SET grondstoffen=grondstoffen-$wingeld WHERE username = '$van' ");
}
else{
echo"je hebt de aanval verloren";
}
}
}

}

}
?>
</body>
</html>