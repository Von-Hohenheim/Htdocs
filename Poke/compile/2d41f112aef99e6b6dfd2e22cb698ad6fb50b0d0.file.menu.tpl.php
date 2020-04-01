<?php /* Smarty version 3.0rc1, created on 2014-01-25 16:14:16
         compiled from "templates/giren\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2256352e3e2d8922a78-44264207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d41f112aef99e6b6dfd2e22cb698ad6fb50b0d0' => 
    array (
      0 => 'templates/giren\\menu.tpl',
      1 => 1390666443,
    ),
  ),
  'nocache_hash' => '2256352e3e2d8922a78-44264207',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand visible-xs" href="#"><?php echo $_smarty_tpl->getVariable('server_name')->value;?>
</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li<?php if ($_smarty_tpl->getVariable('controller')->value==''||$_smarty_tpl->getVariable('controller')->value=="home"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
">Inicio</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Comunidade <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="view"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">Personagens</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="online"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/online">Jogadores online</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="highscores"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/highscores">Pontuação</a></li>
					<li class="divider"></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="guilds"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/guilds">Guildas</a></li>
				</ul>
			</li>
			<li><a href="#">Shop</a></li>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Personagem">
			</div>
			<button type="submit" class="btn btn-default">Procurar</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<?php if ($_smarty_tpl->getVariable('logged')->value==1){?>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Conta</a></li>
			<?php }else{ ?>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="create"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create">Crie sua conta</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="login"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login">Logar</a></li>
			<?php }?>
		</ul>
	</div>
</nav>