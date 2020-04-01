<?php /* Smarty version 3.0rc1, created on 2020-03-16 18:15:35
         compiled from "templates/PokeMasterX\elements/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126745e6fc24745a0c5-18214550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74b364a9b3ff5da29c38785a4d3c42f514df8e55' => 
    array (
      0 => 'templates/PokeMasterX\\elements/footer.tpl',
      1 => 1531117262,
    ),
  ),
  'nocache_hash' => '126745e6fc24745a0c5-18214550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<head>
<style>
footer {
    background-color:#232675;
	z-index: 1;
    width: 100% auto;
    bottom: 0;
    font-weight: lighter;
    color: white;
	border-radius: 2px;
	font-family: 'Open Sans Condensed', arial, sans-serif;
	font-size : 18px;
}
.footerHeader{
    width:100%;
	z-index: 2;
    width: 100%;
    padding: 3px;
    background-color:#e3e51f;
    color:white;
	border-radius: 2px;
	font-family: 'Open Sans Condensed', arial, sans-serif;
	font-size : 18px;
}
footer container{
	font-family: 'Open Sans Condensed', arial, sans-serif;
}

footer h3{
    font-weight:lighter;
	color:#e3e51f;
	font-family: 'Glegoo', arial, sans-serif;
}
footer ul{
    padding-left:5px;
    list-style:none;
	
}
footer p{
    text-align : justify;
    font-size : 18px;
}
footer iframe {
    width:100%;
    position:relative;
    height:170px;
}
.sm{
    list-style:none;
    overflow:auto;
}
.sm li {
    display: inline;
    margin-top: -10px;
    float:right;
	line-height: 40px;
	font-size: 12px;
	font-family: tahoma, arial, verdana;
} 
.sm li a img {
    width:32px;
}
</style>
</head><br/>
<footer>
    <div class="footerHeader" ></div>
    <div class="container">
		<div class="col-md-4">
		    <h3>Sobre Nós</h3>
		    <p>
		      Somos a PokeMasterX, um servidor que está em desenvolvimento contínuo desde 2015. Nossas features completas você pode verificar acessando nosso site. Para melhor experiência, acesse nosso jogo e veja com seus próprios olhos!<br/>
			  <br/><small>Pokémon Copyright © 1995 - 2018 Nintendo/Creatures Inc./GAME FREAK Inc. Pokémon And All Respective Names are Trademarks of Nintendo 1996-2018 PokeMasterX is not affiliated with Nintendo, Creatures Inc. and GAME FREAK Inc.</small>
		    </p>
		</div>
		
		<div class="col-md-4">
		    <h3>Facebook </h3>
		    <a href="https://www.facebook.com/pokemonxmaster/" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('template_path')->value;?>
/img/banner-rodape.png"/></a>
		</div>
		<div class="col-md-4" >
		    <h3>Contato</h3>
		    <ul>
		        <li><a href="#"><button type="button" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-heart"></span> Blog PokeMasterX</button></a></li>
				<li>&nbsp;</li>
		        <li><a href="#"><button type="button" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-info-sign"></span> Central de Suporte</button></a></li>
				<li>&nbsp;</li>
				<li><a href="#"><button type="button" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-send"></span> contato@pokemasterx.com</button></a></li>
		    </ul>
			<br/><br/><br/>
		    <ul class="sm">
		        <li>2018 by EmpireSoft - All rights reserveds! <a href="#" >EmpireSoft</a></li>
		        
		    </ul>
		</div>
    </div>
</footer>