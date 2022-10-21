<?php

$connection = mysqli_connect(
	'172.20.8.5',
	'iz0901_08',
	'pwd0901_8',
	'iz0901_08'
);

if ($connection === false){
	echo "ploxo emy";
	die(mysqli_connect_error());
	
}
echo "norm emy";

mysqli_set_charset($connection, "utf8");

?>
