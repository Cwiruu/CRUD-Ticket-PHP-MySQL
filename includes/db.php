<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crudapp';

$connection = mysqli_connect($host, $username, $password, $dbname);

if(!$connection) {
    die(mysqli_connect_error());
}

?>