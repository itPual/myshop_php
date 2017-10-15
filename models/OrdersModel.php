<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 15-Oct-17
 * Time: 04:15 PM
 */

function makeNewOrder($name, $phone, $adress){
      $userId = $_SESSION['user']['id'];
      $commet = "user id: {$userId}<br/>
                 Name: {$name}<br/>
                 Phone: {$phone}<br/>
                 Adress: {$adress}<br/>";
      $dateCreated = date('Y.m.d H:i:s');
      $userIp = $_SERVER['REMOTE_ADDR'];

      $sql = "INSERT INTO
              `orders` (`user_id`, `date_created`, `date_payment`,
                        `status`, `comment`, `usere_ip`)
               VALUES  ('{$userId}', '{$dateCreated}' , NULL ,
               '0', '{$commet}', '{$userIp}')";

      $rs = mysqli_query($GLOBALS["db"], $sql);

    if($rs){
        $sql = "SELECT `id`
                FROM `orders`
                ORDER BY `id` DESC 
                LIMIT 1";
        $rs = mysqli_query($GLOBALS["db"], $sql);
        $rs = createSmartyRsArray($rs);

        if(isset($rs[0])){
            return $rs[0]['id'];
        }
    }
    return false;
}

function getOrdersWithProductsByUser($userId){

    $userId = intval($userId);
    $sql = "SELECT * FROM `orders`
            WHERE `user_id` = '{$userId}'
            ORDER BY `id` DESC";
    $rs = mysqli_query($GLOBALS["db"], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)){
        $rsChildren = getPurchaseForOrder($row['id']);
        if($rsChildren){
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}