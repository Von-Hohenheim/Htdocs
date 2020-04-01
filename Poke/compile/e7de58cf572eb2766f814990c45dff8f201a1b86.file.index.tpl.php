<?php /* Smarty version 3.0rc1, created on 2020-03-15 14:33:04
         compiled from "templates/pokemasterx\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196115e6e3ca0382342-85725443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7de58cf572eb2766f814990c45dff8f201a1b86' => 
    array (
      0 => 'templates/pokemasterx\\index.tpl',
      1 => 1531117247,
    ),
  ),
  'nocache_hash' => '196115e6e3ca0382342-85725443',
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