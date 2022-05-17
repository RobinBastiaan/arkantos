<?
//hier ben je ingelogd, dit is dus de homepage
include("include/session.php");
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
if(!$session->magmeedoen()){
   header("Location: process.php");
}
if(!$session->logged_in){
?>
<script language="javascript">
top.location="index.php"
</script>
<?
}
if($session->logged_in){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Spel zonder naam</title>
<link rel="stylesheet" type="text/css" href="szn.css" />
<link rel="shortcut icon" href="plaatjes/favicon.ICO" type="image/x-icon" />
</head>
<body>
<table bgcolor="#FAF1D1" border="1" width="70%" align="center">
<tr><td>
<hr size="1" />
<center> <? if($geluid){ echo"<embed src=\"muziek/klik.wav\" hidden=\"true\" autostart=\"true\" loop=\"false\">"; } ?>
<font size="+3">Start</font>
</center>
<hr size="1" />
<? echo "Welkom <b>$session->username</b><p>" ; ?>
<br>Je bent nu ingelogd...
<br>Wat doe je hier nog? Ga iets nuttigs doen!<p>
</p></td></tr></table>
</body>
</html>
<? } ?>