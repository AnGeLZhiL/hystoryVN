<?php
$host = "ec2-52-18-201-153.eu-west-1.compute.amazonaws.com";
$user = "txbqslbmnzrozh";
$password = "d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbname = "dfohkfn3fl717";
$port = "5432";

try {
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo '1';
    if (!$dsn){
        echo 'Соединения нет';
    }
    echo '2';

    $sql = 'SELECT test FROM test';
    echo '3';
    $stmt = $pdo->prepare($sql);
    echo '4';
    $stmt->execute();
    echo '5';
    $rowCount = $stmt->rowCount();
    echo '6';
    $details = $stmt->fetch();
    echo '7';
  
    print_r (json_encode($details));

    // $result = pg_query($dsn, "SELECT test FROM test");
    // if (!$result) {
    //     echo '3';
    //     echo "An error occurred.\n";
    //   }
    //   echo '4';
    //   while ($row = pg_fetch_row($result)) {
    //       echo '5';
    //     echo "Test: $row[0] ";
    //   }
    // echo '6';
    // print_r($result);
    // echo '7';
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>
