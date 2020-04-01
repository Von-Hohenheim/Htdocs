<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="Description" content="Information architecture, Web Design, Web Standards." />
		<meta name="Keywords" content="your, keywords" />
		<meta http-equiv="Content-Type" content="text/html;" />
		<meta name="Distribution" content="Global" />
		<meta name="author" content="Avuenja" />
		<meta name="Robots" content="index,follow" />
		<meta charset="UTF-8">
		<title>{$title}</title>
		<link href="{$template_path}/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" href="{$template_path}/css/estilo.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="{$template_path}/css/bootstrap.css">
	</head>
	<body>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="{$template_path}/js/bootstrap.min.js"></script>
		{include file="elements/menu.tpl"}
		<div id="topo">
		</div>
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
			<p>© {$server_name} 2014 {$admin}</p>
		</div>
	</body>
</html>