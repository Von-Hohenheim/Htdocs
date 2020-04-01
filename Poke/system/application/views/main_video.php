<?php 
	$ide = new IDE;
	$GLOBALS['videos'] = $videos;
	try { $ide->loadInjections("videos_main"); } catch (Exception $e) { error($e->getMessage()); }
	if(!$ide->isLogged()) 
		alert("Você precisa estar logado para adicionar videos.");
	else {
		echo "<div class='toolbar'>";
			echo "<a href='".WEBSITE."/index.php/video/add'>Adicionar video</a> | ";
			echo "<a href='".WEBSITE."/index.php/video/my'>Meus videos</a> | ";
		echo "</div>";	
	}
	echo "<div class='video_search'>";
		echo form_open("video/doSearch");
			echo "<br />Procurar:<br /><input type='text' name='query'/><br />";
			echo "<button class='btn btn-info btn-small' type='submit'>Procurar</button>";
		echo "</form>";
	echo "</div>";
	if(empty($videos))
		echo "<center><b>Não há videos.</b></center>";
	else {
		foreach($videos as $video) {
			echo "<div style='float: left; width:50%;overflow:hidden;'>";
				echo "<div style='float: left;'>";
				echo "<a href='".WEBSITE."/index.php/video/view/".$video['id']."'><img style='border: 1px groove silver; padding: 1px;' src='http://i1.ytimg.com/vi/".$video['youtube']."/default.jpg'/></a>";
				echo "</div>";
				echo "<div style='float: left; margin-left: 5px;'>";
				echo "<a href='".WEBSITE."/index.php/video/view/".$video['id']."'>".truncateString($video['title'], 20)."</a><br/>";
				echo "Vizualizações: ".$video['views']."<br/>";
				echo "Add: ".ago($video['time'])."<br/>";
				echo "Autor: <a href=\"".WEBSITE."/index.php/character/view/".$video['author']."\">".$video['author']."</a>";
				echo "</div>";
			echo "</div>";
		}
		
		
	}
?>
<div style='clear: both;'></div>