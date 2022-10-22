<?php

$conn_string = "host=ec2-52-18-201-153.eu-west-1.compute.amazonaws.com port=5432 dbname=dfohkfn3fl717 user=txbqslbmnzrozh password=d9b28f2ef3fb10f7b9a1b08375fab0c770adae150712c294c58ebdaa9e96e7c5";
$dbconn4 = pg_pconnect($conn_string);
if (!$dbconn4){
    echo 'Nooo(((';
}

$result = pg_query($dbconn4, "SELECT test FROM test");
print_r($result);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}

$resultList = [];

while ($row = pg_fetch_assoc($result)){
    $resultList[] = $row;
}

echo json_encode($resultList);
?>
