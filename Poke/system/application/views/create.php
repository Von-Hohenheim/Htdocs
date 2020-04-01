<div class='errors'> <?php echo error(validation_errors()); ?> </div>
<?php 
global $config;
?>
<script>
	function createAccount() {
		$('.loader').show();
		var form = $('#createAccount').serialize();
		$.ajax({
			url: '<?php echo WEBSITE; ?>/index.php/account/create/1',
			  type: 'post',
			  data: form,
			  success: function(data) {
			  	$('.errors').html(data);
			  	$('.loader').hide();
			  }
		});
	}
</script>
<div class='message'><form class="navbar-form1" role="create" method="post" onSubmit="return validaFormTrans()">
	<div class='title'>Crear Cuenta</div>
	<div class='content'><div style='width: 70%; position:relative;float: center;margin: 0 auto;'> <?php echo form_open('account/create', array('id'=>'createAccount')); ?>
			<!-- Tabela da conta -->
			<table class="table">
				<thead>
					<tr>
						<th colspan="2" style="font-size:20px;"><span class="glyphicon glyphicon-pushpin"></span> Informacion de la Cuenta</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><label for="name">Nombre de cuenta:</label></td>
						<td><input type="text" name="name" value='<?php echo set_value('name'); ?>' id="name" class="keyboardInput"/></td>
					</tr>
					<tr>
						<td><label for="nickname">Nick:</label></td>
						<td><input type="text" name='nickname' value='<?php echo set_value('nickname'); ?>' id="nickname"/></td>
					</tr>
					<tr>
						<td><label for="email">E-mail:</label></td>
						<td><input  type="text" value="<?php echo set_value('email'); ?>" id="email" name="email"/></td>
					</tr>
					<tr>
						<td><label for="password">contraseña:</label></td>
						<td><input type="password" class="keyboardInput" id="password" name="password"/></td>
					</tr>
					<tr>
						<td><label for="repeat">Repita la contraseña:</label></td>
						<td><input type="password" class="keyboardInput" id="repeat" name="repeat"/></td>
					</tr>
				</tbody>
			</table>
		<!-- Tabela do personagem -->
		<table class="table">
			<thead>
				<tr>
					<th colspan="2" style="font-size:20px;"><span class="glyphicon glyphicon-user"></span> Informacion de Personaje</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td><label for="character_name">Nombre de personaje:</label></td>
						<td><input  type="text" id="character_name" value="<?php echo set_value('character_name'); ?>" name="character_name"/></td>
					</tr>
					<tr>
						<td><label for="sex">Genero:</label></td>
						<td>
							<input name="sex" type="radio" id="sex" value="1" checked="checked" />
								Masculino &nbsp;
							<input type="radio" id="sex" name="sex" value="0" />
								Feminino 
						</td>
					</tr>
					<tr>
						<td><label for="vocation">Entrenador:</label></td>
						<td>
							<select name="vocation" class="keyboardInput" id="vocation" style="width:50%;">
								<option value="1">Entrenador</option>
								
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="city">Escojer ciudad:</label></td>
						<td>
							<select name="city" id="city" style="width:50%;">
								<?php 
									foreach($config['cities'] as $city => $name)  
									echo '<option value="'.$city.'">'.$name.'</option>'; 
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="world">Mundo:</label></td>
						<td>
							<?php 
								if(sizeof($config['worlds']) > 1) { 
							?>
							<select name="world" id="world">
							<?php
								foreach($config['worlds'] as $world => $name)  
								echo '<option value="'.$world.'">'.$name.'</option>'; 
							?>
							</select>
							<?php 
								}else{ 
							?>
							<input type="hidden" name="world" value="0" />
							<?php echo $config['worlds'][0]; ?>
							<?php } ?>
						</td>
					</tr>
				</tbody>
		</table>
		<!-- Tabela do captha -->
		<table class="table">
			<thead>
				<tr>
					<th colspan="2" style="font-size:20px;"><span class="glyphicon glyphicon-picture"></span> Imagem de seguridad</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label for="captcha">Captcha:</label></td>
					<td><?php echo $captcha;?></td>
					<td><input type='text' name='captcha' id="captcha"/></td>
				</tr>
			</tbody>
		</table>
				<center>Al registrarte automáticamente aceptas las reglas del juego, léelas en <a href="../rules">Reglas</a>.</center>
		
		<br />
		<center><button class="btn btn-lg btn-success" type="submit">Registrarse</button>
		<?php loader(); ?></form></center>
	</div></div>
</div>