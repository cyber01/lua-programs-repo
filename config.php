<?php
/**
 * Project: repko
 * Created by: cyber01
 * Filename: config.php
 * Year: 2015
 */
// Соединение с базой данных
define("BASE_SERVER", "localhost");
define("BASE_USER", "ox2445");
define("BASE_PASSWORD", "eiyahwooxisi");
define("BASE_DB", "ox2445");
define("TABLE_PREFIX", "");


// Меню главной страницы без авторизации
$menu_main_no_auth[0]['name'] = 'Главная';
$menu_main_no_auth[0]['url'] = 'main';
$menu_main_no_auth[0]['position'] = '1';

$menu_main_no_auth[1]['name'] = 'Вход';
$menu_main_no_auth[1]['url'] = 'auth';
$menu_main_no_auth[1]['position'] = '2';

$menu_main_no_auth[2]['name'] = 'О сервисе';
$menu_main_no_auth[2]['url'] = 'about';
$menu_main_no_auth[2]['position'] = '3';

//$menu_main_no_auth[3]['name'] = 'Теги';
//$menu_main_no_auth[3]['url'] = 'tags';
//$menu_main_no_auth[3]['position'] = '4';

// Меню главной страницы без авторизации

// Меню главной страницы с авторизацией
$menu_main_auth[0]['name'] = 'Главная';
$menu_main_auth[0]['url'] = 'main';
$menu_main_auth[0]['position'] = '1';

$menu_main_auth[1]['name'] = 'Мои программы';
$menu_main_auth[1]['url'] = 'progs';
$menu_main_auth[1]['position'] = '2';

$menu_main_auth[2]['name'] = 'Добавить программу';
$menu_main_auth[2]['url'] = 'progs/add';
$menu_main_auth[2]['position'] = '3';

/*$menu_main_auth[3]['name'] = 'Теги';
$menu_main_auth[3]['url'] = 'tags';
$menu_main_auth[3]['position'] = '4';

$menu_main_auth[4]['name'] = 'Выход';
$menu_main_auth[4]['url'] = 'logout';
$menu_main_auth[4]['position'] = '5';*/
$menu_main_auth[3]['name'] = 'Выход';
$menu_main_auth[3]['url'] = 'logout';
$menu_main_auth[3]['position'] = '4';
// Меню главной страницы с авторизацией
?>