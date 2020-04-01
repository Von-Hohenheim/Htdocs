<div id="cssmenu">
  <ul><a href="#" style="padding-left: 30px; position: static; float: left; margin: -10px -10px -10px -10px; z-index: 2;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <img src="{$template_path}/img/banner.png" class="img-responsive" style="max-width:200px;" alt="PokeMaster X">
                </a>
     <li{if $controller == "home"} class="active"{/if}><a href="{$path}"><i class="fa fa-fw fa-home"></i> Início</a></li> 
	 <li><a href="#"><i class="fa fa-fw fa-group"></i> Comunidad</a>
        <ul>
           <li{if $controller == "character" && $method == "view"} {/if}><a href="{$path}/index.php/character/view"><i class="fa fa-fw fa-search"></i> Buscar</a></li>
           <li{if $controller == "highscores"} {/if}><a href="{$path}/index.php/highscores"><i class="fa fa-fw fa-bar-chart"></i> Highscores</a></li>
           <li{if $controller == "guilds"} {/if}><a href="{$path}/index.php/guilds"><i class="fa fa-fw fa-user-plus"></i> Guilds</a></li>
           <li{if $controller == "houses"} {/if}><a href="{$path}/index.php/houses"><i class="fa fa-fw fa-legal"></i> Casas</a></li>
           <li{if $controller == "serverinfo"} {/if}><a href="{$path}/index.php/p/v/serverinfo"><i class="fa fa-fw fa-map-signs"></i> Informacion</a></li>
		   <li{if $controller == "mapa"} {/if}><a href="{$path}/index.php/p/v/mapa"><i class="fa fa-fw fa-map"></i> Mapa</a></li>
        </ul>
     </li>
     <li><a href="#"><i class="fa fa-fw fa-download"></i> DESCARGAS</a>
        <ul>
           <li{if $controller == "downloads"} {/if}><a href="{$path}/index.php/p/v/downloads"><i class="fa fa-fw fa-hashtag"></i> Descargar Juego</a></li>
        </ul>
     </li>
     <li><a href="#"><i class="fa fa-fw fa-life-bouy"></i> SOPORTE</a>
        <ul>
           <li{if $controller == "rules"} {/if}><a href="{$path}/index.php/p/v/rules"><i class="fa fa-fw fa-book"></i> Reglas</a></li>
           <li{if $controller == "recovery"} {/if}><a href="{$path}/index.php/account/lost"><i class="fa fa-fw fa-envelope-o"></i> Recuperar Cuenta</a></li>
           <li{if $controller == "tickets"} {/if}><a href="{$path}/index.php/p/v/tickets"><i class="fa fa-fw fa-commenting-o"></i> Abrir Ticket</a></li>
        </ul>
     </li>
     <li{if $controller == "p" && $method == "v"} {/if}><a href="{$path}/index.php/p/v/gifts"><i class="fa fa-fw fa-shopping-cart"></i> Tienda</a></li>
	 {if $logged == 1}
	 <li style="float:right;margin-right:50px; position: relative;color:#e3e51f;"><a href="#"><i class="fa fa-fw fa-navicon" style="color:#e3e51f;font-height:bold;"></i> <span style="color:#e3e51f;font-height:bold;">Cuenta</span></a>
        <ul>
		<li{if $controller == "account"} {/if}><a href="{$path}/index.php/account"><i class="fa fa-fw fa-user"></i> Mi Cuenta</a></li>
		<li{if $controller == "change"} {/if}><a href='{$path}/index.php/account/changepassword'><span type='text' onClick=\"window.location.href='account/changepassword';\"><i class="fa fa-fw fa-refresh"></i> Cambiar Contraseña</span></a></li>
		<li{if $controller == "logout"} {/if}><a href='account/logout'><span type='submit' onClick=\"window.location.href='account/login/1';\"><i class="fa fa-fw fa-mail-reply-all"></i> Sair</span></a></li>
		</ul>
	 </li>
	 {/if}
	 {if $logged == 0}
	 <li style="float:right;margin-right:50px; position: relative;color:#c3c3c3;"><a href="#"><i class="fa fa-fw fa-navicon"></i> Cuenta</a>
        <ul>
		<li{if $controller == "create"} {/if}><a href="{$path}/index.php/account/create"><i class="fa fa-fw fa-paperclip"></i> Crear Cuenta</a></li>
		<li{if $controller == "login"} {/if}><a href="{$path}/index.php/account/login"><i class="fa fa-fw fa-user"></i> Accesar en Cuenta</a></li>
		</ul>
	 </li>
	 {/if}
  </ul>
  
</div><br/>	
