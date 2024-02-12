<?php
require_once 'config.php';
include_once('function.php');
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
    $year = intval($_REQUEST['year']) < intval(date('Y')) ? intval($_REQUEST['year']) : exit(); 
    $cover = ($cover === $target_dir .'defaultCover.jpg') ?  $_REQUEST['oldCover'] : $cover; 
    updateBook($mysqli, $_REQUEST['id'], $title, $genre, $author, $year, $cover);
    exit(header('Location: http://localhost/ProvaSettimanale13')); 
    
} else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'createBook') { 
    var_dump($_REQUEST);
    $year = intval($_REQUEST['year'])<intval( date('Y')) ? intval($_REQUEST['year']) : exit(); 
    $title = strlen(trim(htmlspecialchars($_REQUEST['title']))) > 0 ? trim(htmlspecialchars($_REQUEST['title'])) : exit();
    $genre = strlen(trim(htmlspecialchars($_REQUEST['genre']))) > 2 ? trim(htmlspecialchars($_REQUEST['genre'])) : exit();
    $author = strlen(trim(htmlspecialchars($_REQUEST['author']))) > 2 ? trim(htmlspecialchars($_REQUEST['author'])) : exit();
   
    createBook($mysqli, $title, $genre, $author, $year, $cover);
    exit(header('Location: http://localhost/ProvaSettimanale13')); 
}

 

//Extra

if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'addAuthor') {
    $year = intval($_REQUEST['year'])<intval( date('Y')) ? intval($_REQUEST['year']) : exit(); 
    $firstName = strlen(trim(htmlspecialchars($_REQUEST['firstName']))) > 0 ? trim(htmlspecialchars($_REQUEST['firstName'])) : exit();
    $lastName = strlen(trim(htmlspecialchars($_REQUEST['lastName']))) > 2 ? trim(htmlspecialchars($_REQUEST['lastName'])) : exit();   
    createAuthor($mysqli, $firstName, $lastName, $year);
    exit(header('Location: http://localhost/ProvaSettimanale13/listaAutori.php')); 
}


?>