<?php
class Guilds_Model extends Model {
	public function getGuildsList($world_id = null) {
		$this->load->database();
		$ext = (!empty($world_id)) ? "WHERE `world_id` = '$world_id'": "";
		$guilds = array();
		$sql = $this->db->query("SELECT `id`, `world_id`, `name`, `motd` FROM `guilds` $ext")->result();
			foreach($sql as $cmd) {
				$guilds[] = array("id"=>$cmd->id, "world_id"=>$cmd->world_id, "name"=>$cmd->name, "motd"=>$cmd->motd);
			}
		return $guilds;
	}
	
	public function getCharactersAllowedToCreateGuild($level = 0) {
		$this->load->database();
		$characters = array();
		$sql = $this->db->query("SELECT `id`, `name`, `level` FROM `players` WHERE `rank_id` = '0' AND `online` = 0 AND `level` >= '{$level}' AND `account_id` = '{$_SESSION['account_id']}'")->result();
		foreach($sql as $cmd) {
			$characters[] = array('id'=>$cmd->id, 'name'=>$cmd->name,'level'=>$cmd->level);
		}
		return $characters;
	}
	
	public function checkPlayerCreatingGuild($id) {
		require_once("system/application/config/create_character.php");
		$this->load->database();
		$sql = $this->db->query("SELECT `id` FROM `players` WHERE `id` = '$id' AND `online` = 0 AND `level` >= '".LEVELTOCREATEGUILD."' AND `account_id` = '{$_SESSION['account_id']}'")->row_array();
		if(count($sql) == 0) return false; else return true;
	}
	
	public function checkGuildName($name) {
		$this->load->database();
		$name = $this->db->escape($name);
		$sql = $this->db->query('SELECT `id` FROM `guilds` WHERE `name` = "'.$name.'"')->row_array();
		if(count($sql) == 0) return true; else return false;
	
	}
	
	public function createGuild($name, $character) {
		$ots = POT::getInstance();
		$ots->connect(POT::DB_MYSQL, connection());
		$player = new OTS_Player();
		$player->load($character);
		$new_guild = new OTS_Guild();
		$new_guild->setCreationData(time());
		$new_guild->setName($name);
		$new_guild->setOwner($player);
		$new_guild->save();
		$new_guild->setCustomField('motd', 'New guild. Leader must edit this text :)');
		$new_guild->setCustomField('creationdata', time());
		$new_guild->setCustomField('world_id', $player->getWorld());
		$ranks = $new_guild->getGuildRanksList();
		$ranks->orderBy('level', POT::ORDER_DESC);
		foreach($ranks as $rank)
			if($rank->getLevel() == 3)
			{
				$player->setRank($rank);
				$player->save();
			}
		return $new_guild->getId();
	}
	
	public function getGuildInfo($id) {
		$this->load->database();
		return $this->db->query("SELECT `world_id`, `name`, `ownerid`, `creationdata`, `motd` FROM `guilds` WHERE `id` = '".$id."'")->result_array();
	}
	
	public function isGuildLeader($id) {
		$this->load->database();
		return ($this->db->query("SELECT `id` FROM `players` WHERE `id` = '".$id."' AND `account_id` = '".$_SESSION['account_id']."' ")->num_rows == 0) ? false: true;
	}

	public function isViceLeader($id) {
        	$this->load->database();
        	$viceRank = 2;
	        return ($this->db->query("SELECT `p`.`id`, `p`.`name` FROM `guild_ranks` AS `r` LEFT JOIN `players` AS `p` ON `p`.`rank_id` = `r`.`id` WHERE `r`.`guild_id` = '".$id."' AND `r`.`level` = '".$viceRank."' AND `p`.`account_id` = '".$_SESSION['account_id']."' ")->num_rows == 0) ? false: true;
    	}
		
	public function isLeader($id) {
        	$this->load->database();
        	$Rank = 3;
	        return ($this->db->query("SELECT `p`.`id`, `p`.`name` FROM `guild_ranks` AS `r` LEFT JOIN `players` AS `p` ON `p`.`rank_id` = `r`.`id` WHERE `r`.`guild_id` = '".$id."' AND `r`.`level` = '".$Rank."' AND `p`.`account_id` = '".$_SESSION['account_id']."' ")->num_rows == 0) ? false: true;
    	}  
	
	public function isInvitable($name) {
		$this->load->database();
		return $this->db->query("SELECT `rank_id`, `online` FROM `players` WHERE `name` = \"".$name."\"")->result_array();
	}
	
	public function getCharacterId($name) {
		$this->load->database();
		return $this->db->query("SELECT `id` FROM `players` WHERE `name` = \"".$name."\"")->result_array();
	}
	
	public function invite($id, $player) {
		$this->load->database();
		$this->db->query("INSERT INTO `guild_invites` VALUES('".$player."', '".$id."')");
	}
	
	public function getMembers($id) {
		$this->load->database();
		return $this->db->query("SELECT players.id, players.name, guild_ranks.name AS guild_rank FROM guild_ranks LEFT JOIN players ON rank_id = guild_ranks.id WHERE guild_ranks.guild_id = '".$id."' ORDER BY guild_ranks.level DESC")->result_array();
	}
	
	public function isGuildMember($id, $player) {
		$this->load->database();
		return ($this->db->query("SELECT players.rank_id FROM players, guild_ranks WHERE players.rank_id = guild_ranks.id AND players.id = '".$player."' AND guild_ranks.guild_id = '".$id."'")->num_rows == 0) ? false: true;
	}
	
	public function getMemberDescription($id) {
		$this->load->database();
		return $this->db->query("SELECT `guildnick` FROM `players` WHERE `id` = '".$id."'")->result_array();
	}
	
	public function changeDescription($player, $desc) {
		$this->load->database();
		$this->db->query("UPDATE players SET guildnick = \"".$desc."\" WHERE id = '".$player."'");
	}
	
	public function getMemberRank($id) {
		$this->load->database();
		return $this->db->query("SELECT rank_id FROM players WHERE id = '".$id."'")->result_array();
	}
	
	public function getRanks($id) {
		$this->load->database();
		return $this->db->query("SELECT `name`, `id` FROM guild_ranks WHERE guild_id = '".$id."'")->result_array();
	}
	
	public function getRanksID($id) {
		$this->load->database();
		return $this->db->query("SELECT `id` FROM guild_ranks WHERE guild_id = '".$id."'")->result_array();
	}
	
	public function changeRank($player, $rank) {
		$this->load->database();
		$this->db->query("UPDATE `players` SET `rank_id` = '".$rank."' WHERE `id` = '".$player."'");
	}
	
	public function kick($id) {
		$this->load->database();
		$this->db->query("UPDATE `players` SET `guildnick` = '', `rank_id` = '0' WHERE `id` = '".$id."'");
	}
	
	public function leave($id) {
		$this->load->database();
		$this->db->query("UPDATE `players` SET `guildnick` = '', `rank_id` = '0' WHERE `id` = '".$id."'");
	}
	
	public function changeMotd($id, $motd) {
		$this->load->database();
		$this->db->query("UPDATE `guilds` SET `motd` = \"".$motd."\" WHERE `id` = '".$id."'");
	}
	
	public function deleteGuild($id) {
		$this->load->database();
		$this->db->query("DELETE FROM `guilds` WHERE `id` = '".$id."'");
		//Triggers should do rest of the job.
			if(file_exists("public/guild_logos/".$id.".gif"))
				unlink("public/guild_logos/".$id.".gif");
	}
	public function canUpdate($tarkistus) {
		$this->load->database();
		$sql = $this->db->query("SELECT `online`, `name` FROM `players` WHERE `id` = ".$tarkistus."")->row_array();
		return $sql;	
	}
	
}
?>