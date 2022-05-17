<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 */
include("../include/session.php");

/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->ismaker()){
   header("Location: ../main.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
 
function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp, grondstoffen, hout, speergozers, booggozers, paardgozers "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database is leeg";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Gebruikersnaam</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Laatst Actief</b><td><b>Goud</b></td><td><b>Hout</b></td><td><b>Speergozers</b></td><td><b>Booggozers</b></td><td><b>Paardgozers</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");
	  $grond   = mysql_result($result,$i,"grondstoffen");
	  $hout = mysql_result($result,$i,"hout");
	  $speer   = mysql_result($result,$i,"speergozers");
	  $boog   = mysql_result($result,$i,"booggozers");
  	  $paard   = mysql_result($result,$i,"paardgozers");
	  
	  
	  
	  
      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td><td>$grond</td><td>$hout</td><td>$speer</td><td>$boog</td><td>$paard</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
  
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Er zijn momenteel geen gebande gebruikers in de database.";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Gebruikersnaam</b></td><td><b>Tijd Geband</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
?>
<html>
<head>
<title>Adminpagina - spel zonder naam</title>
<link rel="stylesheet" 
type="text/css" href="../szn.css" />
</head>
<body>

<TABLE bgcolor="#FAF1D1" border="1" width="70%" align="center">
<tr><td>

<p class="szn">
<h1>Admin Centrum</h1>
<font size="5" color="#ff0000">
<b>::::::::::::::::::::::::::::::::::::::::::::</b></font>
<font size="4">Ingelogd als <b><? echo $session->username; ?></b></font><br><br>
Terug naar [<a href="../main.php">Je Account</a>]<br><br>
<?
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Fout met verzoek, fix dat even aub</font><br><br>";
}
?>
<hr>
<table align="left" border="0" cellspacing="5" cellpadding="5">
<tr><td>
<?
/**
 * Display Users Table
 */
?>
<h3>Gegevens van alle gebruikers:</h3>
<?
displayUsers();
?>
</td></tr>
<tr>
<td>
<br>
<?
/**
 * Update User Level
 */
?>
<h3>Update gebruiker Level</h3>
<? echo $form->error("upduser"); ?>
<table>
<form action="adminprocess.php" method="get">
<tr><td>
Gebruikersnaam:<br>
<input type="text" name="upduser" maxlength="30" value="<? echo $form->value("upduser"); ?>">
</td>
<td>
Level:<br>
<select name="updlevel">
<option value="1">1
<option value="2">2
<option value="8">8
<? 
if($session->isadmin()){
?>
<option value="9">9
</select>
<?
}
?></td>
<td>
<br>
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="Update Level"></td></tr>
</form>
</table></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete User
 */
?>
<h3>Verwijder een Gebruiker</h3>
<? echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="get">
Gebruikersnaam:<br>
<input type="text" name="deluser" maxlength="30" value="<? echo $form->value("deluser"); ?>">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" value="Verwijder gebruiker">
</form></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Inactive Users
 */
?>
<h3>Delete Inactieve Gebruikers</h3>
Dit zal alle gebruikers deleten (behalve administrators), die niet hebben ingelogd op de site<br>
voor een bepaalde periode. Jij bepaalt bij hoeveel dagen inactief.<br><br>
<table>
<form action="adminprocess.php" method="get">
<tr><td>
Dagen:<br>
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td>
<td>
<br>
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="Verwijder Alle Inactievelingen"></td>
</form>
</table></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Ban User
 */
?>
<h3>Ban een Gebruiker</h3>
<? echo $form->error("banuser"); ?>
<form action="adminprocess.php" method="get">
Gebruikersnaam:<br>
<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="Ban Gebruiker">
</form></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr><td>
<?
/**
 * Display Banned Users Table
 */
?>
<h3>Gebande Gebruikers:</h3>
<?
displayBannedUsers();
?>
</td></tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Banned User
 */
?>
<h3>Verwijder Gebande gebruiker</h3>
<? echo $form->error("delbanuser"); ?>
<form action="adminprocess.php" method="get">
Gebruikersnaam:<br>
<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="Verwijder Gebande gebruiker">
</form></td>
</tr>
<td><hr></td>
<tr><td>

<h3>Blokeer gebruiker voor bepaalde tijd</h3>
<p>Deze functie werkt nog niet!!!</p><? echo $form->error("blokuser"); ?>
<table>
<form action="adminprocess.php" method="get">
<tr><td>
Gebruikersnaam:<br />
<input type="text" name="blokuser" maxlength="30" value="<? echo $form->value("blokuser"); ?>"></td>
<td>Hoe lang:<br />
<select name="blokdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td><td>
<br />
<input type="hidden" name="blokuser" value="1">
<input type="submit" value="Blokeer gebruiker">
</form>
</td></tr></table>

</tr>
<td><hr></td>
<tr><td>

 <? if($session->isadmin()){ ?>
<h3>Database Resetten</h3>
<p>Als je op resetten klikt worden alle gegevens van iedere gebruiker weer op het beginstand gezet.<br> Jij bepaalt waarmee iedereen begint.</p>
<table><tr><form name="form1" method="post" action="processrestart.php">
  <td>Aant. Goud:</td>
    <td><input name="resgrond" type="text" value="grondstoffen"></td>
  <tr><td>Aant. Hout:</td>
    <td><input name="reshout" type="text" value="hout"></td>
  <tr><td>Aant. Speergozers:</td>
    <td><input name="resspeer" type="text" value="speergozers"></td>
  <tr><td>Aant. Booggozers:</td>
    <td><input name="resboog" type="text" value="booggozers"></td>
  <tr><td>Aant. Paardgozers:</td>
    <td><input name="respaard" type="text" value="paardgozers"></td>
  <tr><td>Hoofdgebouw lvl:</td>
    <td><input name="hoofdgebouw" type="text" value="hoofdgebouw"></td>
  <tr><td>Barakken lvl:</td>
    <td><input name="barakken" type="text" value="barakken"></td>
  <tr><td>Marktplaats lvl:</td>
    <td><input name="marktplaats" type="text" value="marktplaats"></td>
  <tr><td>Houthakkerij lvl:</td>
    <td><input name="houtlvl" type="text" value="houtlvl"></td>
  <tr><td>Mijn lvl:</td>
    <td><input name="reslvl" type="text" value="inkomenlvl"></td>
	
  <tr><td><input type="submit" name="Submit" value="Resetten!">
  </p>
</form><p></table>

De 'reset de map' knop zorgt ervoor dat elk gebied weer neutraal wordt en iedere speler 0 steden heeft.<br>
<a href="resetmap.php">Reset de map </a></td>
</tr>

<tr>
<td><hr></td>
</tr>

<tr><td>
<h3>Alle berichten zien</h3>

<p>Bekijk <a href="../msgall.php" target="main">alle berichten</a> en zie alle aanvallen, verstuurde berichten en handelsacties.</p>
</td></tr>

</table>
</table>
<? } ?>
</body>
</html>
<?
}
?>

