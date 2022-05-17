<?
include("include/session.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="refresh" content="180; url=status.php">
<title>Spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<?
$result = mysql_query("SELECT grondstoffen, hout, speergozers, booggozers, paardgozers, Inkomenlvl, houtlvl FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$grond = $row['grondstoffen'];
$hout = $row['hout'];
$speer = $row['speergozers'];
$boog = $row['booggozers'];
$paard = $row['paardgozers'];
$ilvl = $row['Inkomenlvl'];
$houtlvl = $row['houtlvl'];
$gstof = $ilvl * 1;
?>

<?
echo "<table align=\"center\" border=\"1\" width=\"70%\" ";
echo "<tr><td bgcolor=\"#F5DEB3\"><img src=\"plaatjes/goud.GIF\" align=\"middle\"><b>Goud</b></td><td bgcolor=\"#F5DEB3\"><img src=\"plaatjes/hout.GIF\" align=\"middle\"><b>Hout</b></td><td bgcolor=\"#F5DEB3\"><b>Speergozers</b></td><td bgcolor=\"#F5DEB3\"><b>Booggozers</b></td><td bgcolor=\"#F5DEB3\"><b>Paardgozers</b></td><td bgcolor=\"#F5DEB3\"><b><img src=\"plaatjes/goud.GIF\" align=\"middle\">Goud per minuut</b></td><td bgcolor=\"#F5DEB3\"><img src=\"plaatjes/hout.GIF\" align=\"middle\"><b>Hout per minuut</b></td></tr>";
echo "<tr><td>$grond</td><td>$hout</td><td>$speer</td><td>$boog</td><td>$paard</td><td>$ilvl</td><td>$houtlvl</td></tr>";
?>
</body>
</html>
