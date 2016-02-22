<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: index.php
 * Year: 2015
 */
session_start();
// Автоматический загрузчик классов
require $_SERVER["DOCUMENT_ROOT"].'/class/autoloader.class.php';
spl_autoload_register(array('autoloader', 'loadPackages'));
// Инициализируем шаблонизатор
$tpl = new template();
// Подгружаем конфиг файл
require $_SERVER["DOCUMENT_ROOT"].'/config.php';
$tpl->db_con = new database(BASE_DB, "mysql", BASE_SERVER, BASE_USER, BASE_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$tpl->basepath = 'rep.computercraft.ru';
//$tpl->basepath = 'domain-reg.oxnull.net';
$tpl->basehome = '/repo';
$tpl->info_menu_no_auth = $menu_main_no_auth; unset($menu_main_no_auth);
$tpl->info_menu_auth = $menu_main_auth; unset($menu_main_auth);
//$tpl->info_menu_adm = $menu_shop; unset($menu_shop);
$tpl->controller = $tpl->controller("general");
$tpl->template = $tpl->template("template_general");
echo $tpl->template;
?>