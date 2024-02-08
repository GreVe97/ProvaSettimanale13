<?php 

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']);
if($mysqli->connect_error) { die($mysqli->connect_error); } 

$sql = 'CREATE DATABASE IF NOT EXISTS libreria;';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); } 

$mysqli->query('USE libreria;'); 

$sql = 'CREATE TABLE IF NOT EXISTS books ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL, 
    genre VARCHAR(255) NOT NULL, 
    author VARCHAR(255) NOT NULL,    
    year INT NULL, 
    cover VARCHAR(255) NULL
   /*  author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (author) REFERENCES authors (name)  */
 
)';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); }
/* 
$sql = 'CREATE TABLE IF NOT EXISTS authors ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,     

)';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); } */

?>