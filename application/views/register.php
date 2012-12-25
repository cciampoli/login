<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ChrisChross Spellbook Registration</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>

<div id="container">
	<div align="center">
<h1>Registration</h1>
<table>
<?php echo form_open('admin/register'); ?>
<p><?=form_label('First Name', 'first_name'); ?></p>
<p><?=form_input('first_name', set_value('first_name'), 'id="first_name"'); ?></p>
<p><?=form_label('Last Name', 'last_name'); ?></p>
<p><?=form_input('last_name', set_value('last_name'), 'id="last_name"'); ?></p>
<p><?=form_label('Email Address', 'email_address'); ?></p>
<p><?=form_input('email_address', set_value('email_address'), 'id="email_address"'); ?></p>
<p><?=form_label('Password', 'password'); ?></p>
<p><?=form_password('password', '', 'id="password"'); ?></p>
<p><?=form_submit('submit', 'Submit!'); ?></p>
<?php echo form_close(); ?>
<a href="<?=site_url('admin'); ?>">Already a member?  Click here to login</a>
<div class="errors"><?=validation_errors(); ?></div>
</table>
</div>

	<p class="footer">ChrisChross Spellbook</p>
</div>
</body>
</html>
