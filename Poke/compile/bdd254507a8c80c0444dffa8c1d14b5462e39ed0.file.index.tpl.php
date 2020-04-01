<?php /* Smarty version 3.0rc1, created on 2014-01-25 00:58:11
         compiled from "templates/naruto\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3083952e30c23cc2272-44546128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd254507a8c80c0444dffa8c1d14b5462e39ed0' => 
    array (
      0 => 'templates/naruto\\index.tpl',
      1 => 1379119256,
    ),
  ),
  'nocache_hash' => '3083952e30c23cc2272-44546128',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="Description" content="Information architecture, Web Design, Web Standards." />
		<meta name="Keywords" content="your, keywords" />
		<meta http-equiv="Content-Type" content="text/html;" />
		<meta name="Distribution" content="Global" />
		<meta name="author" content="Unknown" />
		<meta name="Robots" content="index,follow" />
		<meta charset="UTF-8">
		<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
		<!-- Favicon -->
		<link href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/favicon.ico" rel="icon" type="image/x-icon" />
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/docs/estilo.css" type="text/css" />
		<!-- Bootstrap -->
		<link rel="stylesheet" media="screen" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/bootstrap/css/bootstrap-responsive.min.css">
		<!-- Scripts -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="site">
			<div id="topo">
				<div class="busca">
					<form class="form-search" method="post" action="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">
	  					<input class="input-medium search-query" type="text" name="name" value="" placeholder="Personagem"/>
	 					<button class="btn btn-small" type="submit" name="submit">Procurar</button>
					</form>
				</div>
			</div>
			<div id="menu">
				<div class="title">Navegação</div>
				<ul class="sidemenu">
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
">Inicio</a></li>				
					<?php if ($_smarty_tpl->getVariable('logged')->value==1){?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Conta</a></li>
					<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create">Criar Conta</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login">Logar</a></li>
					<?php }?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">Personagens</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/guilds">Guildas</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/bugtracker">Bug Tracker</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/fragers">Top fraggers</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/video">Videos</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/houses/main">Casas</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/deaths">Últimas mortes</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/gallery">Galeria</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/gifts">Shop</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/profile/community">Comunidade</a></li>	
				</ul>	
			</div>
			<div id="conteudo">
				<?php echo $_smarty_tpl->getVariable('main')->value;?>

			</div>
			<div id="painel">
				<div class="title">Servidor</div>
					<?php  $_smarty_tpl->tpl_vars['world'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('worlds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['world']->key => $_smarty_tpl->tpl_vars['world']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['world']->key;
?>
						&nbsp; <b>Mundo:</b> <?php echo $_smarty_tpl->getVariable('world')->value;?>
 <br />
						&nbsp; <b>Status:</b>  
							<?php if ($_smarty_tpl->getVariable('serverOnline')->value[$_smarty_tpl->getVariable('id')->value]){?>
								<font color='green'>Online</font><br />
								&nbsp; <b>Uptime:</b> <?php echo $_smarty_tpl->getVariable('serverUptime')->value[$_smarty_tpl->getVariable('id')->value];?>
 <br />
								&nbsp; <b>Players:</b> <?php echo $_smarty_tpl->getVariable('serverPlayers')->value[$_smarty_tpl->getVariable('id')->value];?>
/<?php echo $_smarty_tpl->getVariable('serverMax')->value[$_smarty_tpl->getVariable('id')->value];?>
<br /><br />

							<?php }else{ ?>
								<font color='red'>Offline</font><br />
							<?php }?>
					<?php }} ?>
					<?php echo $_smarty_tpl->getVariable('poll')->value;?>

			</div>
			<div id="footer">
				<a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/credits">Morden AAC</a>, 
			Page rendered in: <?php echo $_smarty_tpl->getVariable('renderTime')->value;?>

			<?php echo $_smarty_tpl->getVariable('admin')->value;?>
<br />
			Optimizado por <a href="http://www.xtibia.com/forum/user/336584-avuenja/" target="_blank">Avuenja</a>.
			</div>
		</div>
	</body>
</html>