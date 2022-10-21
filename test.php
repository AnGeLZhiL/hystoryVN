<?php
$host = "ec2-52-18-201-153.eu-west-1.compute.amazonaws.com";
$user = "txbqslbmnzrozh";
$password = "d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbname = "dfohkfn3fl717";
$port = "5432";

try {
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";

    $result = pg_query($dsn, "SELECT * FROM test");
//     if (!$result) {
//         echo "An error occurred.\n";
//       }
      
//       while ($row = pg_fetch_row($result)) {
//         echo "Test: $row[0] ";
//       }
    print_r($result);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>
