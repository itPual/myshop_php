<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 12-Oct-17
 * Time: 09:43 AM
 * Model for table categories
 */

function getChildrenForCat($catId){
    $sql = "SELECT *
            FROM categories
            WHERE parent_id = '{$catId}'";

    $rs = mysqli_query($GLOBALS["db"], $sql);

    return createSmartyRsArray($rs);
}
/**
 * @return array
 * Get general categories
 */
function getAllMainCatsWithChildren(){
    $sql = 'SELECT *
            FROM categories
            WHERE parent_id = 0';

    $rs = mysqli_query($GLOBALS["db"], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)){

        $rsChildren = getChildrenForCat($row['id']);
        if($rsChildren){
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }
//    d($smartyRs);
    return $smartyRs;
}

/**
 * Get category by id
 * @param $catId
 * @return array|bool
 */
function getCatById($catId){
    $catId = intval($catId);
    $sql = "SELECT *
            FROM `categories`
            WHERE `id` = '{$catId}'";
    $rs = mysqli_query($GLOBALS["db"], $sql);
    return mysqli_fetch_assoc($rs);
}