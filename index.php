<?php

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
    }
} elseif ($method === 'POST') {
    if ($type === 'users'){
        addUser($dbconn4, $_POST);
    }
}


?>
