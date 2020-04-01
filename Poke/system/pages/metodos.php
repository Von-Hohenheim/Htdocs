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

<div><div class='message'><div class="title">
	Doações
</div>
<div align="center" class="corpo-doar">
	<table width="50%" align="center" class="corpo-doar">
	<tr>
	<td width="25%"><center><a href="/index.php/p/v/doar"><img src="https://i.imgur.com/QeXsCzd.png" /><br/>Introdução</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/metodos"><img src="https://i.imgur.com/6qrrJSB.png" /><br/>Métodos</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/confirmar"><img src="https://i.imgur.com/QeXsCzd.png"/><br/>Confirmar</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/concluir"><img src="https://i.imgur.com/QeXsCzd.png" /><br/>Concluir</a></center></td>
	</tr>
	</table>
</div>
<center><h1>Métodos de Doação!</h1></center>

<div class="panel panel-default" style="margin-left:10px;margin-right:10px;border-color:#0070af;border-width: 3px; border-style: solid;">
  <div class="panel-heading" style="background-color:#0070af;color:#f6832a;">CAIXA Depósito/Transferência <span style="float:right;margin-right:2px;font-size:26px;margin-top:-5px;color:#e3e51f;">+30%</span></div>
  <div class="panel-body">
  <table width="60%" style="margin-left:25px;vertical-align: middle;">
	<tr>
	<td width="50%"><img src="https://i.imgur.com/07oHwNr.jpg" align="middle"/></td>
	<td width="50%"><b>Favorecido:</b> Rosely Ribeiro da Silva</br>
	<b>Agência:</b> 4756</br>
	<b>Conta:</b> 14244-5</br>
	<b>Operação:</b> 013</br>
	<b>CPF:</b> 820.091.984-68</td>
	</tr>
  </table>
  </div>
</div>

<div class="panel panel-default" style="margin-left:10px;margin-right:10px;border-color:#6ebb47;border-width: 3px; border-style: solid; border-radius:5px;">
  <div class="panel-heading" style="background-color:#6ebb47;color:#000;">PAGSEGURO Boleto/Transferência/Cartão de Crédito</div>
  <div class="panel-body">
  <table width="60%" style="margin-left:25px;vertical-align: middle;">
	<tr>
	<td width="50%"><img src="https://i.imgur.com/YVd3qLm.jpg" align="middle"/></td>
	<td width="50%"><form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">

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
<td width="25%">Pontos:</td>
<td>
<input name="item_quant_1" type="text" value="1" size="5" maxlength="5">
</td>
</tr>
<tr>
<td colspan="2"><br/>
<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="submit" alt="Pague com PagSeguro - &eacute; r&aacute;pido, gr&aacute;tis e seguro!" />
</td>
</tr>
</tbody></table></form>
	</td>
	</tr>
  </table>
  </div>
</div>

<div class="panel panel-default" style="margin-left:10px;margin-right:10px;border-color:#029be1;border-width: 3px; border-style: solid;">
  <div class="panel-heading" style="background-color:#029be1;color:#002d8a;">PAYPAL Transferência/Cartão de Crédito</div>
  <div class="panel-body">
  <table width="60%" style="margin-left:25px;vertical-align: middle;">
	<tr>
	<td width="50%"><img src="https://i.imgur.com/RIc19qK.jpg" align="middle"/></td>
	<td width="50%">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="T5JKRETS4TUPQ">
<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
</form>
</td>
	</tr>
  </table>
  </div>
</div>

<div class="panel panel-default" style="margin-left:10px;margin-right:10px;border-color:#21c25e;border-width: 3px; border-style: solid;">
  <div class="panel-heading" style="background-color:#21c25e;color:#fff;">PICPAY Transferência/Cartão de Crédito</div>
  <div class="panel-body">
  <table width="60%" style="margin-left:25px;vertical-align: middle;">
	<tr>
	<td width="50%"><img src="https://i.imgur.com/Pxnk168.jpg" align="middle"/></td>
	<td width="50%"><b>Favorecido:</b> Rosely Ribeiro da Silva</br>
	<b>Agência:</b> 4756</br>
	<b>Conta:</b> 14244-5</br>
	<b>Operação:</b> 013</br>
	<b>CPF:</b> 820.091.984-68</td>
	</tr>
  </table>
  </div>
</div>
<br/><center>
	<div class="alert alert-warning" style="width:80%;" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Lembre-se de <b>confirmar</b> sua doação!</div>
	
<br/>
<table witdh="200px"><tr>
<td width="33%"><form action="/index.php/p/v/doar" method="get"><button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-reply" aria-hidden="true"></i> Voltar.</button></form>
</td>
<td width="33%">&nbsp;</td>
<td width="33%">
<form action="/index.php/p/v/confirmar" method="get"><button class="btn btn-lg btn-success" type="submit">Prosseguir. <i class="fa fa-share" aria-hidden="true"></i></button></form></center>
</td></tr>
</table>
<br/>
  </div>
  </div>
  <?php } ?>
  