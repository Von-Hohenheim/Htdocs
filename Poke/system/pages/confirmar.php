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
	<td width="25%"><center><a href="/index.php/p/v/confirmar"><img src="https://i.imgur.com/6qrrJSB.png"/><br/>Confirmar</a></center></td>
	<td width="25%"><center><a href="/index.php/p/v/concluir"><img src="https://i.imgur.com/QeXsCzd.png" /><br/>Concluir</a></center></td>
	</tr>
	</table>
</div>

<table width="100%" style="margin: auto; align: center;">
	<tr>
	<td width=""></td>
	
	</tr>
</table>





	<br/> 
<br/>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="width:90%;align:center;position:center;margin:auto;padding:auto;">
    <div class="panel panel-default">
     <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <i class="fa fa-credit-card" aria-hidden="true"></i> Benefícios de ser um Doador
       </a>
      </h4>
     </div>
     <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <ul style="margin-left:15px;">
	   <li>Manter o servidor online sem lag.</li>
	   <li>Acompanhar de perto as atualizações e incentiva-las.</li>
	   <li>Ser recompensado com Emeralds.</li>
	   <li>Poder acessar lugares únicos e quests exclusivas.</li>
	   <li>Poder utilizar a loja in-game.</li>
	   
	   </ul>
      </div>
     </div>
    </div>

	<div class="panel panel-default">
     <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <i class="fa fa-user" aria-hidden="true"></i> Benefícios de ser Premium
       </a>
      </h4>
     </div>
     <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <ul style="margin-left:15px;">
    <li>Acesso a + de 15 hunts exclusivas.</li>
    <li>Tem 10% de chance a mais de aparecer shiny usando o shiny charm.</li>
    <li>Quando morre perde apenas 25% do xp que perderia.</li>
    <li>Tem 10% a mais de experiência (acumulativa com held's e afins).</li>
    <li>Não paga acesso as hunt's de Hoenn.</li>
    <li>Ganham 1 ponto a mais de chance da tower ao completar daily kill/catch.</li>
    <li>Ganham 1 chave de dungeon a mais ao completar daily kill/catch.</li>
    <li>Comprar outfits/moveis no shopping de Celadon.</li>
		</ul>
      </div>
     </div>
    </div>
   </div>
<br/>
<center><table witdh="200px"><tr>
<td width="33%"><form action="/index.php/p/v/metodos" method="get"><button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-reply" aria-hidden="true"></i> Não concordo.</button></form>
</td>
<td width="33%">&nbsp;</td>
<td width="33%">
<form action="/index.php/p/v/concluir" method="get"><button class="btn btn-lg btn-success" type="submit">Prosseguir. <i class="fa fa-share" aria-hidden="true"></i></button></form></center>
</td></tr>
</table>
<br/>
  </div>
  </div><?php } ?>
  