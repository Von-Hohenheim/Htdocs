<?php 
	require("config.php");
	$ide = new IDE;
	$GLOBALS['houses'] = $houses;
	try { $ide->loadInjections("house_list"); } catch (Exception $e) { error($e->getMessage()); }
	echo form_open("houses/main");
	
	if(empty($config['cities'])) show_error("Cities are not configured properly.");
	if(empty($config['worlds'])) show_error("Worlds are not configured properly.");
	echo "<div class='message'>";
	echo "<div class='title'>Casas</div><div class='content'>";
	echo "<center><table width='100%' cellspacing='10px' cellpadding='10px' style='background-color:#e4e8ea; border-radius:4px;'><tr><td width='10%' style='padding: 5px;'><b>Servidor:</b></td>";
		echo "<td width='25%' style='padding: 5px;'><select class='form-control' name='world'>";
			foreach($config['worlds'] as $id=>$city) {
				echo "<option ".set_select('world', $id)." value='".$id."'>".$city."</option>";
			}
	echo "</select></td>";
	
	echo "<td width='10%' style='padding: 5px;'><b>Ciudad:</b></td>";
		echo "<td width='25%' style='padding: 5px;'><select class='form-control' name='town'>";
			foreach($config['cities'] as $id=>$city) {
				echo "<option ".set_select('town', $id)." value='".$id."'>".$city."</option>";
			}
		echo "</select></td>";
		
	echo "<td width='20%' style='padding: 5px;'><b>Desocupada</b> ";
	echo "<input type='checkbox' ".set_checkbox('free', '1')."  value='1' name='free'/> ";
	
	echo "</td><td width='20%' style='padding: 5px;'><input type='submit' class='btn btn-default navbar-btn' value='Buscar'/>";
	
	echo "</form></td></tr></table></center>";
	
	if(empty($houses))
	alert("Não há casas disponíveis.");
	else {
		echo "<center>".$pages."</center><br/>";
		foreach($houses as $house) {
			echo "<div class='houses_list_box'>";
				echo "<div class='house_title'><b>";
					echo $house['name'];
					echo "</b><div class='btn btn-primary btn-lg btn' style='float: right; margin-top: 15px;margin-right: 5px;'><a style='color:#fff;' href='".WEBSITE."/index.php/houses/view/".$house['id']."'><span class='glyphicon glyphicon-eye-open'></span> Ver</a></div>";
				echo "</div>";
				
				echo "<table style='border: 1px solid #c0c0c0; background-color:#e4e8ea; border-radius: 5px; text-align: center;' width='90%'><tr>";
				
						echo "<td width='10px'>&nbsp;&nbsp;&nbsp;</td><td width='10px'>&nbsp;&nbsp;&nbsp;</td><td width='5%'><b>Ciudad</b>:</td><td width='13%'> ".@$config['cities'][$house['town']]." </td>";
						echo "<td width='5%'><b>Server</b>:</td><td width='12%'> ".@$config['worlds'][$house['world_id']]." </td>";
						echo "<td width='5%'><b>Tamaño</b>:</td><td width='10%'> ".$house['size']." sqm </td>";
						echo "<td width='5%'><b>Camas</b>:</td><td width='10%'> ".$house['beds']." </td>";
						echo "<td width='5%'><b>Valor</b>:</td><td width='10%'> ".$house['rent']." gold </td>";
						echo "<td width='5%'><b>Puertas</b>:</td><td width='10%'> ".$house['doors']." </td></tr></table><table width='80%'><tr><td width='auto'>";
		
						echo ($house['owner'] == 0) ? "Esta casa está <font color='green'><b>desocupada</b></font>." : "Esta casa está <font color='red'><b>ocupada</b></font>. Foi paga em ".UNIX_TimeStamp($house['paid'])." | ".ago($house['paid']);
						echo ($house['guild'] == 1) ? "<br/><b>Esta é uma casa para guildas.</b>" : "";
				echo "</div></td></tr></table><br/>";
			echo "</div>";
		}
		echo "<center>".$pages."</center>";
	echo "</div></div>";
	}
?>