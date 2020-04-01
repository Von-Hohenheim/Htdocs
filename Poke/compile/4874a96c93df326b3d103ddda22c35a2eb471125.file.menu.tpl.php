<?php /* Smarty version 3.0rc1, created on 2018-09-18 07:08:54
         compiled from "templates/pokemasterx/elements/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13664099095ba09676da6125-43874435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4874a96c93df326b3d103ddda22c35a2eb471125' => 
    array (
      0 => 'templates/pokemasterx/elements/menu.tpl',
      1 => 1537250934,
    ),
  ),
  'nocache_hash' => '13664099095ba09676da6125-43874435',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="cssmenu">
  <ul><a href="#" style="padding-left: 30px; position: static; float: left; margin: -10px -10px -10px -10px; z-index: 2;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/banner.png" class="img-responsive" style="max-width:200px;" alt="PokeMaster X">
                </a>
     <li<?php if ($_smarty_tpl->getVariable('controller')->value=="home"){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
"><i class="fa fa-fw fa-home"></i> Início</a></li> 
	 <li><a href="#"><i class="fa fa-fw fa-group"></i> Comunidade</a>
        <ul>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="view"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view"><i class="fa fa-fw fa-search"></i> Procurar</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="highscores"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/highscores"><i class="fa fa-fw fa-bar-chart"></i> Highscores</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="guilds"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/guilds"><i class="fa fa-fw fa-user-plus"></i> Guildas</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="houses"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/houses"><i class="fa fa-fw fa-legal"></i> Casas</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="serverinfo"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/serverinfo"><i class="fa fa-fw fa-map-signs"></i> Informações</a></li>
		   <li<?php if ($_smarty_tpl->getVariable('controller')->value=="mapa"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/mapa"><i class="fa fa-fw fa-map"></i> Mapa</a></li>
        </ul>
     </li>
     <li><a href="#"><i class="fa fa-fw fa-download"></i> DOWNLOAD</a>
        <ul>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="downloads"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/downloads"><i class="fa fa-fw fa-hashtag"></i> Descargar Cliente</a></li>
        </ul>
     </li>
     <li><a href="#"><i class="fa fa-fw fa-life-bouy"></i> SUPORTE</a>
        <ul>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="rules"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/rules"><i class="fa fa-fw fa-book"></i> Regras</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="recovery"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/lost"><i class="fa fa-fw fa-envelope-o"></i> Recuperar Conta</a></li>
           <li<?php if ($_smarty_tpl->getVariable('controller')->value=="tickets"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/tickets"><i class="fa fa-fw fa-commenting-o"></i> Abrir Ticket</a></li>
        </ul>
     </li>
     <li<?php if ($_smarty_tpl->getVariable('controller')->value=="p"&&$_smarty_tpl->getVariable('method')->value=="v"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/p/v/gifts"><i class="fa fa-fw fa-shopping-cart"></i> LOJA</a></li>
	 <?php if ($_smarty_tpl->getVariable('logged')->value==1){?>
	 <li style="float:right;margin-right:50px; position: relative;color:#e3e51f;"><a href="#"><i class="fa fa-fw fa-navicon" style="color:#e3e51f;font-height:bold;"></i> <span style="color:#e3e51f;font-height:bold;">Conta</span></a>
        <ul>
		<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account"><i class="fa fa-fw fa-user"></i> Minha Conta</a></li>
		<li<?php if ($_smarty_tpl->getVariable('controller')->value=="change"){?> <?php }?>><a href='<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/changepassword'><span type='text' onClick=\"window.location.href='account/changepassword';\"><i class="fa fa-fw fa-refresh"></i> Trocar Senha</span></a></li>
		<li<?php if ($_smarty_tpl->getVariable('controller')->value=="logout"){?> <?php }?>><a href='account/logout'><span type='submit' onClick=\"window.location.href='account/login/1';\"><i class="fa fa-fw fa-mail-reply-all"></i> Sair</span></a></li>
		</ul>
	 </li>
	 <?php }?>
	 <?php if ($_smarty_tpl->getVariable('logged')->value==0){?>
	 <li style="float:right;margin-right:50px; position: relative;color:#c3c3c3;"><a href="#"><i class="fa fa-fw fa-navicon"></i> Conta</a>
        <ul>
		<li<?php if ($_smarty_tpl->getVariable('controller')->value=="create"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create"><i class="fa fa-fw fa-paperclip"></i> Criar Conta</a></li>
		<li<?php if ($_smarty_tpl->getVariable('controller')->value=="login"){?> <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login"><i class="fa fa-fw fa-user"></i> Acessar Conta</a></li>
		</ul>
	 </li>
	 <?php }?>
  </ul>
  
</div><br/>	
