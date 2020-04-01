<?php /* Smarty version 3.0rc1, created on 2020-03-16 18:15:35
         compiled from "templates/PokeMasterX\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317355e6fc2471f7dc5-07747026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77ca3662636b9726055749f2a02b0be023c53fad' => 
    array (
      0 => 'templates/PokeMasterX\\index.tpl',
      1 => 1531117247,
    ),
  ),
  'nocache_hash' => '317355e6fc2471f7dc5-07747026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="Description" content="PokeMaster X - The best Pokemon." />
		<meta name="Keywords" content="pokemaster, pokemon, pokemaster x, pokemon x, poke tibia" />
		<meta http-equiv="Content-Type" content="text/html;" />
		<meta name="Distribution" content="Global" />
		<meta name="author" content="Bondzera - EmpireSoft" />
		<meta name="Robots" content="index,follow" />
		<meta charset="UTF-8">
		<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/css/estilo.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/css/bootstrap.css"/>
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<!-- MenuMaker Plugin -->
		<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>
		<!-- Icon Library -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/js/bootstrap.min.js"></script>
		<div id="topo">
		</div>
		<?php $_template = new Smarty_Internal_Template("elements/menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

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
			<?php $_template = new Smarty_Internal_Template("elements/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
	</body>
</html>