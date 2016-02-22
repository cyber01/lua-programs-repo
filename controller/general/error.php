<?php
$this->title = 'Ошибка';
$err = new error();
$error = (!empty($_SERVER['REDIRECT_STATUS'])) ? $err->status($_SERVER['REDIRECT_STATUS']) : $err->status(200);
require $_SERVER["DOCUMENT_ROOT"].'/template/general/error.tpl';