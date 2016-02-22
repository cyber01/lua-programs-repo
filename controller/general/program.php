<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: cat.php
 * Year: 2015
 */
$programid = strip_tags($_GET['id']);
$this->title = "Информация о программе";
require $_SERVER["DOCUMENT_ROOT"].'/class/cat.inc.php';
$programinfo = $db->rows("SELECT * FROM programs WHERE id = '$programid'");
foreach ($programinfo as $proginf) {
    $catinfo = $proginf["category"];
}
$catnamebyurl  = $db->row("SELECT name FROM categories where id= '$catinfo'");
require $_SERVER["DOCUMENT_ROOT"].'/template/general/program.tpl';