<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: progsdel.php
 * Year: 2015
 */
$this->title = 'Удаление программы';
if (empty($_SESSION['auth'])):
    header("Location: http://rep.computercraft.ru/auth/");
    exit;
endif;
$programid = strip_tags($_GET['id']);
if ($_POST["del"])
{
    $getauthor = $db->row("SELECT author FROM programs where id= '$programid'");
    if ($getauthor["author"] == $_SESSION['auth']['name'])
    {
        $delete = $db->delete("DELETE FROM programs WHERE id = ?", array($programid));
        header("Location: http://rep.computercraft.ru/progs/");
        exit();
    }
    else
    {
        $err[0] = '<div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <div class="alert alert-dismissible alert-success">Ошибка!</div></div>
                </div>';
    }
}

require $_SERVER["DOCUMENT_ROOT"].'/template/general/progsdel.tpl';