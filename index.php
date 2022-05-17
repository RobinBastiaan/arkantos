<?
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Het spel zonder naam</title>
<link rel="shortcut icon" href="plaatjes/favicon.ICO" type="image/x-icon" />
</head>
<?
if($session->logged_in){
?>
<frameset rows="7%,12%,82%" cols="*" framespacing="0" frameborder="no" border="0">
  <frame name="navi" src="navilog.php" />
  <frame name="stat" src="status.php" />
  <frame name="main" src="homelog.php" />
</frameset>
<?
}
else{
?>
<frameset rows="7,93" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="navibar.php" name="navi" id="navi" />
  <frame src="homepage.html" name="main" id="main" />
</frameset>
<?
}
?>
<noframes><body>
</body>
</noframes></html>
<embed src="muziek/klik.wav" hidden="true" autostart="true" loop="false">