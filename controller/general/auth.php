<?php
$this->title = 'Вход на сайт';
if (!empty($_GET['action']) and $_GET['action'] == 'logout'):
	unset($_SESSION['auth']);
	header("Location: http://rep.computercraft.ru/main/");
	exit;
endif;

if (!empty($_SESSION['auth'])):
	header("Location: http://rep.computercraft.ru/progs/");
	exit;
endif;
$pw = new password();
$check_values = new filter();

$err[0] = '';
$err[1] = '';
$err[2] = '';

if (
	$check_values->check('login','post','regexp','~^[A-Za-z0-9]{1,20}$~') and 
	$check_values->check('password','post','regexp','~^[A-Za-z0-9]{1,20}$~')
	):

	$user = $db->row("SELECT member_id, name, members_pass_hash, members_pass_salt, member_group_id FROM comp_members WHERE name = ?", array($_POST['login'])); // Проверяем существование пользователя
	if ($user):
		$check = $pw->check($_POST['password'],$user['members_pass_hash'],$user['members_pass_salt']);
		//var_dump($check);
		if ($check):
			// Выполняем авторизацию
			$_SESSION['auth']['name'] = $user['name'];
			$_SESSION['auth']['forum_id'] = $user['member_id'];
			$_SESSION['auth']['group_id'] = $user['member_group_id'];
			header("Location: http://rep.computercraft.ru/progs/");
			exit;
		else:
			$err[2] = '<div class="input-error error">Неверный логин или пароль</div>';
		endif;

	else:
		$err[2] = '<div class="input-error error">Неверный логин или пароль</div>';
	endif;

endif;

	if (empty($_POST['login'])):
		$err[0] = '<div class="input-error error">Введите логин</div>';
	endif;
	
	if (empty($_POST['password'])):
		$err[1] = '<div class="input-error error">Введите пароль</div>';
	endif;

require $_SERVER["DOCUMENT_ROOT"].'/template/general/auth.tpl';