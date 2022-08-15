<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'oop');

require_once "db_conn.php";

$db = new DatabaseConnection;

function validateInput ($dbconn, $input){
    return mysqli_real_escape_string($dbconn, $input);
}

function redirect($message, $page){
    $_SESSION['message'] = "$message";
    header("Location: $page");
    exit();
}
?>