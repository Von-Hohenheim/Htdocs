<div class="title">
	Server Status
</div>
<div class="info">
	{foreach from=$worlds key=id item=world}
	
		<span class="glyphicon glyphicon-globe"></span> <b>Status:</b>  
		{if $serverOnline[$id]}
			<font color='green'><b>Online</b></font><br />
			<span class="glyphicon glyphicon-signal"></span> <b>Uptime:</b> {$serverUptime[$id]} <br />
			<span class="glyphicon glyphicon-user"></span> <b>Players:</b> {$serverPlayers[$id]}/1000 <br />
			<span class="glyphicon glyphicon-time"></span> <b>Server Save:</b> 06:00:00 MX <br />
			<span class="glyphicon glyphicon-download-alt"></span> <b>Download:</b> Client V1.5 <br />

		{else}
			<font color='red'><b>Offline</b></font><br />
			<span class="glyphicon glyphicon-user"></span> <b>Players:</b> {$serverPlayers[$id]}/1000 <br />
			<span class="glyphicon glyphicon-time"></span> <b>Server Save:</b> 06:00:00 MX <br />
			<span class="glyphicon glyphicon-download-alt"></span> <b>Download:</b> Client V1.5 <br />
		{/if}
	{/foreach}
</div>
<br/>

<div class="title">
	Buscar Personaje
</div>
<div class="social"><form class="navbar-form1" role="search" method="post" action="{$path}/index.php/character/view" onSubmit="return validaFormTrans()">
			<div class="form-group1">
				<input type="text" name="search" value="" style="height:40px;" class="form-control" placeholder="Nombre del Entrenador"/>
			</div>
			<center><button type="submit" name="submit" style="font-size:16px;font-weight:bold;" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button></center>
		</form></div>
<br/>

<div class="title">
	Redes Sociales
</div>
<div class="social"><center>
<a href="https://discord.gg/VhwQtN" target="_blank"><img src="{$template_path}/img/discord_64.png" width="64px" height="64px"></img></a>
<a href="https://www.facebook.com/Pokemonmx-109637487349033" target="_blank"><img src="{$template_path}/img/facebook_64.png" width="64px" height="64px"></img></a>
<a href="https://trello.com/b/JsUk0DO8/pokémasterx" target="_blank"><img src="{$template_path}/img/instagram_64.png" width="64px" height="64px"></img></a>
<a href="#" target="_blank"><img src="{$template_path}/img/youtube_64.png" width="64px" height="64px"></img></a>
<br/><br/>
<iframe src="https://discordapp.com/widget?id=692024801388265472&theme=dark" width="300" height="500" allowtransparency="true" frameborder="0"></iframe>
</center></div>

<br/>



<div class="title">
	Promociones
</div>
<div class="Promocion"><center>
<a href="#" target="_blank"><img src="{$template_path}/img/promocion.png"></img></a>
</center></div><br/>
