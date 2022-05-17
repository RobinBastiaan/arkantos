<?
/**
 * UserInfo.php
 *
 * This page is for users to view their account information
 * with a link added for them to edit the information.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<head>
<title>SZN</title>
<link rel="stylesheet" 
type="text/css" href="szn.css" />
</head>

<body>

<CENTER>
<table border="1" width="70%">
<tr><td>

<?
/* Requested Username error checking */
$req_user = trim($_GET['user']);
if(!$req_user || strlen($req_user) == 0 ||
   !eregi("^([0-9a-z])+$", $req_user) ||
   !$database->usernameTaken($req_user)){
   die("Gebruikersnaam niet geregistreerd");
}

/* Logged in user viewing own account */
if(strcmp($session->username,$req_user) == 0){
   echo "<h1>Mijn Account</h1>";
}
/* Visitor not viewing own account */
else{
   echo "<h1>Gebruikers Informatie</h1>";
}

/* Display requested user information */
$req_user_info = $database->getUserInfo($req_user);

/* Username */
echo "<b>Gebruikersnaam: ".$req_user_info['username']."</b><br>";

/* Email */
echo "<b>E-mail:</b> ".$req_user_info['email']."<br>";

/**
 * Note: when you add your own fields to the users table
 * to hold more information, like homepage, location, etc.
 * they can be easily accessed by the user info array.
 *
 * $session->user_info['location']; (for logged in users)
 *
 * ..and for this page,
 *
 * $req_user_info['location']; (for any user)
 */

/* If logged in user viewing own account, give link to edit */
if(strcmp($session->username,$req_user) == 0){
   echo "<br><a href=\"useredit.php\">Wijzig Account Informatie</a><br>";
   echo "
   <form action=\"usere.php\" method=\"post\"> Wil je muziek en geluiden? <select name=\"geluid\"> <option value=\"1\">ja</option>
  <option value=\"0\">nee</option></select> <input name=\"button\" type=\"submit\" value=\"ok\"></form> <br>";
      
}

/* Link back to main */
echo "<br>Terug naar [<a href=\"main.php\">Je Account</a>]<br>";

?>

</body>
</html>
