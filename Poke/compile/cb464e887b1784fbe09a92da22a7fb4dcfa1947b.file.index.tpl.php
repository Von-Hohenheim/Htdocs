<?php /* Smarty version 3.0rc1, created on 2020-03-16 18:08:48
         compiled from "templates/sekaimmo\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236045e6fc0b07e2bb8-81572537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb464e887b1784fbe09a92da22a7fb4dcfa1947b' => 
    array (
      0 => 'templates/sekaimmo\\index.tpl',
      1 => 1531117251,
    ),
  ),
  'nocache_hash' => '236045e6fc0b07e2bb8-81572537',
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
		<meta name="author" content="Avuenja" />
		<meta name="Robots" content="index,follow" />
		<meta charset="UTF-8">
		<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
		<link href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/css/estilo.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/css/bootstrap.css">
	</head>
	<body>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/js/bootstrap.min.js"></script>
		<?php $_template = new Smarty_Internal_Template("elements/menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<div id="topo">
		</div>
		<div id="wrapper" class="container">
			<div id="conteudo">
				<div id="esquerda">
					<?php echo $_smarty_tpl->getVariable('main')->value;?>

				</div>
				<div id="direita">
					<?php $_template = new Smarty_Internal_Template("elements/info.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

				</div>
			</div>
		</div>
		<div id="footer">
			<p>© <?php echo $_smarty_tpl->getVariable('server_name')->value;?>
 2014 <?php echo $_smarty_tpl->getVariable('admin')->value;?>
</p>
		</div>
	</body>
</html>