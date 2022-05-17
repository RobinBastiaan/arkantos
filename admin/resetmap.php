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
echo"<b>Resetten</b>";
echo"<p>Weet je zeker dat je de map wilt resetten?";	 
echo"<br> <a href=\"resetecht.php\">Ja natuurlijk!</a>"; 
}

echo "</td></tr></table>";   
echo"</body>";
echo"</html>";
?>