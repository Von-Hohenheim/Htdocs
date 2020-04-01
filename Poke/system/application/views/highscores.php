<?php
require("config.php");
$ide = new IDE;
try {$ide->loadInjections("highscores");} catch(Exception $e) {error($e->getMessage()); }
echo form_open('highscores');
	$uri = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

	if(count($config['worlds']) > 1) {
		echo "<b>World</b>&nbsp;&nbsp;";
		echo "<select name='world'>";
		foreach($config['worlds'] as $id=>$name) {
			if($_POST['world'] == $id)
			echo "<option selected='true' value='$id'>$name</option>";
			else
			echo "<option value='$id'>$name</option>";
		}
		echo "</select>";
	}
	echo "<center><div class='message'><div class='title'>Ranking de ". (is_numeric($type) ? $skills[$type] : $type) ."</div>";
	echo "<div style='width: 50%; position:relative;float: center;margin: 0 auto;'><div class='info'>";
	echo "<b>Puntuacion por</b> ";
	echo "<select name='skill'>";
	echo "<option class='skill' ".set_select('skill', 1, true)." value='level'>Experience</option>";

	echo "</select>";
	echo " <input type='submit' value='Mostrar' class='btn btn-primary'>";

	echo "</form><br/><br/>";

	
	$i = 1 + $uri;
	echo "<table class='table' width='100%'>";
	if(is_numeric($type)) {
		
		echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='5%'><center><b>Skill</b></center></td></tr>";
		foreach($players as $player) {
			if(in_array($player['name'], $config['newchar_vocations'][0])) continue;
			echo '<tr><td width="5%" align="center">'.$i.'</center></td><td width="40%" align="center"><a href="'.WEBSITE.'/index.php/character/view/'.$player['name'].'" class="'. ($player['online'] ? 'green' : 'red') .'">'.$player['name'].'</a></td><td width="5%" align="center">'.$player['value'].'</td></tr>';
			$i++;
		}
	}else{
		switch($type) {
			case 'level':
			echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='10%'><center><b>Exp</b></center></td><td width='5%'><center><b>Level</b></center></td></tr>";
			foreach($players as $player) {
				if(in_array($player['name'], $config['newchar_vocations'][0])) continue;
				echo '<tr><td width="5%" align="center">'.$i.'</td><td width="40%" align="center"><a href="'.WEBSITE.'/index.php/character/view/'.$player['name'].'" class="'. ($player['online'] ? 'green' : 'red') .'">'.$player['name'].'</a></td><td width="10%" align="center">'.$player['experience'].'</td><td width="5%" align="center">'.$player['level'].'</td></tr>';
				$i++;
			}
			break;
			case 'magic':
			echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='5%'><center><b>Level</b></center></td></tr>";
			foreach($players as $player) {
				if(in_array($player['name'], $config['newchar_vocations'][0])) continue;
				echo '<tr><td width="5%" align="center">'.$i.'</td><td width="40%" align="center"><a href="'.WEBSITE.'/index.php/character/view/'.$player['name'].'" class="'. ($player['online'] ? 'green' : 'red') .'">'.$player['name'].'</a></td><td width="5%" align="center">'. $player['maglevel'] .'</td></tr>';
				$i++;	
			}
			break;
		}	
	}
	echo "</table>";
	echo $this->pagination->create_links();
	echo "</div></div></div>";