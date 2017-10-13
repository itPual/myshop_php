<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 12-Oct-17
 * Time: 02:10 PM
 * Model for table Products
 */

function getLastProducts($limit = null){
    $sql = "SELECT *
            FROM `products`
            ORDER BY `id` DESC";
    if ($limit){
        $sql .= " LIMIT {$limit}";
    }
    $rs = mysqli_query($GLOBALS["db"], $sql);
    return createSmartyRsArray($rs);
}

/**
 * Get products for category $itemId
 * @param $itemId
 * @return array|bool
 */
function getProductsByCat($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT *
            FROM `products`
            WHERE `category_id` = '{$itemId}'";

    $rs = mysqli_query($GLOBALS["db"], $sql);
    return createSmartyRsArray($rs);
}