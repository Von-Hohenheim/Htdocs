<?php /* Smarty version 3.0rc1, created on 2013-09-06 02:51:46
         compiled from "templates/default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2835152293532dc36c0-63630942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9be817a5a300ba6ffac35944909d95e98be7a8e' => 
    array (
      0 => 'templates/default\\index.tpl',
      1 => 1285385222,
    ),
  ),
  'nocache_hash' => '2835152293532dc36c0-63630942',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="author" content="Unknown" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/templates/default/images/Refresh.css" type="text/css" />
<?php echo $_smarty_tpl->getVariable('head')->value;?>


<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
	
</head>

<body>

		<!--[if IE]>
		<script type="text/javascript"> 
			var IE6UPDATE_OPTIONS = {
				icons_path: "public/ie6update/images/"
			}
		</script>
		<script type="text/javascript" src="public/ie6update/ie6update.js"></script>
		<![endif]-->
<!-- wrap starts here -->
<div id="wrap">
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text">Mo<span class="gray">dernAAC</span>1.0</h1>		
			<h2 id="slogan">Powered by IDE Engine</h2>
				
			<form class="search" method="post" action="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">
				<p>
	  			<input class="textbox" type="text" name="name" value="" />
	 			<input class="button" type="submit" name="Submit" value="Search" />
				</p>
			</form>			
				
		</div>
		
		<!-- menu -->	
		<div  id="menu">
		
			<ul>
				<li<?php if ($_smarty_tpl->getVariable('controller')->value==''||$_smarty_tpl->getVariable('controller')->value=="home"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
">Home</a></li>
				<?php if ($_smarty_tpl->getVariable('logged')->value==1){?>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account">Account</a></li>
				<?php }else{ ?>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="create"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/create">Create Account</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="account"&&$_smarty_tpl->getVariable('method')->value=="login"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/account/login">Login</a></li>
				<?php }?>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="view"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/view">Characters</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="character"&&$_smarty_tpl->getVariable('method')->value=="online"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/character/online">Who is Online</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="guilds"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/guilds">Guilds</a></li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="highscores"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/highscores">Highscores</a></li>	
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=="forum"){?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/forum">Forum</a></li>		
					
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar">
				<?php echo $_smarty_tpl->getVariable('online')->value;?>

				<h1>Sidebar Menu</h1>
				<div class="left-box">
					<ul class="sidemenu">				
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
			
				
				
				
				
			</div>
				
			<div id="main" style='padding-top: 10px;'>
				<?php echo $_smarty_tpl->getVariable('main')->value;?>

			</div>
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			<a href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
/index.php/credits">Credits</a>, 
			Page rendered in: <?php echo $_smarty_tpl->getVariable('renderTime')->value;?>

			<?php echo $_smarty_tpl->getVariable('admin')->value;?>

				
		</div>	

<!-- wrap ends here -->
</div>

</body>
</html>
