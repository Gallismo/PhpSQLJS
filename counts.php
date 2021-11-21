<?php
require_once 'CProduct.php';
$str_json = file_get_contents('php://input');
$request = json_decode($str_json);
$CProduct->changeProductCount($request);