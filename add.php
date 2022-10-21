<?php
$dbconn3 = pg_connect("host=172.20.8.15 port=5432 dbname=st9901_11kp user=st9901 password=pwd9901");
if (!$link) { 
    printf("Невозможно подключиться к базе данных");
 } 
 echo "Вроде подключилось";
?>