<?
include("../include/session.php");

echo"
<html>
<head>
<link rel=\"stylesheet\" 
type=\"text/css\" href=\"../szn.css\" />
</head>
<body>";
echo"<TABLE bgcolor=\"#FAF1D1\" border=\"1\" width=\"70%\" align=\"center\"><tr><td>";

if(!$session->isAdmin()){
         header("Location: ../main.php");
         return;
      }
else{
mysql_query("UPDATE map SET van='neutraal' ");
mysql_query("UPDATE users SET steden='0' ");
echo"<b>Het resetten was succesvol!</b> <br> Elk gebied is neutraal en iedere speler heeft nu weer 0 steden.";
echo"<p>Je kan nu weer terug keren naar <a href=\"admin.php\">\"Admin Centrum\"</a>.";
}

echo "</td></tr></table>"; 
echo"</body>";
echo"</html>";
?>