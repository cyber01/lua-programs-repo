<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: download.php
 * Year: 2015
 */
$programid = $_GET['id'];

if (is_numeric($programid))
{
    $db = new PDO('mysql:host=localhost;dbname=xxxx','xxxx','xxxx');
    $selrows=$db->query("SELECT pastebin_url,git_url FROM programs WHERE id = '$programid'");
    $updatecount=$db->query("UPDATE programs SET downloads=+1 WHERE id = '$programid'");
foreach ($selrows as $programurl) {
}
    if(empty($programurl['git_url']) && empty($programurl['pastebin_url']))
    {
        die("Не найдено ссылки для загрузки");
    }
    elseif(empty($programurl['git_url']))
    {
        $downloadurl = "http://pastebin.com/raw.php?i={$programurl['pastebin_url']}";
        $name= $programurl['pastebin_url'];
    }
    elseif(empty($programurl['pastebin_url']))
    {
        $downloadurl = $programurl['git_url'];
        $name = $programurl['git_url'];
    }
    else
    {
        $downloadurl = "http://pastebin.com/raw.php?i={$programurl['pastebin_url']}";
        $name= $programurl['pastebin_url'];
    }
header("Content-Disposition: attachment; filename={$name}.lua");
header("Content-Type: application/octet-stream");
@readfile($downloadurl);
}
?>