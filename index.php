<?php

header('Content-Type: application/json; charset=utf-8');

require 'connect.php';
require 'functions.php';

$type = $_GET['q'];

if ($type === 'users'){
    getUsers($dbconn4);
}
?>
