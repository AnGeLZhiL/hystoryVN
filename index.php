<?php
require 'connect.php';

$users = pg_query($dbconn4, "SELECT * FROM users");

$usersList = [];

while ($user = pg_fetch_assoc($users)){
    $usersList[] = $user;
}

echo json_encode($usersList);

?>
