<?
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<head>
<title>Het Spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>
<body>

<CENTER>
<table border="1" width="70%">
<tr><td>

<?
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h1>Account Wijziging Gelukt!</h1>";
   echo "<p><b>$session->username</b>, je account is succesvol geupdated.";
   echo "<p><br>Terug naar [<a href=\"main.php\">Je Account</a>]<br>";
}
else{
?>

<?
/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if($session->logged_in){
?>

<h1>Account wijziging : <? echo $session->username; ?></h1>
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) gevonden</font></td>";
}
?>
<form action="process.php" method="get">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>Huidig Wachtwoord:</td>
<td><input type="password" name="curpass" maxlength="30" value="
<?echo $form->value("curpass"); ?>"></td>
<td><? echo $form->error("curpass"); ?></td>
</tr>
<tr>
<td>Nieuw Wachtwoord:</td>
<td><input type="password" name="newpass" maxlength="30" value="
<? echo $form->value("newpass"); ?>"></td>
<td><? echo $form->error("newpass"); ?></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input type="text" name="email" maxlength="50" value="
<?
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>">
</td>
<td><? echo $form->error("email"); ?></td>
</tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="subedit" value="1">
<input type="submit" value="Wijzig accountdetails"></td></tr>
<tr><td colspan="2" align="left"></td></tr>
</table>
</form>

<?
}
}

?>

</table>
</body>
</html>
