<?php /* Smarty version 3.0rc1, created on 2013-09-12 20:23:40
         compiled from "templates/avut1\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10948523214bcbcb9d4-50556682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd556dc4e0ce1765dd6c2c32a3cc1bfcb92b24908' => 
    array (
      0 => 'templates/avut1\\index.tpl',
      1 => 1379013818,
    ),
  ),
  'nocache_hash' => '10948523214bcbcb9d4-50556682',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="Description" content="Information architecture, Web Design, Web Standards." />
		<meta name="Keywords" content="your, keywords" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="Distribution" content="Global" />
		<meta name="author" content="Unknown" />
		<meta name="Robots" content="index,follow" />
		<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
		<link href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/docs/estilo.css" type="text/css" />
	</head>
	<body>
		<div id="site">
			<div id="topo">
				<form class="search" method="post" action="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">
					<p>
	  				<input class="textbox" type="text" name="name" value="" />
	 				<input class="button" type="submit" name="Submit" value="Search" />
					</p>
				</form>
			</div>
			<div id="menu">
				<ul class="sidemenu">
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
">Home</a></li>				
					<?php if ($_smarty_tpl->getVariable('logged')->value==1){?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Account</a></li>
					<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create">Create Account</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login">Login</a></li>
					<?php }?>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">Characters</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/guilds">Guilds</a></li>
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/bugtracker">Bug Tracker</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/fragers">Top fraggers</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/video">Videos</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/houses/main">Houses</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/deaths">Latest Deaths</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/gallery">Gallery</a></li>	
					<li><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/profile/community">Community</a></li>	
				</ul>	
			</div>
			<div id="conteudo">
				<?php echo $_smarty_tpl->getVariable('main')->value;?>

			</div>
			<div id="painel">
				<h1>Server status</h1><br />
					<?php  $_smarty_tpl->tpl_vars['world'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('worlds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['world']->key => $_smarty_tpl->tpl_vars['world']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['world']->key;
?>
						&nbsp; <b>World:</b> <?php echo $_smarty_tpl->getVariable('world')->value;?>
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
/index.php/credits">Credits</a>, 
			Page rendered in: <?php echo $_smarty_tpl->getVariable('renderTime')->value;?>

			<?php echo $_smarty_tpl->getVariable('admin')->value;?>

			</div>
		</div>
	</body>
</html>