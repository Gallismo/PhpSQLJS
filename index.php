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