<?php include("public/js/keyboard.php");?>

<?php 
	error(validation_errors());
	echo "<div class='message'>";
	echo "<div class='title'>Login</div>";
	echo "<div class='content'><div style='width: 50%; position:relative;float: center;margin: 0 auto;'>";
	echo form_open('account/login');	
	?><br/>
	<label for="name"><span class="glyphicon glyphicon-user"></span> Usuario</label><input type="text" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="basic-addon1" value="<?php echo set_value('name'); ?>" class="keyboardInput" name="name">
	<br>
	<label for="name"><span class="glyphicon glyphicon-lock"></span> contraseña</label><input class="form-control" placeholder="contraseña" aria-label="Senha" aria-describedby="basic-addon1" type="password"" value="<?php echo set_value('pass'); ?>" class="keyboardInput" name="pass"/><br>
	<center><button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button></center>
	<?php 
	echo "</form><br/>";
	echo "</div></div>";
	echo "<div class='bar'><div class='alert alert-info' role='alert'><span class='glyphicon glyphicon-plus'></span> ¿Aún no tienes una cuenta? Haga clic <a href='".WEBSITE."/index.php/account/create'><b>aqui</b></a> y <b>registrese!</b><br/>
	<span class='glyphicon glyphicon-exclamation-sign'></span> <b>Perdio su cuenta?</b> click <a href='".WEBSITE."/index.php/account/lost'><b>aqui</b></a></div>";
	echo "</div></div>";

?>