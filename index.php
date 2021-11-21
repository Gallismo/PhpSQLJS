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
function selectRecordsFrom($table, $count, $sort, $sort_type) {
    global $connect;
    $result = array();
    $queryResult = $connect->query("SELECT * FROM $table ORDER BY $sort $sort_type LIMIT $count");
    for($i=$queryResult->num_rows; $i>0; $i--) {
        $result[] = $queryResult->fetch_assoc();
    }
    return $result;
}

$records = selectRecordsFrom('Products', 1, 'DATE_CREATE', 'DESC');
foreach ($records as $record) {
    print_r($record);
    echo "<br>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="content">
        <div class="products">
            <div class="header">
                <h2 class="header-text">Products list</h2>
                <div class="products-count">
                    <?php
                    $count = 10;
                    echo "
                        <h3 class=\"products-count-value\">Products count: $count</h3>
                        <button type='button' class='increment count-button'>+</button>
                        <button type='button' class='decrement count-button'>-</button>
                    ";
                    ?>
                </div>
            </div>
            <div class="table-container">
                <table class="table">
                    <tbody class="table-body" id="tableContainer">
                    <tr class="table-names-item table-item">
                        <td class="table-column-name table-column">Article</td>
                        <td class="table-column-name table-column">Name</td>
                        <td class="table-column-name table-column">Price</td>
                        <td class="table-column-name table-column">Quantity</td>
                        <td class="table-column-name table-column">Create Date</td>
                        <td class="invisible-button-ceil"></td>
                    </tr>
                    <?php
                    $records = selectRecordsFrom('Products', $count, 'DATE_CREATE', 'DESC');
                    foreach ($records as $key => $record) {
                        if (!$record['VISIBILITY']) {
                            continue;
                        }
                        echo "
                        <tr class='table-item' id='tr-".$record['ID']."'>
                            <td class=\"table-column\">".$record['PRODUCT_ARTICLE']."</td>
                            <td class=\"table-column\">".$record['PRODUCT_NAME']."</td>
                            <td class=\"table-column\">".$record['PRODUCT_PRICE']."</td>
                            <td class=\"table-column\">".$record['PRODUCT_QUANTITY']."</td>
                            <td class=\"table-column\">".$record['DATE_CREATE']."</td>
                            <td class='invisible-button-ceil'><button type='button' class='invisible-button' id='tr-".$record['ID']."-button'>Скрыть</button></td>
                        </tr>
                        ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
