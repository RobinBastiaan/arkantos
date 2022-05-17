<?
include("include/session.php");
if($session->logged_in){
header("Location: navilog.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="szn.css" />
</head>

<center>
<body bgcolor="#FAFAD9" >
<table bgcolor="#FAFAD9" width="70%" border="1">
  <tr>
    <th scope="col"><a href="homepage.html" target="main">Start</a></th>
    <th scope="col"><a href="about.php" target="main">Over ons spel</a></th>
    <th scope="col"><a href="register.php" target="main">Registreren</a></th>
    <th scope="col"><a href="main.php" target="main">Login</a></th>
    <th scope="col"><a href="nieuws.php" target="main">Nieuws</a></th>
    <th scope="col"><a href="handleiding.php" target="main">Handleiding</a></th>
    <th scope="col"><a href="../forum/" target="main">Forum</a></th>
  </tr>
</table>
</body>
</html>
