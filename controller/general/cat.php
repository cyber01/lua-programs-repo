<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: cat.php
 * Year: 2015
 */
$catname = strip_tags($_GET['catname']);
$this->title = "Все программы из выбранной категории";
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/class/cat.inc.php';
$catnamebyurl  = $db->row("SELECT id,name FROM categories where url= '$catname'");
$catid = $catnamebyurl["id"];
$programs = $db->rows("SELECT * FROM programs WHERE category = '$catid' ORDER BY time DESC");
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/template/general/cat.tpl';