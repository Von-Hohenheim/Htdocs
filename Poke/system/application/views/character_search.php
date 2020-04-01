<?php
echo form_open("character/view");
?>
<div class='message'>
<div class='title'>Buscar Entrenador</div><div style='width: 80%; position:relative;float: center;margin: 0 auto;'>
<table class='table table-striped' width='100%'>
<tbody>
	<tr>
		<td width="30%"><label for="search" style="padding-top:6px;">Nombre del Entrenador:</label></td>
		<td width="40%"><input name='sCharacters' id='search' class='form-control' type='text'></td>
		<td width="30%"><button class="btn btn-success btn-small" type="submit">Buscar</button></td>
	</tr>
</tbody>
</form>
</table>
</div></div><br/>
<?php 
	if(!empty($_SESSION['sCharacters'])) {
		echo "<div class='message'><div class='title'>Historial</div><div id='history' class='content'>";
			foreach($_SESSION['sCharacters'] as $character) {
				echo "<b><a href=\"".url('character/view/'.$character['name'])."\">".ucwords($character['name'])."</a></b> - ".ago($character['time'])."<br/>";
			}
		?>
			<a href='#' onClick='$("#history").load("<?php echo url('character/clearHistory');?>");'>Limpar Historial</a>
		<?php 
		echo "</div></div>";
	}
?>