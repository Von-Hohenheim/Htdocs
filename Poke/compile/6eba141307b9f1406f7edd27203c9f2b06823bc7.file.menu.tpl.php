<?php /* Smarty version 3.0rc1, created on 2020-03-16 18:08:48
         compiled from "templates/sekaimmo\elements/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190375e6fc0b0899950-54670548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eba141307b9f1406f7edd27203c9f2b06823bc7' => 
    array (
      0 => 'templates/sekaimmo\\elements/menu.tpl',
      1 => 1531117291,
    ),
  ),
  'nocache_hash' => '190375e6fc0b0899950-54670548',
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
			<?php if ($_smarty_tpl->getVariable('logged')->value==1){?>					
			<li <?php if ($_smarty_tpl->getVariable('controller')->value=="character"||$_smarty_tpl->getVariable('controller')->value=="highscores"||$_smarty_tpl->getVariable('controller')->value=="guilds"){?> class="active"<?php }?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Comunidade <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="view"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">Treinadores</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="highscores"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/highscores">Pontuação</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="houses"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/houses">Houses</a></li>

				</ul>
			</li>
			
		</ul>
		<form class="navbar-form navbar-left" role="search" method="post" action="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">
			<div class="form-group">
				<input type="text" name="name" value="" class="form-control" placeholder="Nome do Treinador">
			</div>
			<button type="submit" name="submit" class="btn btn-default">Procurar</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Conta</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Atualizações Semanais</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="download"){?> class="active"<?php }?>><a href="http://pokemasterx.com//index.php/p/v/downloads">Download</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="p"&&$_smarty_tpl->getVariable('method')->value=="v"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/gifts">Doações</a></li>
			<?php }else{ ?>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="download"){?> class="active"<?php }?>><a href="http://pokemasterx.com//index.php/p/v/downloads">Download</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="create"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create">Crie sua conta</a></li>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="login"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login">Logar</a></li>
			<?php }?>
		</ul>
	</div>
</nav>