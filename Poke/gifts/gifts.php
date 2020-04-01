<script type="text/javascript">
	$(function() {
		$("#accordion").accordion({
			autoHeight: false,
			navigation: true
		});
	});
</script>
<?PHP
//Product Types
//Categories :
//
//[ 1 - Account Modifications ]
//1 - Premium
//2 - Remove Skull (ANY)
//3 - UnBan Account
//4 - Change Name
//
//[ 2 - Items ]
//5 - Items
//
//[ 3 - Container Fully of Items ]
//6 - Bag of Items
//7 - Backpack of Items
//
//[ 4 - Addons Items ]
//8 - Addon Items
//
//HOWTO PUT IMAGES FOR TYPES 1-4 [ Account Modifications ]
//Go to public/images/ folder and create a GIF image (Or put)
//With the ID of the type [See at the top of the script]
//Ex. Type (1) - Premium Account (public/images/1.gif)


//Variables
require("config.php");
include("config/functions.php");
require("config/config.php");
$this->load->helper("url");
$ots = POT::getInstance();
$ots->connect(POT::DB_MYSQL, connection());
$SQL = $ots->getDBHandle();
$SHOP = new shop;
$ide = new IDE;
$action = $this->uri->segment(4);
$categories = array(1 => 'Account Modifications', 2 => 'Items', 3 => 'Containers with Items', 4 => 'Addon Items');
if ($_SESSION['logged'] == 1) {
	if ($SHOP->isInstalled()) {
	if ($action == '') {
		if($ide->isAdmin()) {
					echo "<div class='toolbar' align='center'>";
					echo "<a href='".WEBSITE."/index.php/p/v/gifts/admin'>Shop Admin Panel</a>";
					echo "</div>";
		}
		alert("<b>REMEMBER:</b><br><br>All categories, <b>except for 'Containers with Items'</b>:<br><br>Receiver need to have space on his/her <b>BACKPACK</b> to receive item.");
		echo '<div id="accordion">';
		$i = 0;
			foreach($categories as $key=>$value) {
					echo '<h3><a href="#">'.$categories[$key].'</a></h3>
					<div>';
					 if($SQL->query('SELECT * FROM shop_offer WHERE category = '.$key.'')->fetch()) {
						echo '<table border="0" cellspacing="1" cellpadding="4" width="100%">
						 <tr>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Picture</td>
						  <td width="40%" class="white" style="text-align: center; font-weight: bold;">Product</td>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Points</td>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Action</td>
						 </tr>';
						 foreach($SQL->query('SELECT * FROM shop_offer WHERE category = '.$key.'') as $item) {
							if (is_int($i / 2))
								$bgcolor = "#ececec";
							else
								$bgcolor = "#ffffff";
							$i++;
							echo '<tr class="highlight" bgcolor="'.$bgcolor.'" style="text-align: center;">
							<td>';
							if($item['category'] == '1')
							$image = 'public/images/'.$item['type'].'.gif';
							else
							$image = 'public/images/items/'.$item['item'].'.gif';
								  if(!file_exists($image))
									echo 'NO IMAGE';
								  else
									echo '<img height="32px" width="32px" src="'.WEBSITE.'/'.$image.'"/>';
								echo '</td>
								<td><b>'.$item['name'].'</b><br>'.$item['description'].'</td>
								<td>'.$item['points'].'</td>
								<td><button type="submit" onClick="window.location.href=\''.WEBSITE.'/index.php/p/v/gifts/buy/'.$item['id'].'\';" class="ide_button">Buy Product</button></td>
								</tr>';
						 }
						 echo '</table></div>';
					}
					else {
						alert("This category doesn't have products.");
						echo '</div>';
					}
			}
		echo '</div>';
		echo '<br><center><font style="color: #4F82CB; font-weight: bold; font-size: 12px">You have: <font color="#4EBF37">'.$SHOP->points($_SESSION['name']).'</font> premium points.</font></center>';
	}
	elseif ($action == 'buy') {
		$product = $this->uri->segment(5);
		$productact = $this->uri->segment(6);
		if (!$product) {
			alert("You didn't have selected a product.");
			echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts">Go Back to Gift Shop</a></div>';
		}
		else {
			if($SQL->query('SELECT * FROM shop_offer WHERE id = '.$product.'')->fetch()) {
				$info = $SQL->query('SELECT * FROM shop_offer WHERE id = '.$product.'')->fetch();
				if($productact == '' || !$productact) {
						if ($SHOP->points($_SESSION['name']) < $info['points']) {
							alert("You don't have enough points to buy this product (<b>".$info['points']."</b>)");
			echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts">Go Back to Gift Shop</a></div>';
						}
						else {
							echo '<div id="accordion">';
							echo '<h3><a href="#">Product Selected</a></h3>
							<div>';
						echo '<table border="0" cellspacing="1" cellpadding="4" width="100%">
						 <tr>
						  <td width="25%" class="white" style="text-align: center; font-weight: bold;">Picture</td>
						  <td width="50%" class="white" style="text-align: center; font-weight: bold;">Product</td>
						  <td width="25%" class="white" style="text-align: center; font-weight: bold;">Points</td>
						 </tr>';
							echo '<tr class="highlight" style="text-align: center">
							<td>';
							if($info['category'] == '1')
							$image = 'public/images/'.$info['type'].'.gif';
							else
							$image = 'public/images/items/'.$info['item'].'.gif';
								  if(!file_exists($image))
									echo 'NO IMAGE';
								  else
									echo '<img height="32px" width="32px" src="'.WEBSITE.'/'.$image.'"/>';
								echo '</td>
								<td><b>'.$info['name'].'</b><br>'.$info['description'].'</td>
								<td>'.$info['points'].'</td>
								</tr>';
						 echo '</table></div>
								<h3><a href="#">Player Selection</a></h3>
								<div>
								<center><table border="0" cellspacing="7" cellpadding="4" width="50%">
								<tr>
								<td><form method="post" action="'.WEBSITE.'/index.php/p/v/gifts/buy/'.$info['id'].'/send">';
								if($info['type'] == '4') 
									echo 'Character to Change Name:';
								else
									echo 'Give item to player:';
								echo '</td>
								<td><select name="my_char">';
								foreach($SHOP->CharacterList($_SESSION['name']) as $row)
									echo '<option>'.$row['name'].'</option>';
								echo '</select></td>
								</tr>
								<tr>
								<td>';
								if($info['type'] == '4') 
									echo 'New Name:';
								else
									echo 'Or another player:';
								echo '</td>
								<td><input type="text" name="other_char" size="10"/></td>
								</tr>
								<tr>
								<td></td>
								<td><button type="submit" name="submit" value="true" class="ide_button">Buy Product</td>
								</tr></table></center></div></div>';
								echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/">Go Back to Gift Shop</a></div>';
						}
				}
				elseif ($productact == 'send') {
					if(!$_POST['submit'])
						header("Location: ".WEBSITE."/index.php/p/v/gifts");
					else {
					if($info['type'] != '4') {
						if($_POST['other_char']) {
							if($SQL->query('SELECT * FROM players WHERE name = "'.$_POST['other_char'].'"')->fetch()) {
								$destination = $_POST['other_char'];
								$send = true;
							} else {
								alert('<b>'.$_POST['other_char'].'</b> doesn\'t exists.');
								echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/buy/'.$info['id'].'">Go Back to Gift Shop</a></div>';
								$send = false;
							}
						}
						else {
							$destination = $_POST['my_char'];
							$send = true;
						}
					}
					else {
						$destination = $_POST['my_char'];
						$send = true;
					}
						
						if($send == true) {
							$errors = '';
							$processed = 0;
							if ($info['type'] == '1') {
								$processed = 1;
								$finish = true;
								$SHOP->AddPremium($destination,$info['count']);
							}
							elseif ($info['type'] == '2') {
								$skulltime = $SQL->query('SELECT skull,skulltime FROM players WHERE name = "'.$destination.'"')->fetch();
								if ($SHOP->isOnline($destination) == 1) {
									$errors .= 'Sorry, but <b>'.$destination.'</b> is On-Line right now.<br>';
									$finish = false;
								}
								elseif ($skulltime['skull'] == '0' && $skulltime['skulltime'] == '0') {
									$errors .= 'Sorry, but <b>'.$destination.'</b> doesn\'t have any skull.<br>';
									$finish = false;
								}
								else {
									$processed = 1;
									$finish = true;
									$SQL->query('UPDATE players SET skull = 0, skulltime = 0 WHERE name = "'.$destination.'"');
								}
							}
							elseif ($info['type'] == '3') {
								if ($SHOP->isOnline($destination) == 1) {
									$errors .= 'Sorry, but <b>'.$destination.'</b> is On-Line right now.<br>';
									$finish = false;
								}
								else {
									if ($SHOP->isBanned($destination)->fetch()) {
										$processed = 1;
										$finish = true;
										$SHOP->UnBan($destination);
									}
									else {
										$errors .= 'Sorry, but <b>'.$destination.'</b>\'s Account isn\'t banned at the moment.<br>';
										$finish = false;
									}
								}
							}
							elseif ($info['type'] == '4') {
								if ($SHOP->isOnline($destination) == 1) {
									$errors .= 'Sorry, but <b>'.$destination.'</b> is On-Line right now.<br>';
									$finish = false;
								}
								else {
									if ($SQL->query('SELECT * FROM players WHERE name = "'.$_POST['other_char'].'"')->fetch()) {
										$finish = false;
										$errors .= 'Sorry, but <b>'.$_POST['other_char'].'</b> already exists.<br>';
									}
									else {
										if(!$_POST['other_char']) {
											$finish = false;
											$errors .= 'Sorry, but you didn\'t put a new name for your character.<br>';
										}
										else {
											if (!preg_match('/[^A-Za-z]/', $_POST['other_char'])) {
												$processed = 1;
												$finish = true;
												$SQL->query('UPDATE players SET name = "'.$_POST['other_char'].'" WHERE name = "'.$destination.'"');
											}
											else {
												$finish = false;
												$errors .= 'Sorry, but <b>'.$_POST['other_char'].'</b> contains invalid characters (Use only: A-Z, a-z).<br>';
											}
										}
									}
								}
							}
							else {
								$finish = true;
							}
							if ($finish == true) {
							echo '<div style="text-align: center; font-size: 15px; color: #4EBF37; font-weight: bold;">Transaction Succesfull</div><br>';
							if($info['type'] == '4')
							echo '<center>You have changed the name of <b>'.$destination.'</b> to <b>'.$_POST['other_char'].'</b>.</center>';
							elseif($info['type'] == '3')
							echo '<center>You have UnBanned <b>'.$destination.'</b>\'s Account.</center>';
							else
							echo '<center>You have bought <b>'.$info['name'].'</b> and gave to <b>'.$destination.'</b>.</center>';
							echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts">Go Back to Gift Shop</a></div>';
							$SQL->query('UPDATE accounts SET premium_points = '.($SHOP->points($_SESSION['name']) - $info['points']).' WHERE name = "'.$_SESSION['name'].'"');
							$SQL->query('INSERT INTO shop_history (`id`, `product`, `session`, `player`, `date`, `processed`) VALUES (NULL, \''.$info['id'].'\',\''.$_SESSION['name'].'\', \''.$destination.'\', \''.time().'\',\''.$processed.'\')');;
							}
							else {
							alert($errors);
							echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/buy/'.$info['id'].'">Go Back to Gift Shop</a></div>';
							}
						}
					}
				}
			}
			else {
				header("Location: ".WEBSITE."/index.php/p/v/gifts");
			}
			echo '<br><center><font style="color: #4F82CB; font-weight: bold; font-size: 12px">You have: <font color="#4EBF37">'.$SHOP->points($_SESSION['name']).'</font> premium points.</font></center>';
		}
	}
	elseif ($action == 'history') {
		if ($SQL->query('SELECT * FROM shop_history WHERE session = "'.$_SESSION['name'].'" ORDER BY date DESC LIMIT 30')->fetch()) {
			echo '<div style="text-align: center; font-weight: bold;">Latest 30 Transactions</div>
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
			 <tr>
			  <td class="white" style="text-align: center; font-weight: bold;">Picture</td>
			  <td class="white" style="text-align: center; font-weight: bold;">Product</td>
			  <td class="white" style="text-align: center; font-weight: bold;">To</td>
			  <td class="white" style="text-align: center; font-weight: bold;">Date</td>
			  <td class="white" style="text-align: center; font-weight: bold;">Processed</td>
			 </tr>';
			 foreach($SQL->query('SELECT `z`.`player` AS `destination`, `z`.`date` AS `date`, `z`.`processed` AS `processed`, `o`.`category` AS `category`,`o`.`type` AS `type`,`o`.`item` AS `item`,`o`.`name` AS `name` FROM `shop_history` z LEFT JOIN `shop_offer` o ON `z`.`product` = `o`.`id` WHERE `z`.`session` = \''.$_SESSION['name'].'\' ORDER BY `z`.`date` DESC LIMIT 30') as $hist) {
				echo '<tr class="highlight" style="text-align: center"><td>';
				if($hist['category'] == '1')
				$image = 'public/images/'.$hist['type'].'.gif';
				else
				$image = 'public/images/items/'.$hist['item'].'.gif';
					  if(!file_exists($image))
						echo 'NO IMAGE';
					  else
						echo '<img height="32px" width="32px" src="'.WEBSITE.'/'.$image.'"/>';
					echo '</td>
					<td>'.$hist['name'].'</td>
					<td>'.$hist['destination'].'</td>
					<td>'.date("d-m-Y - H:i a", $hist["date"]).'</td>';
						if ($hist['processed'] == '1')
							echo '<td><img src="'.WEBSITE.'/public/images/true.gif"/></td>';
						else
							echo '<td><img src="'.WEBSITE.'/public/images/false.gif"/></td>';
					echo '</tr>';
			 }
			 echo '</table>';
		}
		else {
			alert('You didn\'t made any transactions');
		}
	}
	elseif ($action == 'donate') {
		$show = $this->uri->segment(5);
			if ($show == 'history') {
				if ($SQL->query('SELECT * FROM shop_donation_history WHERE buyer = "'.$_SESSION['name'].'" ORDER BY date DESC LIMIT 30')->fetch()) {
			echo '<div style="text-align: center; font-weight: bold;">Latest 30 Donations</div>
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
			 <tr>
			  <td class="white" style="text-align: center; font-weight: bold;">Method</td>
			  <td class="white" style="text-align: center; font-weight: bold;">ID/Mail</td>
			  <td class="white" style="text-align: center; font-weight: bold;">To Account</td>
			  <td class="white" style="text-align: center; font-weight: bold;">Points Added</td>
			  <td class="white" style="text-align: center; font-weight: bold;">Date</td>
			 </tr>';
			 foreach($SQL->query('SELECT * FROM shop_donation_history WHERE buyer = "'.$_SESSION['name'].'" ORDER BY date DESC LIMIT 30') as $hist) {
				echo '<tr class="highlight" style="text-align: center">
				<td>'; echo ($hist['method'] == 'PayPal')?'<img src="https://www.paypal.com/en_US/i/logo/paypal_logo.gif" height="50px" width="100px">':($hist['method'] == 'ContenidoPago')?'<img src="http://www.contenidopago.com/img/logo_ft.jpg" height="50px" width="100px">':''; echo '</td>
				<td>'.$hist['receiver'].'</td>
				<td>'.$hist['account'].'</td>
				<td>'.$hist['points'].'</td>
				<td>'.date("d-m-Y - H:i a", $hist["date"]).'</td>
				</tr>';
			 }
			 echo '</table>';
		}
		else {
			alert('You didn\'t donated');
		}
			}
			elseif (!$show || $show == '') {
				alert("".$config['server_name']."'s Administration <b>is not responsible</b> for <b>cases of loss of products</b>.<br><br> ".$config['server_name']."'s Administration <b>is responsible</b> for <b>cases of loss of points which have been sent to users</b>.");
				echo '<div id="accordion">';
					foreach ($config['donations']['methods'] as $method => $active) {
						if ($active == true) {
							echo '<h3><a href="#">'.$method.'</a></h3>
				<div>';
					if ($method == 'ContenidoPago') {
						alert("This brand new system consists on <b>donations by SMS</b>.<br>
						After donating you will receive <b>".$config['donations']['contenidopago']['Points']." Points</b>.<br><br>
						<b>REMEMBER:</b><br>
						You need to have <b>enough credit</b> to send <u>SMS</u>.<br><br>
						You <b>MUST</b> fill the <b>Account Name</b> and the <b>Code Received</b> fields with <u>a valid account name</u> and <u>a valid code</u>.");
						if(!isset($_POST['mysubmit'])) {
						echo '<form method="post" action="" >
						  <fieldset style="border:1px solid #990000; width:450px; margin:auto;">
							<legend style="font-weight:bold;font-size:12px;">Automatic SMS Donation</legend>
							<ol style="list-style:none;">
								<li style="padding-bottom:5px;"><label style="width:100px;float:left;text-align:left;">Account Name:</label><input type="text" style="border:1px solid #CCCCCC;" size="30" name="name" /></li>
								<li style="padding-bottom:5px;"><label style="width:100px;float:left;text-align:left;">Code received:</label><input type="text" style="border:1px solid #CCCCCC;" size="30" name="codigo" /></li>
							   
							</ol>
							<center><input type="submit"   name="mysubmit" style="padding:3px;margin-bottom:10px;color:#FFFFFF;background-color:#990000;border:1px solid #000000;" value="Enviar" /></center>
						  </fieldset>
					</form>';
						}
						else {
							$codigo=$_POST['codigo'];
							$name=$_POST['name'];
							$QueryString  = "LinkUrl=http://".urlencode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
							$QueryString .= "&codigo=" .urlencode($codigo);
							$QueryString .= "&idservicio=" .$config['donations']['contenidopago']['Product'];


							if(intval(get_cfg_var('allow_url_fopen')) && function_exists('file_get_contents')) {
								$result=@file_get_contents("http://contenidopago.com/codigoval.php?".$QueryString); 
							}
							elseif(intval(get_cfg_var('allow_url_fopen')) && function_exists('file')) {
								if($content = @file("http://contenidopago.com/codigoval.php?".$QueryString)) 
								  $result=@join('', $content);
							}
							elseif(function_exists('curl_init')) {
								$ch = curl_init ("http://contenidopago.com/codigoval.php?".$QueryString);
								curl_setopt ($ch, CURLOPT_HEADER, 0);
								curl_exec ($ch);

								if(curl_error($ch))
									alert("Error processing request");

								curl_close ($ch);
							}
							else {
								alert("It appears that your web host has disabled all functions for handling remote pages and as a result the BackLinks software will not function on your web page. Please contact your web host for more information.");
							}

							if ($result =='ok')
							{

							if(!(empty($name)))
							{
								if(!$SQL->query("SELECT * FROM accounts WHERE name = '".$name."'")->fetch())
								{
									alert('This username does not exist: <font color="blue">'.$name.'</font>');	
								}
								else {
								$SQL->query("UPDATE accounts SET premium_points = premium_points + ".$config['donations']['contenidopago']['Points']." WHERE name = '".$name."'");
								alert("Codigo : $codigo validado, puntos sumados correctamente");
								$SQL->query("INSERT INTO shop_donation_history (`id`, `method`, `receiver`, `buyer`, `account`, `points`, `date`) VALUES (NULL, 'ContenidoPago', '".$config['donations']['contenidopago']['Product']."', '".$_SESSION['name']."', '".$name."', '".$config['donations']['contenidopago']['Points']."', '".time()."');");	
								}
							}
							else {

							  alert('You did not set the user!'); 
							 } 
									
							}

							if ($result =='no')
							{
							alert('El codigo no es valido o ya esta usado');
							}
						}
						echo '<center><iframe src ="http://www.contenidopago.com/prom/microcodigo.php" width="270px" height="340px" frameborder="0">
						<p>Your browser does not support iframes.</p>
						</iframe></center>';
					}
					elseif ($method == 'PayPal') {
						alert("The donation costs <b>".$config['donations']['paypal']['Amount']." ".$config['donations']['paypal']['Money']."  (incl. VAT)</b>.<br>
						After the donation you will receive a total of <b>".$config['donations']['paypal']['Points']." points</b> automatically.<br><br>
						<b>REMEMBER:</b><br>
						You need a <u>creditcard</u> <b>or</b> a <u>PayPal account</u> with a minimun of <b>".$config['donations']['paypal']['Amount']." ".$config['donations']['paypal']['Money']."</b>.<br><br>
						You <b>MUST</b> fill the <b>Account Name</b> with a <u>valid one</u>.");
						echo '<center><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_donations">
						<input type="hidden" name="business" value="'.$config['donations']['paypal']['Mail'].'">
						<input type="hidden" name="lc" value="GB">
						<input type="hidden" name="item_name" value="'.$config['donations']['paypal']['Product'].'">
						<b>Account Name:</b> <input type="text"  name="custom" value="">
						<input type="hidden" name="item_number" value="1">
						<input type="hidden" name="amount" value="'.$config['donations']['paypal']['Amount'].'">
						<input type="hidden" name="currency_code" value="'.$config['donations']['paypal']['Money'].'">
						<input type="hidden" name="no_note" value="0">
						<input type="hidden" name="no_shipping" value="0">
						<input type="hidden" name="notify_url" value="'.WEBSITE.'index.php/p/v/paypal">
						<input type="hidden" name="return" value="'.WEBSITE.'">
	<input type="hidden" name="session" value="'.$_SESSION['name'].'">
						<input type="hidden" name="rm" value="0">
						<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG_global.gif:NonHosted"><br>
						<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form></center>';
					}
		echo '</div>';
				}
			}
		echo '</div>';
			}
			else {
				header("Location: ".WEBSITE."/index.php/p/v/gifts/donate");
			}
	}
	elseif ($action == 'admin') {
			if($ide->isAdmin()) {
				$manage = $this->uri->segment(5);
					echo "<div class='toolbar' align='center'>";
					echo "<a href='".WEBSITE."/index.php/p/v/gifts/admin/add/1'>Add new Product</a> | ";
					echo "<a href='".WEBSITE."/index.php/p/v/gifts/admin/delete'>Delete Existing Product</a> | ";
					echo "<a href='".WEBSITE."/index.php/p/v/gifts/admin/points'>Add/Remove Points to Player</a>";
					echo "</div>";
					
						if ($manage == '' || !$manage) {
							echo '<center>Welcome to Shop Admin Panel</center>';
						}
						elseif ($manage == 'add') {
						$types[1] = array(1 => 'Premium Account', 2 => 'Remove Skull', 3 => 'UnBan Account', 4 => 'Change Name');
						$types[2] = array(5 => 'Item');
						$types[3] = array(6 => 'Bag with Items', 7 => 'Backpack with Items');
						$types[4] = array(8 => 'Addon Items');
						$step = $this->uri->segment(6);
							if ($step == '1') {
								echo '<form method="post" action="'.WEBSITE.'/index.php/p/v/gifts/admin/add/2">Select Category: <select name="category">';
								foreach($categories as $key=>$value) {
									echo '<option value="'.$key.'">'.$categories[$key].'</option>';
								}
								echo '</select> <button type="submit" class="ide_button">Select Category</form>';
							}
							elseif ($step == '2' && $_POST['category']) {
								echo '<form method="post" action="'.WEBSITE.'/index.php/p/v/gifts/admin/add/3">
								<input type="hidden" name="category" value="'.$_POST['category'].'"/>
								Select Type: <select name="type">';
								foreach($types[$_POST['category']] as $key=>$value) {
									echo '<option value="'.$key.'">'.$types[$_POST['category']][$key].'</option>';
								}
								echo '</select> <button type="submit" class="ide_button">Select Type</form>';
							}
							elseif ($step == '3' && $_POST['category'] && $_POST['type']) {
									echo '<form method="post" action="'.WEBSITE.'/index.php/p/v/gifts/admin/add/4">
									<input type="hidden" name="category" value="'.$_POST['category'].'"/>
									<input type="hidden" name="type" value="'.$_POST['type'].'"/>
									<table border="0" cellspacing="1" cellpadding="4" width="100%">
										<tr>
										<td width="25%">Product Name:</td>
										<td width="25%"><input name="name" type="text" size="18" maxlength="256" /></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">The name of the product</td>
										</tr>
										<tr>
										<td width="25%">Point Cost:</td>
										<td width="25%"><input name="points" type="text" value="0" size="10" maxlength="11" /></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">Cost of the Product (Points)</td>
										</tr>';
									if ($_POST['type'] == '1') {
										echo '<tr>
										<td width="25%">Premium Days:</td>
										<td width="25%"><input name="count" type="text" value="0" size="1" maxlength="3" /></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">Days of Premium Account</td>
										</tr>';
									}
									elseif ($_POST['type'] == '5' || $_POST['type'] == '6' || $_POST['type'] == '7' || $_POST['type'] == '8') {
										echo '<tr>
										<td width="25%">Item ID:</td>
										<td width="25%"><input name="item" type="text" value="0" size="3" maxlength="5" /></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">ID of item to give</td>
										</tr>
										<tr>
										<td width="25%">Count:</td>
										<td width="25%"><input name="count" type="text" value="0" size="1" maxlength="3" /></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">Count of item (max. 100) (When selecting \'Backpack of Items\' or \'Bag of Items\' type, the ITEM with that count will fill the container!)</td>
										</tr>';
									}
									echo '<tr>
										<td width="25%">Product Description:</td>
										<td width="25%"><textarea style="width: 120px; height: 80px;" name="description"></textarea></td>
										<td width="50%" style="font-size: 9px; color: red; font-weight: bold;">Description (Shown of \'Gifts\' Page)</td>
										</tr>
										</table>
										<br><center><button type="submit" name="done" value="true" class="ide_button">Add Product</form></center>';
							}
							elseif ($step == '4' && $_POST['done'] == 'true') {
							$errors = '';
								if ($_POST['points'] || $_POST['item'] || $_POST['count']) {
									if($_POST['points']) {
										if (!(!preg_match('/[^0-9]/', $_POST['points'])))
											$errors .= '1';
									}
									elseif($_POST['item']) {
										if (!(!preg_match('/[^0-9]/', $_POST['item'])))
											$errors .= '2';
									}
									elseif($_POST['count']) {
										if (!(!preg_match('/[^0-9]/', $_POST['count'])))
											$errors .= '3';
									}
								}
								if ($errors == '') {
									echo '<div style="text-align: center; font-size: 15px; color: #4EBF37; font-weight: bold;">Product Added!</div><br>
										<table border="0" cellspacing="1" cellpadding="4" width="100%">
										<tr class="highlight">
										<td style="font-weight: bold;" width="50%">Product Name:</td>
										<td width="50%">'.$_POST['name'].'</td>
										</tr>
										<tr class="highlight">
										<td style="font-weight: bold;" width="50%">Category:</td>
										<td width="50%">'.$categories[$_POST['category']].'</td>
										</tr>
										<tr class="highlight">
										<td style="font-weight: bold;" width="50%">Type:</td>
										<td width="50%">'.$types[$_POST['category']][$_POST['type']].'</td>
										</tr>
										<tr class="highlight">
										<td style="font-weight: bold;" width="50%">Point Cost:</td>
										<td width="50%">'.$_POST['points'].'</td>
										</tr>';
										if($_POST['type'] == '1') {
											echo '<tr class="highlight"><td style="font-weight: bold;" width="50%">Premium Days:</td>
											<td width="50%">'.$_POST['count'].'</td>
											</tr>';
										}
										elseif ($_POST['type'] == '5' || $_POST['type'] == '6' || $_POST['type'] == '7' || $_POST['type'] == '8') {
											echo '<tr class="highlight"><td style="font-weight: bold;" width="50%">Item ID:</td>
											<td width="50%">'.$_POST['item'].'</td>
											</tr>
											<tr class="highlight"><td style="font-weight: bold;" width="50%">Count:</td>
											<td width="50%">'.$_POST['count'].'</td>
											</tr>';
										}
										echo '<tr class="highlight"><td style="font-weight: bold;" width="50%">Description:</td>
											<td width="50%">'.$_POST['description'].'</td>
											</tr></table>';
										$PostItem = (!isset($_POST['item']))?'0':$_POST['item'];
										$PostCount = (!isset($_POST['count']))?'0':$_POST['count'];
										$SQL->query("INSERT INTO shop_offer (`id`, `points`, `category`, `type`, `item`, `count`, `description`, `name`) VALUES (NULL, '".$_POST['points']."', '".$_POST['category']."', '".$_POST['type']."', '".$PostItem."', '".$PostCount."', '".$_POST['description']."', '".$_POST['name']."')");
									echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/admin">Go Back to Shop Admin</a></div>';
								}
								else {
									alert('Sorry but 1 or more spaces contains invalid characters.');
									echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/admin">Go Back to Shop Admin</a></div>';
								}
							}
							else {
								header("Location: ".WEBSITE."/index.php/p/v/gifts/admin/add/1");
							}
						}
						elseif ($manage == 'delete') {
							$product = $this->uri->segment(6);
							if (!$product) {
								echo '<div id="accordion">';
			$i = 0;
			foreach($categories as $key=>$value) {
					echo '<h3><a href="#">'.$categories[$key].'</a></h3>
					<div>';
					 if($SQL->query('SELECT * FROM shop_offer WHERE category = '.$key.'')->fetch()) {
						echo '<table border="0" cellspacing="1" cellpadding="4" width="100%">
						 <tr>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Picture</td>
						  <td width="40%" class="white" style="text-align: center; font-weight: bold;">Product</td>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Points</td>
						  <td width="20%" class="white" style="text-align: center; font-weight: bold;">Action</td>
						 </tr>';
						 foreach($SQL->query('SELECT * FROM shop_offer WHERE category = '.$key.'') as $item) {
							if (is_int($i / 2))
								$bgcolor = "#ececec";
							else
								$bgcolor = "#ffffff";
							$i++;
							echo '<tr class="highlight" bgcolor="'.$bgcolor.'" style="text-align: center;">
							<td>';
							if($item['category'] == '1')
							$image = 'public/images/'.$item['type'].'.gif';
							else
							$image = 'public/images/items/'.$item['item'].'.gif';
								  if(!file_exists($image))
									echo 'NO IMAGE';
								  else
									echo '<img height="32px" width="32px" src="'.WEBSITE.'/'.$image.'"/>';
								echo '</td>
								<td><b>'.$item['name'].'</b><br>'.$item['description'].'</td>
								<td>'.$item['points'].'</td>
								<td><button type="submit" onClick="window.location.href=\''.WEBSITE.'/index.php/p/v/gifts/admin/delete/'.$item['id'].'\';" class="ide_button">Delete Offer</button></td>
								</tr>';
						 }
						 echo '</table></div>';
					}
					else {
						alert("This category doesn't have products.");
						echo '</div>';
					}
			}
		echo '</div>';
							}
							else {
								if($SQL->query('SELECT * FROM shop_offer WHERE id = '.$product.'')->fetch()) {
									$SQL->query('DELETE FROM shop_offer WHERE id = '.$product.'');
									$SQL->query('DELETE FROM shop_history WHERE product = '.$product.'');
									echo '<div style="text-align: center; font-size: 15px; color: #4EBF37; font-weight: bold;">Product Deleted!</div><br>
									<center>The product ID <b>'.$product.'</b> has been deleted from DataBase.</center>';
									echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/admin">Go Back to Shop Admin</a></div>';
								}
								else {
									header("Location: ".WEBSITE."/index.php/p/v/gifts/admin/delete");
								}
							}
						}
						elseif ($manage == 'points') {
							if (!isset($_POST['submit'])) {
								echo '<div id="accordion">
								<h3><a href="#">Add Points</a></h3>
								<div>
								<table border="0" cellspacing="1" cellpadding="4" width="100%">
								<tr>
										<form method="post" action="'.$_SERVER['PHP_SELF'].'">
										<td>Select Player:</td>
										<td><select name="player">';
										foreach($SQL->query('SELECT * FROM players ORDER BY name DESC') as $player) {
											echo '<option value="'.$player['id'].'">'.$player['name'].'</option>';
										}
										echo '</select></td>
										</tr><tr>
										<td>Or Type a Name:</td>
										<td><input type="text" name="other_char" size="10"/></td>
										</tr><tr>
										<td>Points to Add:</td>
										<td><input type="text" name="points" size="10"/></td>
										</tr><tr>
										<td></td>
										<td><button type="submit" name="submit" value="add" class="ide_button"><button class="ide_button">Add Points</button></td>
										</tr>
										</table></form>
								</div>
								<h3><a href="#">Remove Points</a></h3>
								<div>
								<table border="0" cellspacing="1" cellpadding="4" width="100%">
								<tr>
										<form method="post" action="'.$_SERVER['PHP_SELF'].'">
										<td>Select Player:</td>
										<td><select name="player">';
										foreach($SQL->query('SELECT * FROM players ORDER BY name DESC') as $player) {
											echo '<option value="'.$player['id'].'">'.$player['name'].'</option>';
										}
										echo '</select></td>
										</tr><tr>
										<td>Or Type a Name:</td>
										<td><input type="text" name="other_char" size="10"/></td>
										</tr><tr>
										<td>Points to Remove:</td>
										<td><input type="text" name="points" size="10"/></td>
										</tr><tr>
										<td></td>
										<td><button type="submit" name="submit" value="remove" class="ide_button"><button class="ide_button">Remove Points</button></td>
										</tr>
										</table></form>
								</div>
								</div>';
							}
							else {
							$errors = "";
								if(!isset($_POST['other_char']) || $_POST['other_char'] == '') {
									$destination = $_POST['player'];
								}
								else {
									$ID = $SQL->query('SELECT id FROM players WHERE name = "'.$_POST['other_char'].'"')->fetch();
										if($ID)
											$destination = $ID['id'];
										else
											$errors .= "Player <b>".$_POST['other_char']."</b> doesn't exists.<br>";
								}
								if($_POST['points'] == '0' || $_POST['points'] < '0')
									$errors .= "Points quantity must be higher than 0!<br>";
								elseif (!(!preg_match('/[^0-9]/', $_POST['points'])))
									$errors .= "Point quantity must be a <b>numeric value</b>!";
									
								if(isset($destination)) {
									$player = $SQL->query('SELECT name FROM players WHERE id = "'.$destination.'"')->fetch();
									$account = $SHOP->getPlayerAccount($player['name'])->fetch();
										if ($_POST['submit'] == 'remove') {
											if ($SHOP->points($account['name']) == '0' || $SHOP->points($account['name']) < '0')
												$errors .= "Player <b>".$player['name']."</b> doesn't have any points.<br>";
										}
								}
								
												if ($errors == '') {
												$player = $SQL->query('SELECT name FROM players WHERE id = "'.$destination.'"')->fetch();
												$account = $SHOP->getPlayerAccount($player['name'])->fetch();
												echo '<div style="text-align: center; font-size: 15px; color: #4EBF37; font-weight: bold;">Points '; echo ($_POST['submit'] == 'add')?'added':'removed'; echo '!</div><br>
												<center>You have '; echo ($_POST['submit'] == 'add')?'added':'removed'; echo ' <b>'.$_POST['points'].'</b> points to <b>'.$player['name'].'</b>\'s Account.</center>';
												echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/admin/points">Go Back to Points Manage</a></div>';
												if($_POST['submit'] == 'add')
													$SQL->query('UPDATE accounts SET premium_points = '.($SHOP->points($account['name']) + $_POST['points']).' WHERE name = "'.$account['name'].'"');
												elseif($_POST['submit'] == 'remove')
													$SQL->query('UPDATE accounts SET premium_points = '.($SHOP->points($account['name']) - $_POST['points']).' WHERE name = "'.$account['name'].'"');
												}
												else {
													alert($errors);
													echo '<div align="right"><a href="'.WEBSITE.'/index.php/p/v/gifts/admin/points">Go Back to Points Manage</a></div>';
												}
							}
						}
						else {
							header("Location: ".WEBSITE."/index.php/p/v/gifts/admin");
						}
			}
			else {
				header("Location: ".WEBSITE."/index.php");
			}
	}
	else {
		header("Location: ".WEBSITE."/index.php/p/v/gifts");
	}
	}
		elseif(!$SHOP->isInstalled()) {
		if($ide->isAdmin()) {
			$SHOP->install();
			echo '<div style="text-align: center; font-size: 15px; color: #4EBF37; font-weight: bold;">Shop System Succesfully Installed!</div><br>
				<center>Your shop system has been installed succesfully!! click <a href="'.WEBSITE.'/index.php/p/v/gifts">HERE</a> to see your shop</center>';
		}
		else {
			header("Location: ".WEBSITE."/index.php");
		}

		}
}
else {
	header("Location: ".WEBSITE."/index.php");
}
?>