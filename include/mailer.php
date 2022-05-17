<? 
/**
 * Mailer.php
 *
 * The Mailer class is meant to simplify the task of sending
 * emails to users. Note: this email system will not work
 * if your server is not setup to send mail.
 *
 * If you are running Windows and want a mail server, check
 * out this website to see a list of freeware programs:
 * <http://www.snapfiles.com/freeware/server/fwmailserver.html>
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
 
class Mailer
{
   /**
    * sendWelcome - Sends a welcome message to the newly
    * registered user, also supplying the username and
    * password.
    */
   function sendWelcome($user, $email, $pass){
      $from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
      $subject = "Spel zonder Naam - Welkom";
      $body = $user.",\n\n"
             ."Welkom bij dit spel zonder naam"
             ."Dit zijn je gegevens\n\n"
             ."Username: ".$user."\n"
             ."Password: ".$pass."\n\n"
             ."spel zonder naam";

      return mail($email,$subject,$body,$from);
   }
   
   /**
    * sendNewPass - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   function sendNewPass($user, $email, $pass){
      $from = "From: ".EMAIL_FROM_NAME." <".EMAIL_FROM_ADDR.">";
      $subject = "Het spel zonder Naam - nieuw password";
      $body = $user.",\n\n"
             ."Er is een nieuw wachtwoord gemaakt op uw "
             ."verzoek, je kan hem gebruiken om in te loggen op "
             ."het spel zonder naam.\n\n"
             ."Username: ".$user."\n"
             ."New Password: ".$pass."\n\n"
             ."het is slim om hem te veranderen in iets makkelijks \n"
             ."Spel zonder naam";
             
      return mail($email,$subject,$body,$from);
   }
};

/* Initialize mailer object */
$mailer = new Mailer;
 
?>
