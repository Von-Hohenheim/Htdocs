<?php
require("../../config.php");
require("../config/config.php");
if (isset($_POST['mysubmit']))
{

$QueryString  = "LinkUrl=".urlencode((($_SERVER['HTTPS']=='on')?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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


if ($result=='ok')
{

if(!(empty($name)))
{
    if(!$SQL->query("SELECT * FROM accounts WHERE name = '".$name."'"))
	{
        alert('This username does not exist: <font color="blue">'.$name.'</font>');	
	}
	else {
	$SQL->query("UPDATE accounts SET premium_points = premium_points + ".$config['donations']['contenidopago']['Points']." WHERE name = '".$name."'");
	alert("Codigo : $codigo validado, puntos sumados correctamente");
	$SQL->query("INSERT INTO shop_donation_history (`id`, `method`, `receiver`, `buyer`, `account`, `points`, `date`) VALUES (NULL, 'ContenidoPago', '".$config['donations']['paypal']['Mail']."', '".$name."', '".$_SESSION['name']."', '".$config['donations']['contenidopago']['Points']."', '".time()."');");	
	}
}
else {

  alert('You did not set the user!'); 
 } 
		
}

if ($result=='no')
{
alert('El codigo no es valido o ya esta usado');
}

} else
{
?>
<p id="instructions">Put your account name and the code received from SMS</p>
        
<form method="post" action="" id="fo3" name="fo3" >
      <fieldset style="border:1px solid #990000; width:450px; margin:auto;">
        <legend style="font-weight:bold;font-size:12px;">Automatic SMS Donation</legend>
        <ol style="list-style:none;">
            <li style="padding-bottom:5px;"><label style="width:100px;float:left;text-align:left;">Account Name:</label><input type="text" style="border:1px solid #CCCCCC;" size="30" name="name" /></li>
            <li style="padding-bottom:5px;"><label style="width:100px;float:left;text-align:left;">Code received:</label><input type="text" style="border:1px solid #CCCCCC;" size="30" name="codigo" /></li>
           
        </ol>
        <input type="submit"   name="mysubmit" style="padding:3px;color:#FFFFFF;background-color:#990000;border:1px solid #000000;" value="Enviar" />
      </fieldset>
</div>
</form>

<?php
}
?>