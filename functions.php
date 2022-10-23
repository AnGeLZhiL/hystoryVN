<?php
function getUsers($dbconn4){
    $users = pg_query($dbconn4, "SELECT * FROM users");
    $usersList = [];
    while ($user = pg_fetch_assoc($users)){
        $usersList[] = $user;
    }
    echo json_encode($usersList);
}

function getUser($dbconn4, $id){
    $user = pg_query($dbconn4, "SELECT * FROM users where id = '$id'");
    $user = pg_fetch_assoc($user);
    echo json_encode($user);
}
?>
