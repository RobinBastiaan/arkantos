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
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>

<?

  $x= $_GET["x"];
  $y= $_GET["y"];
  $goud= $_GET["grondstoffen"];
  $goud= $_GET["hout"];
    
$result = mysql_query("SELECT van FROM map WHERE x = $x AND y = $y");
$row = mysql_fetch_assoc($result);
$van = $row[van];

if($van == neutraal){
echo "<HR size=\"1\">";
echo "<center>";
echo "<FONT size=\"+3\">Versturen Mislukt</FONT>";
echo "</center>";
echo "<HR size=\"1\">";
echo"Je kan geen grondstoffen naar neutrale gebieden sturen.<p>"; }

if($van == $session->username){
echo "<HR size=\"1\">";
echo "<center>";
echo "<FONT size=\"+3\">Versturen Mislukt</FONT>";
echo "</center>";
echo "<HR size=\"1\">";
echo"Je kan geen grondstoffen naar jezelf sturen.<p>"; }
//1e if


 if($van != neutraal && $van != $session->username){
  $result2 = mysql_query("SELECT grondstoffen, username, hout FROM users WHERE username = '$session->username'");
  $row2 = mysql_fetch_assoc($result2);
  $eigengoud = $row2[grondstoffen];
  $eigenhout = $row2[hout];
  if($grondstoffen > 0 || $hout > 0){
  $eigengoud = $goud;
  $eigenhout = $hout; }
 
  $result3 = mysql_query("SELECT grondstoffen, username, hout FROM users WHERE username = '$van'");
  $row3 = mysql_fetch_assoc($result3);
  $vijandiggoud = $row3[grondstoffen];
  $vijandighout = $row3[hout];
  if($grondstoffen > 0 || $hout > 0){
  $vijandiggoud = $goud;
  $vijandighout = $hout; }

  $result1 = mysql_query("SELECT timer2 FROM users WHERE username = '$session->username'");
  $row1 = mysql_fetch_assoc($result1);
  $timer = $row1['timer2'];
  
   if($timer != 0){
    echo "<HR size=\"1\">";
    echo "<center>";
    echo "<FONT size=\"+3\">Versturen Mislukt</FONT>";
    echo "</center>";
    echo "<HR size=\"1\">";
    echo"Je handelaaren zijn nog onderweg met het versturen van grondstoffen. Dit kan nog maximaal 5 minuten duren.<p>";
   }
   
   else{
    mysql_query("UPDATE users SET timer=5 WHERE username = '$session->username' ");

     if($eigengoud > $geefgoud){
	  echo "<HR size=\"1\">";
      echo "<center>";
      echo "<FONT size=\"+3\">Grondstoffen Verstuurd</FONT>";
      echo "</center>";
      echo "<HR size=\"1\">";
	  $geefgoud = $eigengoud;
	  $geefhout = $eigenhout;
      echo"Het versturen van grondstoffen is gelukt. Je hebt $geefgoud goud en $geefhout hout weggegeven.";
      mysql_query("INSERT INTO msg (aan, bericht, van, datum) 
      VALUES ('$van', 'De handelaren van $session->username zijn je land binnengelopen, je bent $geefgoud goud en $geefhout hout rijker.', 'auto-send',      CURDATE())");
      mysql_query("UPDATE users SET grondstoffen=grondstoffen-$geefgoud WHERE username = '$session->username' ");
      mysql_query("UPDATE users SET grondstoffen=grondstoffen+$geefgoud WHERE username = '$van' ");
	  mysql_query("UPDATE users SET hout=hout-$geefhout WHERE username = '$session->username' ");
      mysql_query("UPDATE users SET hout=hout+$geefhout WHERE username = '$van' ");
     }
   }
 }
?>

</td></tr></TABLE>
</body>
</html>