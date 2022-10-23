<?php

header('Content-Type: application/json; charset=utf-8');

require 'connect.php';
require 'functions.php';

$q = $_GET['q'];

$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

if ($type === 'users'){

    if (isset($id)){
        getUser($dbconn4, $id);
    } else {
        getUsers($dbconn4);
    }    
}
?>
