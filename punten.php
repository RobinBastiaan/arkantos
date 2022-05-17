<?
include("include/session.php");
mysql_query("UPDATE users SET punten=grondstoffen/1000+booggozers+speergozers+paardgozers+inkomenlvl+Barakken+hoofdgebouw*4+hout/1000+houtlvl");
?>