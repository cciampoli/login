<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
<link rel="stylesheet" href="<?base_url();?>../css/styles.css">
</head>
<body>
<div align="center">
<h1>Login</h1>
<table>
<?php echo form_open('admin/login'); ?>
<p><?=form_label('Email Address', 'email_address'); ?></p>
<p><?=form_input('email_address', set_value('email_address'), 'id="email_address"'); ?></p>
<p><?=form_label('Password', 'password'); ?></p>
<p><?=form_password('password', '', 'id="password"'); ?></p>
<p><?=form_submit('submit', 'Submit!'); ?></p>
<?php echo form_close(); ?>
<a href="<?=site_url('admin/register'); ?>">Not a registered user?  Click here to register now!</a>
<div class="errors"><?=validation_errors(); ?></div>
</table>
</div>
</body>
</html>
