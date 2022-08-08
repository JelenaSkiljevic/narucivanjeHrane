<?php

//Zapocinjanje sesije: Start Session
session_start();

define('SITEURL', 'http://localhost/narucivanjehrane/'); //izmeniti adresu kada bude bio gotov rad
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME','hrana');
   $username = 'root';
   $password = '';
   $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
   $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>