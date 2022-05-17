<?
include("include/session.php");
$uname = $session->username;
if($session->logged_in){
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
?>

<!DOCvan html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
<meta http-equiv="Content-van" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript"><!--//
function Venster(URL) {
venster = window.open(URL, 'popupvenster', 'width=220, height=250, resizable=no, menubar=no, scrollbars=no, status=no, toolbar=no');
}
//--></SCRIPT>
</head>
<body>

<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>
<? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<HR size="1">
<center>
<FONT size="+3">De map</FONT>
</center>
<HR size="1">

<?
 echo "Welkom $uname. Je komt hier vast voor wat strategische informatie over je buren, niet waar?<P>";

$result2 = mysql_query("SELECT timer FROM users WHERE username = '$session->username'");
$row2 = mysql_fetch_assoc($result2);
$timer = $row2[timer];
 if($timer != 0){
 echo "LET OP! Pas over $timer minuten zijn je troepen terug en kan je een nieuwe aanval doen.<p>"; }

   //Displaymap();
global $database;
$q = "SELECT x,y,type,van FROM map ORDER BY y ASC,x";
$result = $database->query($q);
   /* Error occurred, return given name by default */
$num_rows = mysql_numrows($result);
 if(!$result || ($num_rows < 0)){
  echo "Error displaying info";
   return;
    }
 if($num_rows == 0){
  echo "Database table empty";
   return;
    }
   /* Display table contents */
echo "<table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";

   //echo "<tr><td><b>x</b></td><td><b>y</b></td><td><b>soort</b></td><td><b>van wie</b></tr>\n";
   //$number = 0;
  
 for($i=0; $i<$num_rows; $i++){
   $x  = mysql_result($result,$i,"x");
   $y  = mysql_result($result,$i,"y");
   $type  = mysql_result($result,$i,"type");
   $van   = mysql_result($result,$i,"van");

     //echo"$uname";
     //if($van ==  $uname || $van2 == $uname)
	 //{
 
  if($van ==  $uname){
 echo "<td><a ONCLICK=\"Venster('plek.php?x=$x&y=$y');return false;\" TARGET=\"_blank\" TITLE=\"dit is jouw stad\"><img src=\"plaatjes/bezet.GIF\"></td> \n" ; }
  if($van ==  neutraal){
 echo"<td><a ONCLICK=\"Venster('plek.php?x=$x&y=$y');return false;\" TARGET=\"_blank\" TITLE=\"Dit is een neutraal gebied\"><img src=\"plaatjes/vrij.GIF\"></td> \n";}
  if($van !=  neutraal && $van != $uname){
 echo"<td><a ONCLICK=\"Venster('plek.php?x=$x&y=$y');return false;\" TARGET=\"_blank\" TITLE=\"Dit is het gebied van $van\"><img src=\"plaatjes/vijand.GIF\"></td> \n";}
  echo"</a> \n";
    $number = $number + 1;
  if($number == 10){
 echo "</tr>\n<tr>";
    $number = 0;
   }
   }
 echo "</table><br>\n";
?>
</td></tr></TABLE>

</body>
</html>
<?
}
?>