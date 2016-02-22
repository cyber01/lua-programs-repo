<?php
$this->title = 'Добавление программы';
if (empty($_SESSION['auth'])):
	header("Location: http://".$this->basepath."/auth/");
	exit;
endif;
$check_values = new filter();
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/class/cat.inc.php';
//var_dump($check_values->check('name','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,50}$~u'));
//var_dump($check_values->check('version','post','regexp','~^[а-яА-ЯA-Za-z0-9-.\s]{1,15}$~u'));
//var_dump($check_values->check('category','post','int'));
//var_dump($check_values->check('paste','post','url'));
//var_dump($check_values->check('git','post','url'));
//var_dump($check_values->check('forum','post','url'));
//var_dump($check_values->check('sdesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,60}$~u'));
//var_dump($check_values->check('ldesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,250}$~u'));
//var_dump($check_values->check('deps','post','regexp','~^[0-9,]*$~u'));
//var_dump($_POST["submit"]);
// Проверка данных
if ($_POST["submit"] == 1 and
	$check_values->check('name','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,50}$~u') and
	$check_values->check('version','post','regexp','~^[а-яА-ЯA-Za-z0-9-.\s]{1,15}$~u') and
	$check_values->check('category','post','int') and
	$check_values->check('forum','post','url') and
	($check_values->check('paste','post','regexp','~^[A-Za-z0-9]{8}$~u') OR ($check_values->check('git','post','url'))) and
	$check_values->check('sdesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,60}$~u') and
	$check_values->check('ldesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,250}$~u') and
	$check_values->check('tags','post','regexp','~^[а-яА-ЯA-Za-z0-9-,\s]{1,250}$~u')
	) {
	$check_values->sanitize('name', 'post', 'regexp');
	$check_values->sanitize('version', 'post', 'regexp');
	$check_values->sanitize('paste', 'post', 'regexp');
	$check_values->sanitize('sdesc', 'post', 'regexp');
	$check_values->sanitize('ldesc', 'post', 'regexp');
	$check_values->sanitize('deps', 'post', 'regexp');
	$check_values->sanitize('tags', 'post', 'regexp');

	// Добавление программы
	$git = str_replace("/blob/", "/raw/", $_POST['git']);
	$insertrow = $db->insert("INSERT INTO programs (name, description, sdesc, author, version, category, pastebin_url, git_url, forum_url, time, deps, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(),?,?)", array($_POST['name'], $_POST['ldesc'], $_POST['sdesc'], $_SESSION['auth']['name'], $_POST['version'], $_POST['category'], $_POST['paste'], $git, $_POST['forum'], $_POST['deps'], $_POST['tags']));
	$keywords = $_POST['tags'];
	$chars = explode(",", $keywords);
	$i=0;
	do {
		$result_chars = $chars[$i];
		$result_choice_up = $db->rows("SELECT tag_name, count FROM tags WHERE tag_name='$result_chars'");
		if(count($result_choice_up) == 1) {
			$new_count = $result_choice_up["count"]+1;
			$result = $db->update("UPDATE tags SET count= ? WHERE tag_name= '$result_chars'", array($new_count));
			$i++;
		}
		else {
			$result = $db->insert("INSERT INTO tags (tag_name, count) VALUES (?, 1)",array($result_chars));
			$i++;
		}}
	while (!empty($chars[$i]));
	header("Location: http://" . $this->basepath . "/progs/");
	exit();
}
else
{
	$err[0] = '<div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="alert alert-dismissible alert-danger">Ошибка в заполненных данных!<br>
                        Нажмите кнопку назад и попробуйте снова</div></div>
                </div>';
}
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/template/general/progsadd.tpl';