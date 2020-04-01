<?php

global $config;

require("config.php");

$ots = POT::getInstance();

$ots->connect(POT::DB_MYSQL, connection());

$SQL = $ots->getDBHandle();

$ide = new IDE;

$ide->requireLogin();

if($ide->isLogged()){

$accountName = $_SESSION['name'];

//$SQL->query('SELECT * FROM accounts WHERE name="'.$accountName.'"')->fetch();

?>

<form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">

<input type="hidden" name="email_cobranca" value="<?php echo $config['pagseguro']['email']; ?>">

<input type="hidden" name="tipo" value="CP">

<input type="hidden" name="moeda" value="BRL">

<input type="hidden" name="item_id_1" value="1">

<input type="hidden" name="item_descr_1" value="<?php echo $config['pagseguro']['produtoNome']; ?>">

<input type="hidden" name="item_valor_1" value="<?php echo $config['pagseguro']['produtoValor']; ?>">

<input type="hidden" name="item_frete_1" value="0">

<input type="hidden" name="item_peso_1" value="0">

<input type="hidden" name="ref_transacao" value="<?php echo $accountName; ?>">

<table border="0" cellpadding="4" cellspacing="1" width="100%" id="#estilo"><tbody>

<tr>

<th colspan="2">Escolha a quantidade de pontos que deseja comprar:</th>

</tr>

<tr>

<td width="25%">Sua conta:</td>

<td><strong><?php echo $accountName; ?></strong></td>

</tr>

<tr>

<td width="25%">Pontos:</td>

<td>

<input name="item_quant_1" type="text" value="1" size="5" maxlength="5">

</td>

</tr>

<tr>

<td colspan="2">

<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="submit" alt="Pague com PagSeguro - &eacute; r&aacute;pido, gr&aacute;tis e seguro!" />

</td>

</tr>

</tbody></table></form><?php } ?>