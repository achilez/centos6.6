<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<p>Login form</p>

<?php echo form_open('blog/auth'); ?>
<?php echo validation_errors(); ?>
<input type="text" name="email" placeholder="Email Address" /><br>
<input type="password" name="password" placeholder="Password" /><br>
<button type="submit" name="submit" value="login">LOGIN</button>
<?php echo form_close(); ?>

</body>
</html>
