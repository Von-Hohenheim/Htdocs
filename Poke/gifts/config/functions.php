<?php

	class shop {
		function connect() {
			$ots = POT::getInstance();
			$ots->connect(POT::DB_MYSQL, connection());
		return $ots->getDBHandle();
		}
		
		function isInstalled() {
		require('config.php');
			$con = mysql_connect($config['sekai']['host'], $config['sekai']['root'], $config['sekai']['sekai']);
			mysql_select_db($config['sekai']['sekai'],$con);
			if(mysql_query("SELECT * FROM shop_offer,shop_history"))
				return true;
			else
				return false;
		}
		
		function points($account) {
			$SQL = $this->connect();
			$points = $SQL->query('SELECT premium_points FROM accounts WHERE name = "'.$account.'"')->fetch();
			return $points['premium_points'];
		}
		
		function getPlayerAccount($name) {
			$SQL = $this->connect();
			$player = $SQL->query('SELECT account_id FROM players WHERE name = "'.$name.'"')->fetch();
			return $SQL->query('SELECT * from accounts WHERE id = '.$player['account_id'].'');
		}
		
		function AddPremium($name,$days) {
			$SQL = $this->connect();
			$account = $this->getPlayerAccount($name)->fetch();
			return $SQL->query('UPDATE accounts SET premdays = (premdays + '.$days.') WHERE name = "'.$account['name'].'"');
		}
		
		function CharacterList($account) {
			$SQL = $this->connect();
			$id = $SQL->query('SELECT id FROM accounts WHERE name = "'.$account.'"')->fetch();
			return $SQL->query('SELECT * FROM players WHERE account_id = '.$id['id'].'');
		}
		
		function isOnline($name) {
			$SQL = $this->connect();
			$player = $SQL->query('SELECT online FROM players WHERE name = "'.$name.'"')->fetch();
			return $player['online'];
		}
		
		
		function isBanned($name) {
			$SQL = $this->connect();
			$ID = $this->getPlayerAccount($name)->fetch();
			return $SQL->query('SELECT * FROM bans WHERE value = '.$ID['id'].'');
		}
		
		function UnBan($name) {
			$SQL = $this->connect();
			$ID = $this->getPlayerAccount($name)->fetch();
			return $SQL->query('DELETE FROM bans WHERE value = '.$ID['id'].'');
		}
		
		function execute_file($file) {
			if (!file_exists($file)) {
			$this->last_error = "The file $file does not exist.";
			return false;
			}
			$str = file_get_contents($file);
			if (!$str) {
			$this->last_error = "Unable to read the contents of $file.";
			return false;
			}

			// split all the queries into an array
			$quote = '';
			$line = '';
			$sql = array();
			$ignoreNextChar = '';
			for ($i = 0; $i < strlen($str); $i++) {
			if ( !$ignoreNextChar ) {
			$char = substr($str, $i, 1);
			$line .= $char;
			if ($char == ';' && $quote == '') {
			$sql[] = $line;
			$line = '';
			} else if ( $char == '\\' ) {
			// Escape char; ignore the next char in the string
			$ignoreNextChar = TRUE;
			} else if ($char == '"' || $char == "'" || $char == '`') {
			if ( $quote == '' ) // Start of a new quoted string; ends with same quote char
			$quote = $char;
			else if ( $char == $quote ) // Current char matches quote char; quoted string ends
			$quote = '';
			}
			}
			else
			$ignoreNextChar = FALSE;
			}

			if ($quote != '') return false;

			foreach ($sql as $query) {
			if (!empty($query)) {
			$r = mysql_query($query);

			if (!$r) {
			$this->last_error = mysql_error();
			return false;
			}
			}
			}
			return true;

		} 
		
		function install() {
			$SQL = $this->connect();
			if ($this->isInstalled())
				return false;
			else
				return $this->execute_file("gifts/config/Shop.sql");
		}
	}
?>