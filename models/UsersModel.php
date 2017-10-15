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