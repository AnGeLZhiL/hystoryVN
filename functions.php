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

function addUser($dbconn4, $data){
    $user_last_name = $data['user_last_name'];
    $user_first_name = $data['user_first_name'];
    $user_midlle_name = $data['user_midlle_name'];
    $user_login = $data['user_login'];
    $user_password = $data['user_password'];

    $result = pg_query($dbconn4, "INSERT INTO users(
        user_last_name, user_first_name, user_midlle_name, user_login, user_password, user_role)
        VALUES ('$user_last_name', '$user_first_name', '$user_midlle_name', '$user_login', '$user_password', 1) RETURNING id");

    http_response_code(201);

    while ($id_user = pg_fetch_assoc($result)) {
            print_r($id_user);
    }

    $res = [
        "status" => true,
        "id" => $insert_id
    ];

    echo json_encode($res);
}

?>
