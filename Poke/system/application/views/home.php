<?php 
require("config.php");
$ide = new IDE;
try { $ide->loadInjections("home"); }catch(Exception $e) { error($e->getMessage());}
foreach($news['news'] as $value) {
	echo "<div class='news'>";
	echo "<div class='newsTitle'>".$value['title']."</div>";
	echo "<div class='newsBody'>".$value['body']."";	
	echo "<br/><hr class='style-two'></hr><small><center><span class='glyphicon glyphicon-user'></span> Posteado por: <b>Equipo - PokeMasterX</b><span style='margin-left:15px;' class='glyphicon glyphicon-calendar'></span> Posteado en: 
	".date('d/m/Y a H:i', $value['time'])."</small></center></div>";
	echo "<div class='newsFooter'>";	
	if($config['facebook']) {
		echo "<center><iframe src='http://www.facebook.com/widgets/like.php?href=".WEBSITE."/index.php/home/view/".$value['id']."' scrolling='no' frameborder='0'style='border: none; width: 340px; height: 24px;'></iframe></center>";
	}
	echo "<br/></div></div>";
}
echo "<div class='readArchive'><a href='".WEBSITE."/index.php/home/archive'>Noticias</a></div>";
?>