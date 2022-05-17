<?
include("include/session.php");
$result = mysql_query("SELECT geluid FROM users WHERE username = '$session->username'");
$row = mysql_fetch_assoc($result);
$geluid = $row['geluid'];
?>

<html>
<head><? if($geluid){  echo"<embed src=\"muziek/klik.wav\" hidden=\"true\">"; } ?>
<title>Spel zonder Naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>

<CENTER>
<table border="1" width="70%">
<tr><td>

<?
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
echo"<center>";
echo"<HR size=\"1\">";
   echo "<FONT size=\"+3\">Je Account</FONT>";
echo"<HR size=\"1\">";
   echo "Welkom <b>$session->username</b>, je bent ingelogd. <br><br>"
       ."[<a href=\"userinfo.php?user=$session->username\">Mijn account</a>] &nbsp;&nbsp;"
       ."[<a href=\"useredit.php\">Wijzig accountdetails</a>] &nbsp;&nbsp;";
   if($session->isMaker()){
      echo "[<a href=\"admin/admin.php\">Admin Centrum</a>] &nbsp;&nbsp;";
   } 
   echo "[<a href=\"process.php\">Log uit</a>]";
}
else{
?>

<?
echo "<center>";
echo "<HR size=\"1\">";
   echo "<FONT size=\"+3\">Login</FONT>";
echo "<HR size=\"1\">";
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." fout(en) gevonden</font>";
}
?>
</center>Voer je naam en wachtwoord in om in te loggen:<center>
<form action="process.php" method="get">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr>
  <td>Gebruikersnaam:</td>
  <td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
<tr>
  <td>Wachtwoord:</td>
  <td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
<font size="2">Log me automatisch in  &nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login"></td></tr>
<tr><td colspan="2" align="left"><br>
  <font size="2">[<a href="register.php">Nog geen account??</a>]</font>
  <font size="2">[<a href="forgotpass.php">Wachtwoord vergeten??</a>]</font></td>

  <td align="right"></td></tr>
</table>
</form>

<?
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
echo "</td></tr><tr><td align=\"center\"><br><br>";
echo "<b>Leden Totaal:</b> ".$database->getNumMembers()."<br>";
echo "Er zijn $database->num_active_users geregistreerde leden en ";
echo "$database->num_active_guests gasten die deze site bekijken.<br><br>";

include("include/view_active.php");

?>


</table>

</body>
</html>
