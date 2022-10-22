<?php
global $conn;
$host = "ec2-52-18-201-153.eu-west-1.compute.amazonaws.com";
$user = "txbqslbmnzrozh";
$password = "d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbname = "dfohkfn3fl717";
$port = "5432";

try{
    $conn = pg_connect("host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";");
    echo 'Ok';
    if (!$conn){
        echo 'Соединения нет';
    }
}
catch(PDOException $e){
    echo 'No';
}

$result = pg_query($conn, "SELECT test FROM test");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "Test: $row[0]";
}

?>
