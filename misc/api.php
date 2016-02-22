<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: api.php
 * Year: 2015
 */
function strip_data($text)
{
    $quotes = array ("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!" );
    $goodquotes = array ("-", "+", "#" );
    $repquotes = array ("\-", "\+", "\#" );
    $text = trim( strip_tags( $text ) );
    $text = str_replace( $quotes, '', $text );
    $text = str_replace( $goodquotes, $repquotes, $text );
    $text = ereg_replace(" +", " ", $text);
            
    return $text;
} 
$action = strip_data($_GET['action']);
$value = strip_data($_GET['value']);
$id = strip_data($_GET['id']);
if (empty($action) || empty($value))
{
    die("Данные не переданы");
}
else
{
    $dsn = 'mysql:dbname=xxxx;host=127.0.0.1';
    $user = 'xxxx';
    $password = 'xxxx';
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    if ($action == 'cat' && $value == 'list') {
        $query = "SELECT id,name FROM categories ORDER BY id ASC";
    }
    elseif ($action == 'progs' && $value == 'list') {
        $query = "SELECT * FROM programs ORDER BY id ASC";
    }
    elseif ($action == 'progs' && $value == 'rating') {
        $query = "SELECT * FROM programs ORDER BY rating DESC";
    }
    elseif ($action == 'progs' && $value == 'downloads') {
        $query = "SELECT * FROM programs ORDER BY downloads DESC";
    }
    elseif ($action == 'progs' && $value == 'date') {
        $query = "SELECT * FROM programs ORDER BY time DESC";
    }
    elseif ($action == 'progs' && $value == 'info') {
        if (empty($id)) { die("Не указан идентификатор"); }
        elseif (!is_numeric($id)) { die ("Указан не числовой ID"); }
        else {
            $query = "SELECT * FROM programs WHERE id = '$id'";
        }
    }
    elseif ($action == 'progs' && $value == 'downloadurls') {
        if (empty($id)) { die("Не указан идентификатор"); }
        elseif (!is_numeric($id)) { die ("Указан не числовой ID"); }
        else {
            $query = "SELECT pastebin_url,git_url FROM programs WHERE id = '$id'";
        }
    }
    elseif ($action == 'progs' && $value == 'author') {
        if (empty($id)) { die("Не указан идентификатор"); }
        else {
            $query = "SELECT * FROM programs WHERE author = '$id'";
        }
    }
    elseif ($action == 'progs' && $value == 'cat') {
        if (empty($id)) { die("Не указан идентификатор"); }
        elseif (!is_numeric($id)) { die ("Указан не числовой ID"); }
        else {
            $query = "SELECT * FROM programs WHERE category = '$id'";
        }
    }
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $encode = json_encode($row,JSON_UNESCAPED_UNICODE);
        echo($encode);
        //print_r($row);
}
?>