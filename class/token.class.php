<?php

/**
*        Генерация и проверка токена
*
*        $tk = new token();
*
*        $tk->generate(); // Генерация токена
*
*        $tk->input(); // Генерация и вывод скрытого input (для форм)
*
*        $tk->check($_POST['token']); // Сверка токена (принимает токен пришедший от пользователя через POST)
*
*/

class token
{
	function __construct()
	{
		if (!session_id()) {
			session_start();
		}
	}

	function generate() {
		$uniq_id = uniqid();
		$_SESSION['token'] = $uniq_id;
		return $uniq_id;
	}

	function input() {
		$token_html = '<input type="hidden" name="token" value="'.$this->generate().'" />';
		return $token_html;
	}

	function check($get_token = null) {
		if (empty($get_token) or empty($_SESSION['token'])) {
			return false;
		} else if ($get_token == $_SESSION['token']) {
			return true;
		} else {
			return false;
		}
	}

}