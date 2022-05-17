<?
$begin = "http:/";
include("include/session.php");
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];


$yoursite = "$begin/dmystic.frihost.net/spel/bouwen.php"; //Your site url without http://
$referer = $_SERVER['HTTP_REFERER'];
//echo "ref is $referer en die andere is $yoursite"
$result = mysql_query("SELECT  stadnaam FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$stadnaam = $row['stadnaam'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>
<?
//Check if browser sends referrer url or not
if ($referer == "") { //If not, set referrer as your domain
/*
echo "<script language=\"javascript\">\n";
echo "parent.frames['stat'].location.reload()\n";
echo "</script>\n";
*/
echo"<body onLoad=\"parent.stat.location.href='status.php';\">";
} 
else {
$domain = parse_url($referer); //If yes, parse referrer
}

if($referer == $yoursite ) {
/*
echo "<script language=\"javascript\">\n";
echo "parent.frames['stat'].location.reload()\n";
echo "</script>\n";
*/
echo"<body onLoad=\"parent.stat.location.href='status.php';\">";
}
else{
echo"<body>";
}
?>

<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center"><tr><td>

<?
	$connectie = mysql_connect($server,$gebruiker,$wachtwoord) 
   or trigger_error("Kon niet connecteren met de server");

mysql_select_db($db,$connectie) 
   or trigger_error("Kon de database niet selecteren"); 
   $id= $_GET["id"];
	
	$result = mysql_query("SELECT Inkomenlvl, Barakken, hoofdgebouw, houtlvl, marktplaats, steden FROM users WHERE username = '$session->username'");
	$row = mysql_fetch_assoc($result);
	$result2 = mysql_query("SELECT kosten, hout FROM units WHERE naam = 'hoofdgebouw'");
	$row2 = mysql_fetch_assoc($result2);
	$result3 = mysql_query("SELECT kosten, hout FROM units WHERE naam = 'inkomengebouw'");
	$row3 = mysql_fetch_assoc($result3);
	$result4 = mysql_query("SELECT kosten, hout FROM units WHERE naam = 'barakken'");
	$row4 = mysql_fetch_assoc($result4);	
	$result5 = mysql_query("SELECT kosten, hout FROM units WHERE naam = 'marktplaats'");
	$row5 = mysql_fetch_assoc($result5);	
	$result6 = mysql_query("SELECT kosten, hout FROM units WHERE naam = 'houthakkerij'");
	$row6 = mysql_fetch_assoc($result6);
$hgbw = $row['hoofdgebouw'];
$Glvl = $row['Inkomenlvl'];
$blvl = $row['Barakken'];
$mlvl = $row['marktplaats'];
$hlvl = $row['houtlvl'];
$phfd = $row2['kosten'];
$phfdh = $row2['hout'];
$pgrnd = $row3['kosten'];
$pgrndh = $row3['hout'];
$pbar = $row4['kosten'];
$pbarh = $row4['hout'];
$mbar = $row5['kosten'];
$mbarh = $row5['hout'];
$hbar = $row6['kosten'];
$hbarh = $row6['hout'];
$steden = $row['steden'];

if($steden == 0){ echo"<br> Je moet eerst een stad hebben voodat je iets kan bouwen."; }

else{
?> 

<h3>Hoofdgebouw (level <? echo"$hgbw";?>)</h3>
In het hoofdgebouw kunnen nieuwe gebouwen worden opgericht<br>
 of bestaande gebouwen worden verbeterd.
 
<p><table width="98%" border="1" align="center">
  <tr>
    <td bgcolor="#F5DEB3"><b>Gebouw</b></td>
    <td bgcolor="#F5DEB3"><b>level</b></td>
    <td bgcolor="#F5DEB3"><b>Kosten</b></td>
	<td bgcolor="#F5DEB3"><b>Bouwtijd</b></td>
	<td bgcolor="#F5DEB3"><b>Upgrade</b></td>
  </tr>
  <tr>
    <td>Hoofdgebouw</td>
	<td><? echo"$hgbw"; ?></td>
	<td><? echo"$phfd"; ?> G, en <? echo "$phfdh"; ?> H</td>
	<td>0:00:00</td>
	<td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="hoofdgebouw" />
        <input name="click" type="submit" value="Hoofdgebouw" />
        </form></td>
  </tr>
  <td bgcolor="#F5DEB3" colspan=6><B>Economie:</B></td></tr>
    <tr>
    <td>Opslagplaats</td>
    <td>1</td>
	<td colspan=4 align=center>Maximale upgade-level bereikt</td>
  </tr>
  <tr>
    <td>Houthakkerij</td>
    <td><? echo"$hlvl"; ?></td>
	<td><? echo"$hbar"; ?> G, en <? echo "$hbarh"; ?> H</td>
    <td>0:00:00</td>
    <td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="Houthakkerij" />
        <input name="click" type="submit" value="Houthakkerij" />
        </form></td>
  </tr>

  <tr>
    <td>Mijn</td>
    <td><? echo "$Glvl"; ?></td>
	<td><? echo"$pgrnd"; ?> G, en <? echo "$pgrndh"; ?> H</td>
    <td>0:00:00</td>
    <td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="inkomengebouw" />
        <input name="click" type="submit" value="Mijn" />
    </form></td>
  </tr>
    <tr>
    <td>Marktplaats</td>
    <td><? echo"$mlvl"; ?></td>
	<td><? echo"$mbar"; ?> G, en <? echo "$mbarh"; ?> H</td>
    <td>0:00:00</td>
    <td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="Marktplaats" />
        <input name="click" type="submit" value="Marktplaats" />
        </form></td>
  </tr>
  <td bgcolor="#F5DEB3" colspan=6><B>Eenheden:</B></td></tr>
  <tr>
    <td>Barakken</td>
    <td><? echo"$blvl"; ?></td>
	<td><? echo"$pbar"; ?> G, en <? echo "$pbarh"; ?> H</td>
    <td>0:00:00</td>
    <td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="barakken" />
        <input name="click" type="submit" value="Barakken" />
        </form></td>
  </tr>
  <tr>
    <td>Verzamelplaats</td>
    <td>1</td>
	<td colspan=4 align=center>Maximale upgade-level bereikt</td>
  </tr>
  <td bgcolor="#F5DEB3" colspan=6><B>Heroes:</B></td></tr>
  <tr>
    <td>Smid</td>
	<td><? echo"$"; ?></td>
	<td><? echo"$"; ?> G, en <? echo "$"; ?> H</td>
	<td>0:00:00</td>
	<td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="smid" />
        <input name="click" type="submit" value="Smid" />
        </form></td>
  </tr>
  <tr>
    <td>Vaardigheidtrainer</td>
	<td><? echo"$"; ?></td>
	<td><? echo"$"; ?> G, en <? echo "$"; ?> H</td>
	<td>0:00:00</td>
	<td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="vaardigheidtrainer" />
        <input name="click" type="submit" value="Vaardigheidtrainer" />
        </form></td>
  </tr>
    <tr>
    <td>Skilltrainer</td>
	<td><? echo"$"; ?></td>
	<td><? echo"$"; ?> G, en <? echo "$"; ?> H</td>
	<td>0:00:00</td>
	<td><form id="form1" name="form1" method="post" action="bouwproc.php">
        <input name="upgrade" type="hidden" value="skilltrainer" />
        <input name="click" type="submit" value="Skilltrainer" />
        </form></td>
  </tr>
</table>


 <form action="naamaanpas.php" method="get">

<p> <table width="25%" border="1" align="center"><tr><td bgcolor="#F5DEB3"><b>Verander de naam van je stad:</b></td></tr>
   <tr><td><input name="naam" type="text" value="<? echo"$stadnaam"?>" ></td></tr>
   <tr><td><input name="" type="submit" value="Verander!" /></td></tr>
</form>
</table>
<p>

</td></tr></table>
</body>
</html>
<? } ?>