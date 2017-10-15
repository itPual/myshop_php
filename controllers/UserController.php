<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 14-Oct-17
 * Time: 01:07 PM
 */
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);


    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if(! $resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "A user with this '{$email}' already registered";
    }

    if(! $resData) {
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);

        if($userData['success']){
            $resData['message'] = "A user successfully registered";
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['diaplayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        }
        else{
            $resData['success'] = 0;
            $resData['message'] = "Error registered";
        }
    }
    echo json_encode($resData);
}

function logoutAction(){
    if($_SESSION['user']){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}

function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);

    $userData = loginUser($email, $pwd);

    if($userData['success']){
        $userData = $userData[0];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

        $rsData = $_SESSION['user'];
        $rsData['success'] = 1;
    }
    else{
        $rsData['success'] = 0;
        $rsData['message'] = "Invalid login or password";
    }
    echo json_encode($rsData);
}