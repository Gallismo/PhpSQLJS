<?php
require_once 'db_config.php';

$connect = new mysqli($db['db_host'], $db['user'], $db['password']);

if ($connect->connect_error) {
    die("Connection failed: ".$connect->connect_error);
}
$db_name = $db['db_name'];
$connect->query("CREATE DATABASE IF NOT EXISTS $db_name");
$connect->select_db($db_name);