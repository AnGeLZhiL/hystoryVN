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

    if (pg_num_rows($user) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "User not found"
        ];
        echo json_encode($res);
    } else {
        $user = pg_fetch_assoc($user);
        echo json_encode($user);
    }
}
?>
