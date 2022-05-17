<?
$mu = $_GET['mu'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Het spel zonder naam</title>
<link rel="stylesheet" type="text/css" href="szn.css" />
<style type="text/css">
<!--
.style3 {	color: #FF6600;
	font-weight: bold;
}
.style4 {color: #FF6600}
.style5 {color: #009900}
-->
</style>
</head>

<body>
<p>Sem, ff niet doen, mag geen mp3's op frihost </p>
<p align="center"><a href="muziekmenu.php" target="muziek" class="style5">&gt;&gt;stop muziek&lt;&lt;</a> </a><span class="style3">&lt;-&gt;</span
><a href="muziekmenu.php?mu=menumusic" target="muziek"> Standaard muziek </a><span class="style3">&lt;-&gt;</span> <a href="muziekmenu.php?mu=spook" target="muziek">Fright night</a> <span class="style3">&lt;-&gt;</span><a href="muziekmenu.php?mu=CrystalOasis" target="muziek"> Crystal Oasis </a><span class="style3">&lt;-&gt;</span> <a href="muziekmenu.php?mu=main" target="muziek">Main Lotr Theme</a> <span class="style3">&lt;-&gt;</span><a href="muziekmenu.php?mu=gweotn" target="muziek"> Guild Wars EOTN </a> <span class="style3">&lt;-&gt; </span><span class="style4"><a href="muziekmenu.php?mu=matrix" target="muziek"> Clubbed to Death </a></span><span class="style3">&lt;-&gt;</span>
  <embed src="muziek/<? echo"$mu"; ?>.mp3" hidden="true" autostart="true" loop="true"></embed>
</p>
</body>
</html>


