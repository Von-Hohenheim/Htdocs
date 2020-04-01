
        <div class='message'>
        <div class='title'>Recuperacion de Cuenta</div>
        <div class='content'><div style='width: 100%; position:relative;float: center;margin: 0 auto;'>
		<?php 
        alert("¡Aquí puedes recuperar tu cuenta! En los campos a continuación, ingrese su <b> correo electrónico </b>, la <b> clave de recuperación </b> y la nueva <b> contraseña </b>. ¿Has perdido tu clave de recuperación? Contáctenos a través de <b> Tickets </b> para ver otras formas.");
        error(validation_errors());
        echo form_open("account/lost");
		?>
		<table align='center' style='width:80%;margin-left:-20px;'>
		<tr>
		<td width="50%" style="float:right;margin-right:10px;padding-top:6px;"><label>E-mail:</label></td>
		<td width="50%"><input class="form-control" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1" type="text" name="email"/><br/></td>
		</tr>
		<tr>
		<td width="50%" style="float:right;margin-right:10px;padding-top:6px;"><label>Llave de Recuperacion:</label></td>
		<td width="50%"><input class="form-control" placeholder="Llave de Recuperacion" aria-label="chave" aria-describedby="basic-addon1" type="text" name="key"/><br/></td>
		</tr>
		<tr>
		<td width="50%" style="float:right;margin-right:10px;padding-top:6px;"><label>Nueva Contraseña:</label></td>
		<td width="50%"><input class="form-control" placeholder="Nueva Contraseña" aria-label="Nova senha" aria-describedby="basic-addon1" type="password" name="password"/><br/></td>
		</tr>
		<tr>
		<td width="50%" style="float:right;margin-right:10px;padding-top:6px;"><label>Repetir la Nueva Contraseña:</label></td>
		<td width="50%"><input class="form-control" placeholder="Nueva Contraseña 2x" aria-label="Nova senha" aria-describedby="basic-addon1" type="password" name="repeat"/><br/></td>
		</tr>
		</table>
		<br/>
        <center><button class="btn btn-primary" type="submit">Recuperar Cuenta</button></center>
		</div>
        </div>
		</div>
        </form>