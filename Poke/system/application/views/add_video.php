<?php 
	echo "<center><b>Adicione aqui seus videos. Use links de videos do <a href='http://youtube.com'>YouTube</a>.</b></center><br/>";
	error(validation_errors());
	echo form_open("video/add");
		echo "<label>Personagem:</label>";
		echo "<select name='character'>";
			foreach($characters as $character) {
				echo "<option value='".$character['id']."'>".$character['name']."</option>";
			}
		echo "</select><br/><br/>";
		
		echo "<label>Título:</label>";
		echo "<input type='text' size='42' name='title' value='".set_value('title')."' maxlength='64'/><br/>";
		echo "<label>Descrição:</label>";
		echo "<textarea name='description'>".set_value('description')."</textarea><br/>";
		echo "<label>Link do YouTube</label>";
		echo "<input type='text' value='".set_value('link')."' name='link' size='42'/><br/>";
		echo "<button class='btn btn-success' type='submit'>Adicionar video</button>";
	echo "</form>";

?>