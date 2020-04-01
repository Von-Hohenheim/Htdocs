<?php require("config.php"); 
$GLOBALS['house'] = $house;
$ide = new IDE;
try { $ide->loadInjections("view_house"); } catch (Exception $e) { error($e->getMessage()); }
?>
<div class='message'><div class='title'>Casas</div><div id='content2'>
<div style='position: relative; float:left; display: block; margin-left: auto; margin-right: auto;'>
	<h2><?php echo $house[0]['name']; ?></h2>
	<?php 
		
		echo (empty($house[0]['owner'])) ? "Esta casa está <font color='green'><b>desocupada</b></font>." : "Esta casa está <font color='red'><b>ocupada</b></font>.<br/> Ela foi paga em ".UNIX_TimeStamp($house[0]['paid'])." | ".ago($house[0]['paid'])."<br/><br/>";
		$owner = (empty($house[0]['owner'])) ? "Ninguno" : "<a href=\"".WEBSITE."/index.php/character/view/".$house[0]['owner']."\">".$house[0]['owner']."</a>";
		echo "<br/><br/><table width='100%' style='background-color:#e4e8ea; border:solid 1px #232675;'>";
		echo "<tr class='highlight'><td width='50%' style='padding: 3px 3px 3px 3px;'><b>Alquiler:</b></td><td>".$house[0]['rent']." gold</td></tr>";
		echo "<tr class='highlight'><td width='50%' style='padding: 3px 3px 3px 3px;'><b>Propietario:</b></td><td>".$owner."</td></tr>";
		echo "<tr class='highlight'><td width='50%' style='padding: 3px 3px 3px 3px;'><b>Mundo:</b></td><td>".@$config['worlds'][$house[0]['world_id']]."</td></tr>";
		echo "<tr class='highlight'><td width='50%' style='padding: 3px 3px 3px 3px;'><b>Ciudad:</b></td><td>".@$config['cities'][$house[0]['town']]."</td></tr>";
		echo "<tr class='highlight'><td width='50%' style='padding: 3px 3px 3px 3px;'><b>Tamaño:</b></td><td>".$house[0]['size']." sqm</td></tr>";
		echo "<tr class='highlight'><td width='40%' style='padding: 3px 3px 3px 3px;'><b>Camas</b></td><td>".$house[0]['beds']."</td></tr>";
		echo "<tr class='highlight'><td width='40%' style='padding: 3px 3px 3px 3px;'><b>Piso</b></td><td>".$house[0]['tiles']."</td></tr>";
		echo "</table>";
		
		
	?>
	</div>
<div style='position: relative; float:right; display: block; margin-left: auto; margin-right: auto;'>
	<?php 
		
		$image = (file_exists("public/houses_maps/".$id.".png")) ? "<center><img src='".WEBSITE."/public/houses_maps/".$id.".png'/>" : "<img src='".WEBSITE."/public/houses_maps/default.png'/></center>";
		echo $image;
		echo "<br/>";
			if(empty($house[0]['owner']) && $house[0]['bid'] == 0) {
				echo "<center>Atualmente esta casa está vacia.</center> <br/>";
				echo "<center><a href='".WEBSITE."/index.php/houses/start_auction/".$id."'><button class='btn btn-primary btn-lg btn' onClick=\"window.location.href='".WEBSITE."/index.php/houses/start_auction/".$id."';\">Start Auction</button></a></center>";
			}
			elseif(empty($house[0]['owner']) && $house[0]['bid'] != 0) {
				echo "<center>Esta casa está em processo de locação. Maior oferta: ".$house[0]['bid']." gold.</center> <br/>";
				echo "<center><a href='".WEBSITE."/index.php/houses/join_auction/".$id."'><button class='btn btn-primary btn-lg btn' onClick=\"window.location.href='".WEBSITE."/index.php/houses/join_auction/".$id."';\">Join Auction</button></a></center>";
				echo "<br/><center>The auctions finishes at:<br/>".UNIX_TimeStamp($house[0]['endtime'])."</center>";
			}
			
			if($ide->isLogged()) {
				if(in_multiarray($house[0]['owner'], $characters)) {
					echo "<li><a href='#' onClick='if(confirm(\"Are you sure you want to leave this house?\")) window.location.href=\"".WEBSITE."/index.php/houses/abandon/".$id."\";'>Abandon House</a></li>";
				}
			}
	?>
	</div>

</div></div>