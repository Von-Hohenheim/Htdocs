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
	<td width="25%"><center><a href="/index.php/p/v/metodos"><img src="https://i.imgur.com/QeXsCzd.png" /><br/>Métodos</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/confirmar"><img src="https://i.imgur.com/QeXsCzd.png"/><br/>Confirmar</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/concluir"><img src="https://i.imgur.com/6qrrJSB.png" /><br/>Concluir</a></center></td>
	</tr>
	</table>
</div>
  <div><center><h1>Parabéns treinador!</h1><br/>
  <p style="padding-left:25px;padding-right:25px;">Recebemos sua <b>solicitação de doação</b> com sucesso!<br/>
  <br/>
  Lembrando que as confirmações ocorrem de 15 minutos até 48 horas.<br/>
  Mas não se preocupe, continue sua batalha pokémon!<br/>
  Assim que <b>confirmado</b>, os pontos são enviados <b>automaticamente</b> para sua conta.<br/>
<br/><br/>
	<div class="alert alert-info" style="width:80%;" role="alert"><b><i class="fa fa-clock-o" aria-hidden="true"></i> Lembre-se que o prazo de envio é contabilizado em horas úteis.</b></div> 
	
     <br/></p>
	</center>
	<br/> 
<br/>
<center>
<td width="33%"><form action="http://pokemasterx.com/" method="get"><button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Concluir.</button></form>
</center>
<br/>
  </div>
  </div></div><?php } ?>
  