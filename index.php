<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json; charset=utf-8');

require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];

$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

if ($method === 'GET'){
    if ($type === 'users'){
        if (isset($id)){
            getUser($dbconn4, $id);
        } else {
            getUsers($dbconn4);
        }    
    } elseif ($type === 'categories'){
        if (isset($id)){
            getCategory($dbconn4, $id);
        } else {
            getCategories($dbconn4);
        } 
    }
} elseif ($method === 'POST') {
    if ($type === 'register'){
        addUser($dbconn4, $_POST);
    }
    if ($type === 'login'){
        loginUser($dbconn4, $_POST);
    }
}
?>


?>
