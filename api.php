<?php
require_once 'config/connect.php';
$str_json = file_get_contents('php://input');
$request = json_decode($str_json)->id;
echo $request." product now invisible";
$queryResult = $connect->query("UPDATE `products` SET `VISIBILITY` = '0' WHERE `products`.`ID` = '$request'");