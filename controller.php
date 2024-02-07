<?php
require_once 'config.php';
include_once('function.php');

$libri = [];
$target_dir = "uploads/";
$cover = $target_dir .'defaultCover.jpg';

if (!empty($_FILES['cover'])) {
    if ($_FILES['cover']["type"] === 'image/png' || $_FILES['cover']["type"] === 'image/jpg'|| $_FILES['cover']["type"] === 'image/jpeg') {
        if ($_FILES['cover']["size"] < 4000000) {
            if (is_uploaded_file($_FILES['cover']["tmp_name"]) && $_FILES['cover']["error"] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($_FILES['cover']["tmp_name"], $target_dir .str_replace(' ', '', $_REQUEST['title']) )) {
                    $cover = $target_dir . str_replace(' ', '', $_REQUEST['title']) ;
                    echo 'Caricamento avvenuto con successo';
                } else {
                    echo 'Errore!!!';
                }
            }
        } else {
            echo 'FileSize troppo grande';
        }
    } else {
        echo 'FileType non supportato';
    }
}




if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: http://localhost/ProvaSettimanale13'));
}else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'update') {
   
    $title = strlen(trim(htmlspecialchars($_REQUEST['title']))) > 0 ? trim(htmlspecialchars($_REQUEST['title'])) : exit();
    $genre = strlen(trim(htmlspecialchars($_REQUEST['genre']))) > 2 ? trim(htmlspecialchars($_REQUEST['genre'])) : exit();
    $author = strlen(trim(htmlspecialchars($_REQUEST['author']))) > 0 ? trim(htmlspecialchars($_REQUEST['author'])) : exit();
    $year = intval($_REQUEST['year'])<intval( date('Y')) ? intval($_REQUEST['year']) : exit(); 

    updateBook($mysqli, $_REQUEST['id'], $title, $genre, $author, $year, $cover);
    exit(header('Location: http://localhost/ProvaSettimanale13'));
} else {
    $year = intval($_REQUEST['year'])<intval( date('Y')) ? intval($_REQUEST['year']) : exit(); 

    $title = strlen(trim(htmlspecialchars($_REQUEST['title']))) > 0 ? trim(htmlspecialchars($_REQUEST['title'])) : exit();
    $genre = strlen(trim(htmlspecialchars($_REQUEST['genre']))) > 2 ? trim(htmlspecialchars($_REQUEST['genre'])) : exit();
    $author = strlen(trim(htmlspecialchars($_REQUEST['author']))) > 2 ? trim(htmlspecialchars($_REQUEST['author'])) : exit();
   

    createBook($mysqli, $title, $genre, $author, $year, $cover);
}


 exit(header('Location: http://localhost/ProvaSettimanale13'));

















?>