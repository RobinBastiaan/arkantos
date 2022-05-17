<?
/**
 * ForgotPass.php
 *
 * This page is for those users who have forgotten their
 * password and want to have a new password generated for
 * them and sent to the email address attached to their
 * account in the database. The new password is not
 * displayed on the website for security purposes.
 *
 * Note: If your server is not properly setup to send
 * mail, then this page is essentially useless and it
 * would be better to not even link to this page from
 * your website.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<head>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
<title>Spel zonder naam</title>
</head>

<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">

<?
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>New Password Generated</h1>";
      echo "<p>Your new password has been generated "
          ."and sent to the email <br>associated with your account. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>New Password Failure</h1>";
      echo "<p>There was an error sending you the "
          ."email with the new password,<br> so your password has not been changed. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<h1>Wachtwoord vergeten</h1>
Er zal een nieuw wachtwoord worden gegenereerd. Dit wachtwoord wordt verstuurd naar het email-adres<br>
bijbehorend bij je account. Alles wat je hoeft te doen is je gebruikersnaam in te vullen.<br><br>
<? echo $form->error("user"); ?>
<form action="process.php" method="get">
<b>Gebruikersnaam:</b> <input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>">
<input type="hidden" name="subforgot" value="1">
<input type="submit" value="Nieuw Wachtwoord">
</form>

<?
}
?>

</body>
</html>
