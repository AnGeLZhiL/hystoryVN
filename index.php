<?php
require 'connect.php';

die($_GET['q']);

header('Content-Type: application/json; charset=utf-8');

$users = pg_query($dbconn4, "SELECT * FROM users");

$usersList = [];

while ($user = pg_fetch_assoc($users)){
    $usersList[] = $user;
}

echo json_encode($usersList);

?>
