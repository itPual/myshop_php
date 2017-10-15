<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 15-Oct-17
 * Time: 04:16 PM
 */
function setPurchaseForOrder($orderId, $cart){
    $sql = "INSERT INTO `purchase`
            (`order_id`, `product_id`, `price`, `amout`)
            VALUES ";

    $values = array();
    foreach ($cart as $item){
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }

    $sql .= implode($values, ', ');
    $rs = mysqli_query($GLOBALS["db"], $sql);
    return $rs;
}

function getPurchaseForOrder($orderId){
    $sql = "SELECT `pe`.*, `ps`.`name`
            FROM `purchase` AS `pe`
            JOIN `products` AS `ps` ON  `pe`.product_id = `ps`.id
            WHERE `pe`.order_id = '{$orderId}'";
    $rs = mysqli_query($GLOBALS["db"], $sql);
    //d($sql);
    return createSmartyRsArray($rs);
}