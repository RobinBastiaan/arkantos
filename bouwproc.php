<?

include("include/session.php");

$upgrade = mysql_real_escape_string($_POST["upgrade"]);
$zooiding = $upgrade;
$result = mysql_query("SELECT kosten, vertaling, hout FROM units WHERE naam = '$upgrade'");
$row = mysql_fetch_assoc($result);
$vertaling = $row['vertaling'];
$kosten = $row['kosten'];
$hout = $row['hout'];

$result = mysql_query("SELECT grondstoffen, hout FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$houtz = $row['hout'];
$grondstoffen = $row['grondstoffen'];

if($grondstoffen >= $kosten && $houtz >= $hout){
mysql_query("UPDATE users SET $vertaling=$vertaling+1, grondstoffen=grondstoffen-$kosten, hout=hout-$hout WHERE username = '$session->username'");
}
header("Location: bouwen.php ");
?>