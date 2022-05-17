<?
include("include/session.php");
if($session->isMaker()){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?
$hoeveel = $_POST['hoeveel'];
$x = $hoeveel;
$y = $hoeveel;



	for($i=0; $i<=$hoeveel; $i=$i+1)
	{
mysql_query("INSERT INTO 'dmystic_spel','map' (x, y,) 
VALUES ('3','4')");
	}


mysql_query("INSERT INTO map (x, y,) 
VALUES ('Peter', 'Griffin', '35')");

?>

</body>
</html>
<?
}
else{
header("Location: main.php");
}
?>