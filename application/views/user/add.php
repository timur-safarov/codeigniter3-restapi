<!DOCTYPE html>
<html>
<head>
	<title><?=$title;?></title>

	<style type="text/css">
		.error {
			color: #FF0000;
		}
	</style>

</head>
<body>

	<h3><?=$title;?></h3>

	<?=validation_errors('<p class="error">', '</p>');?>

	<?=form_open('user/add');?>

	<?=form_input(['name' => 'name', 'value' => $this->input->post('name'), 'placeholder' => 'Имя пользователя', 'style' => 'width: 200px']);?>
	<br />
	<?=form_input(['name' => 'login', 'value' => $this->input->post('login'), 'placeholder' => 'Логин', 'style' => 'width: 200px', 'maxlength' => '8']);?>
	<br />
	<?=form_input(['name' => 'password', 'value' => $this->input->post('password'), 'placeholder' => 'Пароль', 'style' => 'width: 200px', 'maxlength' => '8']);?>
	<br />
	<?=form_input(['name' => 'email', 'value' => $this->input->post('email'), 'placeholder' => 'Email', 'style' => 'width: 200px']);?>

	<br />

	<?=form_submit('submit', 'Добавить!');?>

	<?=form_close();?>

	<?php foreach($users as $user):?>

		<p>
			<?=$user['name'];?>
		</p>

	<?php endforeach;?>


</body>
</html>