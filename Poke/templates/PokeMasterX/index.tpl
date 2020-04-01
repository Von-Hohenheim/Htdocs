<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="Description" content="PokeMaster X - The best Pokemon." />
		<meta name="Keywords" content="pokemaster, pokemon, pokemaster x, pokemon x, poke tibia" />
		<meta http-equiv="Content-Type" content="text/html;" />
		<meta name="Distribution" content="Global" />
		<meta name="author" content="Bondzera - EmpireSoft" />
		<meta name="Robots" content="index,follow" />
		<meta charset="UTF-8">
		<title>{$title}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{$template_path}/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="{$template_path}/css/estilo.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="{$template_path}/css/bootstrap.css"/>
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<!-- MenuMaker Plugin -->
		<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>
		<!-- Icon Library -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="{$template_path}/js/bootstrap.min.js"></script>
		<div id="topo">
		</div>
		{include file="elements/menu.tpl"}
		<div id="wrapper" class="container">
		<div id="conteudo">
				<div id="esquerda">
					{$main}
				</div>
				<div id="direita">
					{include file="elements/info.tpl"}
				</div>
			</div>
		</div>
		<div id="footer">
			{include file="elements/footer.tpl"}
		</div>
	</body>
</html>