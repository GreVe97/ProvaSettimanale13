<?php

function getAllBooks($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM books;";
    $res = $mysqli->query($sql); 
    if ($res) { 
        while ($row = $res->fetch_assoc()) { 
            $result[] = $row;             
        }
    }
    return $result;
}

function createBook($mysqli, $title, $genre, $author, $year, $cover)
{
    $sql = "INSERT INTO books (title, genre, author, cover, year) 
                VALUES ('$title', '$genre', '$author', '$cover', '$year');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
}

function removeBook($mysqli, $id) {
    if(!$mysqli->query('DELETE FROM books WHERE id = ' . $id)) { echo($mysqli->connect_error); }
    else { echo 'Record eliminato con successo!!!';}
}

function getBookByID($mysqli) {     
    $sql = "SELECT * FROM books WHERE id = " . $_REQUEST['id']; 
    $res = $mysqli->query($sql); 
    if($res) { 
        $result = $res->fetch_assoc();  
    }
    return $result;    
} 

function updateBook($mysqli,$id, $title, $genre, $author, $year, $cover) {
    var_dump($cover);
    $sql = "UPDATE books SET 
                        title = '" . $title . "', 
                        genre = '" . $genre. "', 
                        author = '" . $author. "', 
                        year = '" . $year. "',                      
                        cover = '" . $cover . "'
                        WHERE id = " . $id;
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiornato con successo!!!';}
}

?>