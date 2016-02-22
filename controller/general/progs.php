<?php

if (empty($_SESSION['auth'])):
	header("Location: http://rep.computercraft.ru/auth/");
	exit;
endif;
// Проверяем фильтром пришедшие данные
$check_page = new filter();
// Проверяем фильтром пришедшие данные
	$this->title = 'Мои программы';
	$get_progs = $db->rows("SELECT * FROM programs WHERE author = ?", array("replace" => array($_SESSION['auth']['name'])));
	require $_SERVER["DOCUMENT_ROOT"].'/template/general/progs.tpl';