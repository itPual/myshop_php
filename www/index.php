<?php
session_start();//start session
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once "../config/config.php";//Initializing settings
include_once "../config/db.php";//Initializing database
include_once "../library/mainFunctions.php";//Main functions
//Determine with which controller we will work
$controllerName=isset($_GET['controller']) ? ucfirst($_GET['controller']) : "Index";
//echo "Plug-in file (Controller) = " . $controllerName . "<br/>";

//d($controllerName, 0);

//Determine with which function we will work
$actionName = isset($_GET['action']) ? $_GET['action'] : "index";
//echo "Function formative page (Action) = " . $actionName. "<br/>";

//if user
if(isset($_SESSION['user'])){
    $smarty->assign('arUser', $_SESSION['user']);
}

//d($smarty);
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);