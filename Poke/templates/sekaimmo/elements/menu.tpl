<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand visible-xs" href="#">{$server_name}</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
	
			<li{if $controller == "" || $controller == "home"} class="active"{/if}><a href="{$path}">Inicio</a></li>
			{if $logged == 1}					
			<li {if $controller == "character" || $controller == "highscores" || $controller == "guilds"} class="active"{/if} class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Comunidade <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li{if $controller == "character" && $method == "view"} class="active"{/if}><a href="{$path}/index.php/character/view">Treinadores</a></li>
					<li{if $controller == "highscores"} class="active"{/if}><a href="{$path}/index.php/highscores">Pontuação</a></li>
					<li{if $controller == "houses"} class="active"{/if}><a href="{$path}/index.php/houses">Houses</a></li>

				</ul>
			</li>
			
		</ul>
		<form class="navbar-form navbar-left" role="search" method="post" action="{$path}/index.php/character/view">
			<div class="form-group">
				<input type="text" name="name" value="" class="form-control" placeholder="Nome do Treinador">
			</div>
			<button type="submit" name="submit" class="btn btn-default">Procurar</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
				<li{if $controller == "account"} class="active"{/if}><a href="{$path}/index.php/account">Conta</a></li>
				<li{if $controller == "account"} class="active"{/if}><a href="{$path}/index.php/account">Atualizações Semanais</a></li>
				<li{if $controller == "download"} class="active"{/if}><a href="http://pokemasterx.com//index.php/p/v/downloads">Download</a></li>
				<li{if $controller == "p" && $method == "v"} class="active"{/if}><a href="{$path}/index.php/p/v/gifts">Doações</a></li>
			{else}
				<li{if $controller == "download"} class="active"{/if}><a href="http://pokemasterx.com//index.php/p/v/downloads">Download</a></li>
				<li{if $controller == "account" && $method == "create"} class="active"{/if}><a href="{$path}/index.php/account/create">Crie sua conta</a></li>
				<li{if $controller == "account" && $method == "login"} class="active"{/if}><a href="{$path}/index.php/account/login">Logar</a></li>
			{/if}
		</ul>
	</div>
</nav>