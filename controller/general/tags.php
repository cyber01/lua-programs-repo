<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: tags.php
 * Year: 2015
 */
$tag = $_GET["tag"];
$tag = str_replace("/","",$tag);
if(empty($tag))
{
    $this->title = "Теги";
}
else
{
    $this->title = "Все программы с тегом $tag";
}
$tags_cloud = $db->rows("SELECT * FROM tags");
$result_choice_up = $db->rows("SELECT * FROM programs");
require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/template/general/tags.tpl';