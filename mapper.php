<?
include("include/session.php");
$x = 0;
$y = 0;

for($x = 0; $x < 10; $x++)
{
for($y = 0; $y < 10; $y++)
{ 
mysql_query("INSERT INTO map (x,y,van,type) VALUES ($x,$y,'neutraal','standaard')"); 
} 
mysql_query("INSERT INTO map (x,y,van,type) VALUES ($x,$y,'neutraal','standaard') ");
}
?>