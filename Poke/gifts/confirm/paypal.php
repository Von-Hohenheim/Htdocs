<?PHP
require("config.php");
require("gifts/config/config.php");
$ots = POT::getInstance();
$ots->connect(POT::DB_MYSQL, connection());
$SQL = $ots->getDBHandle();
$custom = stripslashes(ucwords(strtolower(trim($_REQUEST['custom'])))); 
$session = stripslashes(ucwords(strtolower(trim($_REQUEST['session']))));  
$receiver_email = $_REQUEST['receiver_email'];  
$payment_status = $_REQUEST['payment_status'];  
$mc_gross = $_REQUEST['payment_gross'];  
$payer_email = $_REQUEST['payer_email']; 

if ($payment_status == "Completed" & $receiver_email == $config['donations']['paypal']['Mail'] & $mc_gross == $config['donations']['paypal']['Amount']) {  

$prem = $SQL->query("SELECT premium_points FROM accounts WHERE accounts.name = '".$custom."'")->fetch();  

$points = $prem['premium_points'] + $config['donations']['paypal']['Points'];  

$SQL->query("UPDATE accounts SET premium_points = '".$points."' WHERE name = '".$custom."'"); 

$SQL->query("INSERT INTO shop_donation_history (`id`, `method`, `receiver`, `buyer`, `account`, `points`, `date`) VALUES (NULL, 'PayPal', '".$config['donations']['paypal']['Mail']."', '".$session."', '".$custom."', '".$config['donations']['paypal']['Points']."', '".time()."');");

}  
else  
 {   
 echo("Error.");  
 }  
?>
