<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('MedicinasController/form_validation'); /*RECIBE COMO PARAMETRO EL CONTROLADOR Y LA FUNCION A LA QUE SE HARA EL ACTION DEL FORMULARIO*/ ?>
<a href="javascript:history.back(-1)">VOLVER</a>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<!-- ese setvalue se supone que era como el old en laravel, para no perder los datos en caso de error del formulario.. Pero no me funciona . Si me funciona, lo que pasa es que tenia dos atributos value xD y uno estaba vacio jejej-->

<h5>Password</h5>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>Direccion</h5>
<input type="text" name="address" value="<?php echo set_value('address'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>