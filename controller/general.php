<?php
$db = $this->db_con;
// Если не передан, то отправляем на main
if (empty($_GET['page'])):
	$_GET['page'] = 'main';
	$page = 'main';
endif;
// Если не передан, то отправляем на main

// Проверяем фильтром пришедшие данные
$check_page = new filter();
if (empty($page)):
	$page = $check_page->check('page','get','regexp','~^[a-z]{1,20}$~');
endif;
// Проверяем фильтром пришедшие данные

// Подгружаем нужный субконтроллер
if ($page):
	$sub_controller = $_SERVER["DOCUMENT_ROOT"].'/controller/general/'.$page.'.php';
	if (file_exists($sub_controller)):
		require $sub_controller;
	else:
		//echo "Ошибка, субконтроллер не найден";
		header("Location: http://rep.computercraft.ru/");
	endif;
else:
	//echo "Ошибка, не пройдена валидация субконтроллера";
	header("Location: http://rep.computercraft.ru/");
endif;
// Подгружаем нужный субконтроллер
// Менюшка
if (empty($_SESSION['auth'])):
	$arr = $this->info_menu_no_auth;
else:
	$arr = $this->info_menu_auth;
endif;

$mnu = new menu();
$this->menu = $mnu->gen($arr,'page');
// Менюшка