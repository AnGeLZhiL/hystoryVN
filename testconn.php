<?php
global $con;
$host = "ec2-52-18-201-153.eu-west-1.compute.amazonaws.com";
$user = "txbqslbmnzrozh";
$password = "d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbname = "dfohkfn3fl717";
$port = "5432";
try{
    $con = pg_connect("host=ec2-52-18-201-153.eu-west-1.compute.amazonaws.com;port=5432;dbname=dfohkfn3fl717;user=txbqslbmnzrozh;password=d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5;");
    echo 'Ok';
}
catch(PDOException $e){
    echo 'No';
}

?>
