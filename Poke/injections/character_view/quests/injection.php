<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$characterPageQuests = array();
/* A list of quests for character/view page. It will be listed on the page as a table to show acomplished missions.
Array contains array of quests which includes STORAGE ID, STORAGE VALUE (Required to finish quest) and NAME 
To create new quest copy line accross and change values.
*/
$player = $GLOBALS['player'];
/* Eg. $characterPageQuests[] = array('storage'=>5000, 'value'=>1, 'name'=>'Demon Helmet Quest'); */

$characterPageQuests[] = array('storage'=>50901, 'value'=>1, 'name'=>'Parasect Quest');
$characterPageQuests[] = array('storage'=>50902, 'value'=>1, 'name'=>'Rattata Quest');
$characterPageQuests[] = array('storage'=>50903, 'value'=>1, 'name'=>'Darkness Stone Quest');
$characterPageQuests[] = array('storage'=>50904, 'value'=>1, 'name'=>'Underwater Quest');
$characterPageQuests[] = array('storage'=>50905, 'value'=>1, 'name'=>'Earth Stone Quest');
$characterPageQuests[] = array('storage'=>50906, 'value'=>1, 'name'=>'Coccon Stone Quest');
$characterPageQuests[] = array('storage'=>50907, 'value'=>1, 'name'=>'Venom Stone Quest');
$characterPageQuests[] = array('storage'=>50908, 'value'=>1, 'name'=>'Punch Stone Quest');
$characterPageQuests[] = array('storage'=>50922, 'value'=>1, 'name'=>'Zapdos Quest');
$characterPageQuests[] = array('storage'=>50923, 'value'=>1, 'name'=>'Moltres Quest');
$characterPageQuests[] = array('storage'=>50924, 'value'=>1, 'name'=>'Articuno Quest');
$characterPageQuests[] = array('storage'=>50925, 'value'=>1, 'name'=>'Psychic Quest');

 if(count($characterPageQuests) != 0) {
		echo "<div class='title'>Quests</div>";
		echo "<table class='info table'  width='400px'>";
		$SQL = POT::getInstance()->getDBHandle();
		foreach($characterPageQuests as $value) {
			$quest = $SQL->query("SELECT `value` FROM `player_storage` WHERE `player_id` = ".$player->getId()." AND `key` = '".$value['storage']."' AND `value` = '".$value['value']."'")->fetch();
			$status = ($quest) ? "true" : "false";
			echo "<tr><td width='90%'>".$value['name']."</td><td><center><img src='../../../public/images/$status.gif'></center></td></tr>";
		}
		echo "</table>";
	}
?>