<?php

header('Content-Type: application/json; charset=utf-8');

require 'connect.php';

$type = $_GET['q'];

if ($type === 'users'){
    $users = pg_query($dbconn4, "SELECT * FROM users");
    $usersList = [];
    while ($user = pg_fetch_assoc($users)){
        $usersList[] = $user;
    }
    echo json_encode($usersList);
}



?>
