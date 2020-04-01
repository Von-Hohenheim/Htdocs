<?php echo error(validation_errors()); ?>
	<div class='message'>
	<div class='title'>Cambiar contraseña</div>
	<div class='content'><div style='width: 50%; position:relative;float: center;margin: 0 auto;'>
<?php echo form_open("account/changepassword");?>
<table class='table' width='100%'>
<tr>
<td>Contraseña Actual:</td><td><input type='password' name='current'/></td>
</tr>
<tr>
<td>Contraseña Nueva:</td><td><input type='password' name='password'/></td>
</tr>
<tr>
<td>Repetir Contraseña:</td><td><input type='password' name='repeat'/></td>
</tr>
</table>
<center><input type='submit' value='Cambiar' class='btn btn-primary'/></center>
</form>
</div></div></div>