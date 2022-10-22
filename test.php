<?php
$host = "ec2-52-18-201-153.eu-west-1.compute.amazonaws.com";
$user = "txbqslbmnzrozh";
$password = "d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbname = "dfohkfn3fl717";
$port = "5432";

try {
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
    echo '1';
    if (!$dsn){
        echo 'Соединения нет';
    }
    echo '2';
    $result = pg_query($dsn, "SELECT test FROM test");
    if (!$result) {
        echo '3';
        echo "An error occurred.\n";
      }
      echo '4';
      while ($row = pg_fetch_row($result)) {
          echo '5';
        echo "Test: $row[0] ";
      }
    echo '6';
    print_r($result);
    echo '7';
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>
