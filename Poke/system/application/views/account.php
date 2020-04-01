<?php 
$GLOBALS['characters'] = $characters;
$ide = new IDE;
try { $ide->loadInjections("account"); } catch(Exception $e) { error($e->getMessage()); }
	echo "<div class='title'>Personajes de <a href='".url('profile/view/'.$_SESSION['nickname'])."'>".ucfirst($_SESSION['nickname'])."</a>!</div>";
	
	if($messages != 0)
		if($messages == 1)
			echo "<center><b>Tiene $messages nuevo mensaje! Haga clic en <a href='".url('msg/inbox')."'>aqui</a> y leelo!</b></center><br/>";
		else
			echo "<center><b>Tienes $messages nuevos mensajes! Haga clic en <a href='".url('msg/inbox')."'>aqui</a> y leelos!</b></center><br/>";
?>
<?php
	echo "<table class='table info' width='100%'>";
	echo "<tbody>";
	echo "<tr><td><center><b>Nome</b></center></td><td><center><b>Level</b></center></td><td><center><b>Ações</b></center></td></tr>";
	foreach($characters as $row) {
		echo "<tr class='highlight'><td><center><a href=\"".WEBSITE."/index.php/character/view/$row->name\">$row->name</a></center></td><td><center>$row->level</center></td><td><center><a href=\"".WEBSITE."/index.php/account/editcomment/$row->id\" class='tipsy' title='Editar comentário'><img src='".WEBSITE."/public/images/edit.gif'/></a> <a href='#' onClick='if(confirm(\"Are you sure?\")) window.location.href=\"".WEBSITE."/index.php/account/deletePlayer/$row->id\"' class='tipsy' title='Delete character'><img src='".WEBSITE."/public/images/false.gif'/></a></center></td></tr>";
	}
	echo "<tr><td colspan='3'><center><a href='".WEBSITE."/index.php/character/create_character'><button class='btn btn-info' onClick=\"window.location.href='".WEBSITE."/index.php/character/create_character';\">Crear Personaje</button></a></center></td></tr>";
	echo "</tbody>";
	echo "</table>";
	
	echo "<div class='title'>Cuenta</div>";
	echo "<table class='table info' width='100%'>";
	echo "<tbody>";
	echo "<tr><td><center><a href='".WEBSITE."/index.php/account/changepassword'><button class='btn btn-info' onClick=\"window.location.href='".WEBSITE."/index.php/account/changepassword';\">Cambiar contraseña</button></a></center></td><td><center><a href='".WEBSITE."/index.php/account/logout'><button class='btn btn-danger' onClick=\"window.location.href='".WEBSITE."/index.php/account/logout';\">Sair</button></a></center></td></tr>";
	echo "</tbody>";
	echo "</table>";
	
	echo "<div class='title'>Comunidad</div>";
	echo "<table class='table info' width='100%'>";
	echo "<tbody>";
	echo "<tr><td><b>Perfil del Entrenador</b></td></tr>";
	echo "<tr><td width='50%'><a href='".WEBSITE."/index.php/profile/update'><span class='glyphicon glyphicon-heart-empty'></span> Editar Informacion</a></td>";
	echo "<td width='50%'><a href='".WEBSITE."/index.php/profile/avatar'><span class='glyphicon glyphicon-camera'></span> Editar avatar</a></td></tr>";
	echo "</tbody></table>";
	echo "<table class='table info' width='100%'><tbody><tr><td><b>Mensages</b></td></tr>";
	echo "<tr><td width='30%'><a href='".WEBSITE."/index.php/msg/inbox'><span class='glyphicon glyphicon-send'></span> Bandeja de Entrada</a></td>";
	echo "<td width='30%'><a href='".WEBSITE."/index.php/msg/outbox'><span class='glyphicon glyphicon-folder-open'></span> &nbsp;Bandeja de Salida</a></td>";
	echo "<td width='30%'><a href='".WEBSITE."/index.php/msg/write'><span class='glyphicon glyphicon-pencil'></span> Escribir nuevo</a></td></tr>";
	echo "</tbody>";
	echo "</table>";
	echo "<center><div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-exclamation-sign'></span> <b>Seguridad</b>: ¡Nunca comparta sus datos con nadie más! Mantenga su información segura y juegue bien!</div><br /></center>";

?>