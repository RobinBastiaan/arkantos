<?
include("include/session.php");
$uname = $session->username;
if($session->logged_in){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Het spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>
<body>
<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<td>
<HR size="1">
<center>
<FONT size="+3">Skill Trainer</FONT>
</center>
<HR size="1">
<p>Welkom, hier kan je heroes voorzien van de machtigste skills. Hoe hoger het level van de skilltrainer, hoe hoger je de skills kan upgaden. Hoe hoger het level van je hero, hoe hoger je een skill kan equipen.</p>

<TABLE bgcolor="#FAF1D1" border="1">
<tr><td bgcolor="#F5DEB3">Equipen van Skills</td>

</tr></TABLE>

</td></TABLE><p></p></body>
</html>
<?
}
?>