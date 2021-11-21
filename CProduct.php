<?php
require_once 'config/connect.php';
//$connect->query(
//    "CREATE TABLE IF NOT EXISTS `Products`(
//            `ID` INT NOT NULL AUTO_INCREMENT,
//            `PRODUCT_ID` INT NOT NULL,
//            `PRODUCT_NAME` VARCHAR(255) NOT NULL,
//            `PRODUCT_PRICE` INT NOT NULL,
//            `PRODUCT_ARTICLE` VARCHAR(13) NOT NULL,
//            `PRODUCT_QUANTITY` INT DEFAULT '0',
//            `DATE_CREATE` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//            `VISIBILITY` BOOLEAN DEFAULT '1',
//            PRIMARY KEY(ID),
//            UNIQUE KEY(PRODUCT_ID),
//            UNIQUE KEY(PRODUCT_ARTICLE)
//)");

class CProduct {
    private $connect;
    function __construct($connect)
    {
        $this->connect = $connect;
        $this->connect->query(
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
    }

    public function selectRecordsFrom($table, $count, $sort, $sort_type) {
        $result = array();
        $queryResult = $this->connect->query("SELECT * FROM $table ORDER BY $sort $sort_type LIMIT $count");
        for($i=$queryResult->num_rows; $i>0; $i--) {
            $result[] = $queryResult->fetch_assoc();
        }
        return $result;
    }
    public function toggleToInvisible($request) {
        echo "Product with id ".$request->id." now invisible";
        $this->connect->query("UPDATE `products` SET `VISIBILITY` = '0' WHERE `products`.`ID` = '$request->id'");
    }
    public function changeProductCount($request) {
        echo "Product quantity was successfully ".$request->type."ed";
        if ($request->type=='increment') {
            $this->connect->query("UPDATE `products` SET `PRODUCT_QUANTITY` = `PRODUCT_QUANTITY` + 1 WHERE `products`.`ID` = '".$request->id."'");
        }
        if ($request->type=='decrement') {
            $this->connect->query("UPDATE `products` SET `PRODUCT_QUANTITY` = `PRODUCT_QUANTITY` - 1 WHERE `products`.`ID` = '".$request->id."'");
        }
    }
}

$CProduct = new CProduct($connect);