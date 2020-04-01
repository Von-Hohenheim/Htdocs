<?php
require_once("system/application/config/create_character.php");
	if(in_array(strtolower($player->name), $config['restricted_names']))
		error("No tienes autorización para ver este personaje.");
	else {
	if($player->isDeleted()) alert("Este personaje ha sido eliminado.");
	if($player->isNameLocked()) alert("Este personaje ha cambiado su nombre.");

	try {$comment = nl2br(decodeString(strip_tags($player->getComment())));}catch (Exception $e) {$comment = "No hay Comentarios.";}
	$nickname = ($account->getCustomField('nickname') == "") ? "No Existe." : $account->getCustomField('nickname');
	try { $created = $player->getCreated(); } catch (Exception $e) { $created = time()-36000;}
?>
<div class='title'>Entrenador Pokémon</div>
<table class="info table" width='100%'>
	<tr><td width='30%'>Nombre:</td><td><?php echo $player->getName();?></td></tr>
	<tr><td width='30%'>Genero:</td><td><?php echo $sex = ($player->getSex() == 1) ? "Masculino" : "Femenino" ?></td></tr>
	<tr><td width='30%'>Vocation:</td><td><?php echo getVocationName($player->getVocation(), $player->getPromotion()); ?></td></tr>  

	<?php 
		$rank_of_player = $player->getRank();
		if(!empty($rank_of_player)) {
			$guild_id = $rank_of_player->getGuild()->getId();
			$guild_name = $rank_of_player->getGuild()->getName();
			echo "<tr><td width='30%'>Guild membership</td><td>".$rank_of_player->getName()." of the <a href='../../guilds/view/$guild_id'>".$guild_name."</a></td></tr>";
		}
	?>
	<tr><td width='30%'>Mundo:</td><td><?php echo $config['worlds'][$player->getWorld()]; ?></td></tr>
	<tr><td width='30%'>Nick:</td><td><?php echo "<a href='".url('profile/view/'.$nickname)."'>".$nickname."</a>"; ?></td></tr>
	<tr><td width='30%'>Online:</td><td><?php echo $lastlogin = ($player->getLastLogin() == 0) ? "Nunca logou" : UNIX_TimeStamp($player->getLastLogin()); ?></td></tr>
	<tr><td width='30%'>Comentarios:</td><td><?php echo $comment; ?></td></tr>
	<tr><td width='30%'>Cuenta:</td><td><?php echo $status = ($account->isPremium()) ? "Premium" : "Free"; ?></td></tr>
	<tr><td width='30%'>Status:</td><td><?php echo $status = ($player->isOnline()) ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></td></tr>
	<tr><td width='30%'>Creado:</td><td><?php echo ago($created)." | ".UNIX_TimeStamp($created); ?></td></tr>
</table>
<?php 
	$GLOBALS['player'] = $player;
	$ide = new IDE;
	try {
		$ide->loadInjections("character_view");
	}
		catch(Exception $e) {
			error($e->getMessage());
		}
	
}
?>