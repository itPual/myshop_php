<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 13-Oct-17
 * Time: 11:15 AM
 * controller for working with basket
 */
//connect model
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * add product to basket
 * @return bool
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$itemId) return false;

    $resData = array();

    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }else{
        $resData['success'] = 0;
    }
    echo  json_encode($resData);
}

/**
 * remove product in basket
 */
function removefromcartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$itemId) exit();

    $resData = array();

    $key = array_search($itemId, $_SESSION['cart']);
        if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
        }else{
            $resData['success'] = 0;
        }
    echo  json_encode($resData);
}

function indexAction($smary){
    $itemsId = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsId);

    $smary->assign('pageTitle', 'Basket');
    $smary->assign('rsCategories', $rsCategories);
    $smary->assign('rsProducts', $rsProducts);

    loadTemplate($smary, 'header');
    loadTemplate($smary, 'cart');
    loadTemplate($smary, 'footer');
}