<?php
echo "hello";
require_once 'config/connect.php';
$str_json = file_get_contents('php://input');
$request = array();
$request['type'] = json_decode($str_json)->type;
$request['id'] = json_decode($str_json)->id;
if ($request['type']=='increment') {
    $queryResult = $connect->query("UPDATE `products` SET `PRODUCT_QUANTITY` = `PRODUCT_QUANTITY` + 1 WHERE `products`.`ID` = '".$request['id']."'");
}

if ($request['type']=='decrement') {
    $queryResult = $connect->query("UPDATE `products` SET `PRODUCT_QUANTITY` = `PRODUCT_QUANTITY` - 1 WHERE `products`.`ID` = '".$request['id']."'");
}