<?php /* Smarty version 3.0rc1, created on 2020-03-16 17:47:42
         compiled from "templates/pokemasterx\elements/info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182375e6fbbbe44e158-03708421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72737c42a3a7fe168ae4b05fd40e9ae04c1164a5' => 
    array (
      0 => 'templates/pokemasterx\\elements/info.tpl',
      1 => 1584380861,
    ),
  ),
  'nocache_hash' => '182375e6fbbbe44e158-03708421',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="title">
	Server Status
</div>
<div class="info">
	<?php  $_smarty_tpl->tpl_vars['world'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('worlds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['world']->key => $_smarty_tpl->tpl_vars['world']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['world']->key;
?>
	
		<span class="glyphicon glyphicon-globe"></span> <b>Status:</b>  
		<?php if ($_smarty_tpl->getVariable('serverOnline')->value[$_smarty_tpl->getVariable('id')->value]){?>
			<font color='green'><b>Online</b></font><br />
			<span class="glyphicon glyphicon-signal"></span> <b>Uptime:</b> <?php echo $_smarty_tpl->getVariable('serverUptime')->value[$_smarty_tpl->getVariable('id')->value];?>
 <br />
			<span class="glyphicon glyphicon-user"></span> <b>Players:</b> <?php echo $_smarty_tpl->getVariable('serverPlayers')->value[$_smarty_tpl->getVariable('id')->value];?>
/1000 <br />
			<span class="glyphicon glyphicon-time"></span> <b>Server Save:</b> 06:00:00 MX <br />
			<span class="glyphicon glyphicon-download-alt"></span> <b>Download:</b> Client V1.5 <br />

		<?php }else{ ?>
			<font color='red'><b>Offline</b></font><br />
			<span class="glyphicon glyphicon-user"></span> <b>Players:</b> <?php echo $_smarty_tpl->getVariable('serverPlayers')->value[$_smarty_tpl->getVariable('id')->value];?>
/1000 <br />
			<span class="glyphicon glyphicon-time"></span> <b>Server Save:</b> 06:00:00 MX <br />
			<span class="glyphicon glyphicon-download-alt"></span> <b>Download:</b> Client V1.5 <br />
		<?php }?>
	<?php }} ?>
</div>
<br/>

<div class="title">
	Buscar Personaje
</div>
<div class="social"><form class="navbar-form1" role="search" method="post" action="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view" onSubmit="return validaFormTrans()">
			<div class="form-group1">
				<input type="text" name="search" value="" style="height:40px;" class="form-control" placeholder="Nombre del Entrenador"/>
			</div>
			<center><button type="submit" name="submit" style="font-size:16px;font-weight:bold;" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button></center>
		</form></div>
<br/>

<div class="title">
	Redes Sociales
</div>
<div class="social"><center>
<a href="https://discord.gg/T3b87Wf" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/discord_64.png" width="64px" height="64px"></img></a>
<a href="https://www.facebook.com/pokemonxmaster/" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/facebook_64.png" width="64px" height="64px"></img></a>
<a href="https://trello.com/b/JsUk0DO8/pokémasterx" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/instagram_64.png" width="64px" height="64px"></img></a>
<a href="#" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/youtube_64.png" width="64px" height="64px"></img></a>
<br/><br/>
<iframe src="https://discordapp.com/widget?id=422501711916302337&theme=dark" width="300" height="300" allowtransparency="true" frameborder="0"></iframe>
</center></div>

<br/>



<div class="title">
	Promociones
</div>
<div class="Promocion"><center>
<a href="#" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/promocao.png"></img></a>
</center></div><br/>
