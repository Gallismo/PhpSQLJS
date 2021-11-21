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
            UNIQUE KEY(PRODUCT_ID),
            UNIQUE KEY(PRODUCT_ARTICLE)
)");

//$records = selectRecordsFrom('Products', 1, 'DATE_CREATE', 'DESC');
//foreach ($records as $record) {
//    print_r($record);
//    echo "<br>";
//}
class CProduct {
    function __construct()
    {
    }

    public function selectRecordsFrom($table, $count, $sort, $sort_type) {
        global $connect;
        $result = array();
        $queryResult = $connect->query("SELECT * FROM $table ORDER BY $sort $sort_type LIMIT $count");
        for($i=$queryResult->num_rows; $i>0; $i--) {
            $result[] = $queryResult->fetch_assoc();
        }
        return $result;
    }
}