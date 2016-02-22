<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: progsedit.php
 * Year: 2015
 */
$this->title = 'Редактирование программы';
if (empty($_SESSION['auth'])):
    header("Location: http://".$this->basepath."/auth/");
    exit;
endif;
$programid = strip_tags($_GET['id']);
$check_values = new filter();
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/class/cat.inc.php';
$get_progs = $db->rows("SELECT * FROM programs WHERE id = ?", array("replace" => array($programid)));
foreach ($get_progs as $proginf) {
    $catid = $proginf['category'];
    $author = $proginf['author'];
    $catnamebyid = $db->row("SELECT name FROM categories where id= '$catid'");
}
//var_dump($check_values->check('deps','post','regexp','~^[0-9,]*$~u'));
// Проверка данных
if ( $_POST["submit"] == 1 and
    $check_values->check('name','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,50}$~u') and
    $check_values->check('version','post','regexp','~^[а-яА-ЯA-Za-z0-9-.\s]{1,15}$~u') and
    $check_values->check('category','post','int') and
    $check_values->check('forum','post','url') and
    ($check_values->check('paste','post','regexp','~^[A-Za-z0-9]{8}$~u') OR ($check_values->check('git','post','url'))) and
    $check_values->check('sdesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,60}$~u') and
    $check_values->check('ldesc','post','regexp','~^[а-яА-ЯA-Za-z0-9-\()\/,.\s]{1,250}$~u') and
    $check_values->check('tags','post','regexp','~^[а-яА-ЯA-Za-z0-9-,\s]{1,250}$~u')
) {
    if ($author == $_SESSION['auth']['name']) {
        $check_values->sanitize('name', 'post', 'regexp');
        $check_values->sanitize('version', 'post', 'regexp');
        $check_values->sanitize('paste', 'post', 'regexp');
        $check_values->sanitize('sdesc', 'post', 'regexp');
        $check_values->sanitize('ldesc', 'post', 'regexp');
        $check_values->sanitize('deps', 'post', 'regexp');
		$check_values->sanitize('tags', 'post', 'regexp');
        // Обновление программы
        $git = str_replace("/blob/", "/raw/", $_POST['git']);
        $update = $db->update("UPDATE programs SET name = ?, description = ?, sdesc=?,author=?,version=?,category=?,pastebin_url=?,git_url=?,forum_url=?,time= CURDATE(),deps= ?,git_url= ?,tags = ? WHERE id = ?", array($_POST['name'], $_POST['ldesc'], $_POST['sdesc'], $_SESSION['auth']['name'], $_POST['version'], $_POST['category'], $_POST['paste'], $_POST['git'], $_POST['forum'], $_POST['deps'], $git, $_POST['tags'], $programid));
        $keywords = $_POST['tags'];
        $chars = explode(",", $keywords);
        $i=0;
        do {
            $result_chars = trim($chars[$i]);
            $result_choice_up = $db->rows("SELECT tag_name, count FROM tags WHERE tag_name='$result_chars'");
            if(count($result_choice_up)>0) {
                $new_count = $result_choice_up["count"]+1;
                $result = $db->update("UPDATE tags SET count= ? WHERE tag_name= ?", array($new_count,$result_chars));
                $i++;
            }
            else {
                $result = $db->insert("INSERT INTO tags (tag_name, count) VALUES (?, 1)",array($result_chars));
                $i++;
            }}
        while (!empty($chars[$i]));
        header("Location: http://" . $this->basepath . "/progs/");
        exit();
    } else {
        $err[0] = '<div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="alert alert-dismissible alert-danger">Вы не автор этой программы!</div></div>
                </div>';
    }
}
else
{
}

require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/template/general/progsedit.tpl';