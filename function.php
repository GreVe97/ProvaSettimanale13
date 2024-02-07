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

function login($mysqli, $email, $password) {
    $sql = "SELECT * FROM books WHERE email = '$email'";
    $res = $mysqli->query($sql);
    //var_dump($res);
    if($res) { // Controllo se ci sono dei dati nella variabile $res 
        $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
    }
    //var_dump($result['password']);
    if(password_verify($password, $result['password'])){
        echo 'Login effettuato!!';
        $_SESSION['userLogin'] = $result;
        session_write_close();
        exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));
    } else {
        echo 'Password errata!!';
    }
}

function addPost($mysqli, $title, $description) {
    $user = $_SESSION['userLogin']['id'];
    if($user) {
        $sql = "INSERT INTO posts (title, description, user_id) 
        VALUES ('$title', '$description', $user);";
        if (!$mysqli->query($sql)) {
            echo ($mysqli->connect_error);
        }
    }
}

function getPostsByBookID($mysqli, $userID) {
    $result = [];
    $sql = "SELECT * FROM books INNER JOIN posts ON books.id = posts.user_id WHERE posts.user_id  = $userID";
    $res = $mysqli->query($sql);
    if($res) { 
        while ($row = $res->fetch_assoc()) { 
            $result[] = $row; 
        }
    }
    return $result;
}