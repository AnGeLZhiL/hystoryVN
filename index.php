<?php

header('Content-Type: application/json; charset=utf-8');

require 'connect.php';
require 'functions.php';

$q = $_GET['q'];

$params = explode('/', $q);

die(print_r($params));

if ($type === 'users'){
    getUsers($dbconn4);
}
?>
