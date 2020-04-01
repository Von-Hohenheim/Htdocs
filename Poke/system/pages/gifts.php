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
<div style='margin: auto;'><div class='message'><div class="title">
	Doações
</div><div class='content'>


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

<table border="0" cellpadding="4" cellspacing="1" width="100%" id="#estilo" align="center"><tbody>

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
<br/>
<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="submit" alt="Pague com PagSeguro - &eacute; r&aacute;pido, gr&aacute;tis e seguro!" />

</td>
<center><img src="https://i.imgur.com/dexvRTY.png"/></center>
</tr>
<hr />
<br><li> <b> <font size="4"> Depósito/Transferência Bancária - <font size="5" color="GREEN"> Bônus de +30% </font> </font> </li></b> <br>
<b> Caixa Econômica - Conta Poupança </b> <br>  <!-- Defina Nome -->
<b> Nome: </b> Rosely Ribeiro da Silva <br>  <!-- Defina Nome -->
<b> Agência: </b> 4756 <br>  <!-- Defina Agencia -->
<b> Número da Conta: </b> 00014244-5 <br>  <!-- Defina nº da conta -->
<b> Operação: </b> 013 <br>  <!-- Defina Operação --> 
<b> CPF: </b> 820.091.984-68  <!-- Defina Operação --> 
<hr />
<center><img src="https://i.imgur.com/FDoTEfJ.png"/></center><br/>
<br><li> <b> <font size="4"> PagSeguro - <font size="3" color="gray"> Cartão de crédito/débito ou Transferência </font> </font> </li></b> <br>
<font color="red"><b> Observação: </b></font> <br>
Após efetuar o pagamento, sendo <b>PagSeguro</b>, <b>PayPal</b> ou <b>Depósito Bancário</b>, envie uma mensagem para nossa página <font color="green"><b><a href="https://www.facebook.com/pokemonxmaster/">PokeMasterX</a></b></font> com todos os dados do pagamento e o nome do personagem na qual deverá ser entregue a gratificação pelo donate. Não esqueça que ao fazer uma doação, você recebe uma gratificação como forma de agradecimento da equipe e também que você confirma ter lido, entendido e estar de acordo com nossos <a href="rules.php">Termos de Uso </a>.
      </div>
    </div>

</tbody></table></form> </div>
</div></div><?php } ?>