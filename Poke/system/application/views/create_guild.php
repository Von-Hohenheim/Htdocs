<?php
require_once("system/application/config/create_character.php");
echo "<div class='title'>Crear Guild</div>";
	if(count($characters) == 0) 
		error("Ninguno de tus personajes tiene el nivel requerido para crear una Guild. (<b>".$config['levelToCreateGuild']."</b>)");
	else {
	error(validation_errors());
	echo form_open("guilds/create", array('method'=>'post'));
	echo "<label>Personaje:</label>";
	echo "<select name='character'>";
		foreach($characters as $character) {
			echo "<option value='".$character['id']."'>".$character['name']." (".$character['level'].")</option>";
		}
	echo "</select><br /><br />";
	echo "<label>Nombre de la Guild</label>";
	echo "<input type='text' name='name'><br />";
	echo "<button class='btn btn-info' type='submit' name='submit'>Crear Guild</button>";
	echo "</form>";
	
	}
?>