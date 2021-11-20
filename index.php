<?php
require_once 'config/connect.php';
$connect->query(
    "CREATE TABLE IF NOT EXISTS `Products`(
            `ID` INT NOT NULL AUTO_INCREMENT,
            `PRODUCT_ID` INT NOT NULL,
            `PRODUCT_NAME` VARCHAR(255) NOT NULL,
            `PRODUCT_PRICE` INT NOT NULL,           
            `PRODUCT_ARTICLE` VARCHAR(13) NOT NULL,
            `PRODUCT_QUANTITY` INT DEFAULT '0',
            `DATE_CREATE` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `VISIBILITY` BOOLEAN DEFAULT '1', 
            PRIMARY KEY(ID), 
            UNIQUE KEY(PRODUCT_ID)
)");
function selectRecordsFrom($table, $count) {
    global $connect;
    $result = array();
    $queryResult = $connect->query("SELECT * FROM $table LIMIT $count");
    for($i=$queryResult->num_rows; $i>0; $i--) {
        $result[] = $queryResult->fetch_assoc();
    }
    return $result;
}

$records = selectRecordsFrom('Products', 1);
foreach ($records as $record) {
    print_r($record);
    echo "<br>";
}