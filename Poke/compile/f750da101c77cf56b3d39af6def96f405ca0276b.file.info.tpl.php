<?php /* Smarty version 3.0rc1, created on 2014-01-25 19:29:23
         compiled from "templates/giren\elements/info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1843052e41093a08889-59029022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f750da101c77cf56b3d39af6def96f405ca0276b' => 
    array (
      0 => 'templates/giren\\elements/info.tpl',
      1 => 1390678161,
    ),
  ),
  'nocache_hash' => '1843052e41093a08889-59029022',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="title">
	Server status
</div>
<div class="info">
	<?php  $_smarty_tpl->tpl_vars['world'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('worlds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['world']->key => $_smarty_tpl->tpl_vars['world']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['world']->key;
?>
		<b>World:</b> <?php echo $_smarty_tpl->getVariable('world')->value;?>
 <br />
		<b>Status:</b>  
		<?php if ($_smarty_tpl->getVariable('serverOnline')->value[$_smarty_tpl->getVariable('id')->value]){?>
			<font color='green'>Online</font><br />
			<b>Uptime:</b> <?php echo $_smarty_tpl->getVariable('serverUptime')->value[$_smarty_tpl->getVariable('id')->value];?>
 <br />
			<b>Players:</b> <?php echo $_smarty_tpl->getVariable('serverPlayers')->value[$_smarty_tpl->getVariable('id')->value];?>
/<?php echo $_smarty_tpl->getVariable('serverMax')->value[$_smarty_tpl->getVariable('id')->value];?>
<br /><br />
		<?php }else{ ?>
			<font color='red'>Offline</font><br />
		<?php }?>
	<?php }} ?>
</div>