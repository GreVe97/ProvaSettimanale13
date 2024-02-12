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

function createBook($mysqli, $title, $genre, $author_id, $year, $cover)
{
   
    $result = [];
    $sql = "SELECT * FROM authors WHERE id = '$author_id';";
    $res = $mysqli->query($sql); 
    if ($res) { 
        while ($row = $res->fetch_assoc()) { 
            $result[] = $row;             
        }
    }
    $author = $result[0]["firstName"]. " ". $result[0]["lastName"];
    $sql = "INSERT INTO books (title, genre, author, cover, year, author_id) 
                VALUES ('$title', '$genre', '$author', '$cover', '$year', '$author_id');";
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

//Extra
function createAuthor($mysqli, $firstName, $lastName, $year){
    $sql = "INSERT INTO authors (firstName, lastName, year) 
                VALUES ('$firstName', '$lastName', '$year');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
}

function getAllAuthors($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM authors;";
    $res = $mysqli->query($sql); 
    if ($res) { 
        while ($row = $res->fetch_assoc()) { 
            $result[] = $row;             
        }
    }
    return $result;
}
function removeAuthor($mysqli, $id) {
    if(!$mysqli->query('DELETE FROM authors WHERE id = ' . $id)) { echo($mysqli->connect_error); }
    else { echo 'Record eliminato con successo!!!';}
}
function updateAuthor($mysqli,$id, $firstName, $lastName, $year) {
  
    $sql = "UPDATE authors SET 
                        firstName = '" . $firstName . "', 
                        lastName = '" . $lastName. "', 
                        year = '" . $year. "'                             
                        WHERE id = " . $id;
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiornato con successo!!!';}
}


function getAuthorByID($mysqli) {     
    $sql = "SELECT * FROM authors WHERE id = " . $_REQUEST['id']; 
    $res = $mysqli->query($sql); 
    if($res) { 
        $result = $res->fetch_assoc();  
    }
    return $result;    
} 


?>