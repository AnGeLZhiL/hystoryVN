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

function getCategories($dbconn4){
    $categories = pg_query($dbconn4, "SELECT * FROM v_categories");
    $categoriesList = [];
    while ($category = pg_fetch_assoc($categories)){
        $categoriesList[] = $category;
    }
    echo json_encode($categoriesList);
}

function getCategory($dbconn4, $id){
    $category = pg_query($dbconn4, "SELECT * from v_categories where id = '$id'");

    if (pg_num_rows($category) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Category not found"
        ];
        echo json_encode($res);
    } else {
        $category = pg_fetch_assoc($category);
        echo json_encode($category);
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

    $id_user = pg_fetch_assoc($result);
    $id_user = current($id_user);

    $res = [
        "status" => true,
        "id" => $id_user
    ];

    echo json_encode($res);
}

function loginUser($dbconn4, $data){
    $user_login = $data['user_login'];
    $user_password = $data['user_password'];

    $user = pg_query($dbconn4, "SELECT * FROM users where user_login = '$user_login' and user_password = '$user_password'");

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

function getTests($dbconn4){
    $categories = pg_query($dbconn4, "SELECT * FROM tests");
    $categoriesList = [];
    while ($category = pg_fetch_assoc($categories)){
        $categoriesList[] = $category;
    }
    echo json_encode($categoriesList);
}

function getTest($dbconn4, $id){
    $category = pg_query($dbconn4, "SELECT * from tests where id = '$id'");

    if (pg_num_rows($category) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Test not found"
        ];
        echo json_encode($res);
    } else {
        $category = pg_fetch_assoc($category);
        echo json_encode($category);
    }
}

function getUserTests($dbconn4, $id){
    $usertest = pg_query($dbconn4, "SELECT * from users_tests_attempt where id_user = '$id'");

    if (pg_num_rows($usertest) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Test user not found"
        ];
        echo json_encode($res);
    } else {
        $userstestsList = [];
        while ($usertest = pg_fetch_assoc($usertest)){
            $userstestsList[] = $usertest;
        }
        echo json_encode($userstestsList);
    }
}

?>
