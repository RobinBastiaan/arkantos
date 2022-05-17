<?
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");
?>

<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>
<body>


<table border="1" width="70%" align="center">
<tr><td>

<?
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registreerd</h1>";
   echo "<p>Sorry <b>$session->username</b>, maar je bent al geregistreerd. "
       ."<a href=\"main.php\">Main</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<h1>Registreerd!</h1>";
      echo "<p>Dank je <b>".$_SESSION['reguname']."</b>, jou informatie is bij de database geplaatst, "
          ."je kan nu <a href=\"main.php\">inloggen</a>.</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registratie gefaald</h1>";
      echo "<p>Sorry, maar een fout is opgetreden bij de registratie van je gebruikersnaam <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Probeer het op een later tijdstip nog een keer.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
echo"<HR size=\"1\">";
 echo"<center>";
   echo "<FONT size=\"+3\">Registreren</FONT>";
 echo"</center>";
echo"<HR size=\"1\">";

?>

Vul alle velden in en klik vervolgens op "Speel mee!"
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) gevonden</font></td>";
}
?>
<form action="process.php" method="get">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Gebruikersnaam:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
<tr><td>Wachtwoord:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td>E-mail:</td><td><input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>"></td><td><? echo $form->error("email"); ?></td></tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="subjoin" value="1">
<input type="submit" value="Speel mee!"></td></tr>
<tr></tr>
</table>
</form>

<?
}
?>

</body>
</html>
