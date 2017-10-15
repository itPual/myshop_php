<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 14-Oct-17
 * Time: 01:08 PM
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress){

/*    $link = mysqli_connect($GLOBALS["db"]);
    mysqli_set_charset($link, "utf8");*/

    $email = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $email));
    $name = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $adress));

    $sql = "INSERT INTO
            `users` (`email`, `pwd`, `name`, `phone`, `adress`)
            VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";

    $rs = mysqli_query($GLOBALS["db"], $sql);

    if($rs){
        $sql = "SELECT * FROM `users`
                WHERE (`email` = '{$email}' AND `pwd` = '{$pwdMD5}')
                LIMIT 1";
        $rs = mysqli_query($GLOBALS["db"], $sql);
        $rs = createSmartyRsArray($rs);

        if(isset($rs[0])){
            $rs['success'] = 1;
        }
        else{
            $rs['success'] = 0;
        }
    }
    else{
        $rs['success'] = 0;
    }
    return $rs;
}


function checkRegisterParams($email, $pwd1, $pwd2){
    $res = null;

    if(! $email){
        $res['success'] = false;
        $res['message'] = "Entre email";
    }
    if(! $pwd1){
        $res['success'] = false;
        $res['message'] = "Entre password";
    }
    if(! $pwd2){
        $res['success'] = false;
        $res['message'] = "Repeat enter password";
    }
    if($pwd1 != $pwd2){
        $res['success'] = false;
        $res['message'] = "Passwords do not match";
    }
    return $res;
}

function checkUserEmail($email){
    $email = mysqli_real_escape_string($GLOBALS["db"], $email);

    $sql = "SELECT `id`
            FROM `users`
            WHERE  `email` = '{$email}'";
    $rs = mysqli_query($GLOBALS["db"], $sql);
    $rs = createSmartyRsArray($rs);

    return $rs;
}

function loginUser($email, $pwd){
    $email = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $email));
    $pwd = md5($pwd);

    $sql = "SELECT *
            FROM `users`
            WHERE  (`email` = '{$email}' AND `pwd` = '{$pwd}')
            LIMIT 1";

    $rs = mysqli_query($GLOBALS["db"], $sql);
    $rs = createSmartyRsArray($rs);

    if(isset($rs[0])){
        $rs['success'] = 1;
    }
    else{
        $rs['success'] = 0;
    }
    return $rs;
}


function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd){
    $email = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $_SESSION['user']['email']));
    $name = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($GLOBALS["db"], $adress));

    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = null;
    if($pwd1 && ($pwd1 == $pwd2)){
        $newPwd = md5($pwd1);
    }

    $sql = "UPDATE `users`
            SET ";

    if($newPwd){
        $sql .= "`pwd` = '{$newPwd}', ";
    }

    $sql .= " `name` = '{$name}' ,
              `phone` = '{$phone}' ,
              `adress` = '{$adress}'
              WHERE
              `email` = '{$email}' AND `pwd` = '{$curPwd}'
              LIMIT 1";

    $rs = mysqli_query($GLOBALS["db"], $sql);

    return $rs;
}

function getCurUserOrders(){
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs = getOrdersWithProductsByUser($userId);

    return $rs;
}