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
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

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

function orderAction($smary){
    //d($_POST);
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    if(! $itemsIds){
        redirect('/cart/');
        return;
    }

    $itemsCnt = array();
    foreach ($itemsIds as $item){
        $postVar = 'itemCnt_'.$item;
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }

    $rsProducts = getProductsFromArray($itemsIds);

    $i = 0;
    foreach ($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        }
        else{
            unset($rsProducts[$i]);
        }
        $i++;
    }

    if(! $rsProducts){
        echo "Basket empty";
        return;
    }

    $_SESSION['saleCart'] = $rsProducts;


    $rsCategories = getAllMainCatsWithChildren();

    if(! isset($_SESSION['user'])){
        $smary->assign('hideLoginBox', 1);
    }

    $smary->assign('pageTitle', 'Order');
    $smary->assign('rsCategories', $rsCategories);
    $smary->assign('rsProducts', $rsProducts);

    loadTemplate($smary, 'header');
    loadTemplate($smary, 'order');
    loadTemplate($smary, 'footer');
}


function saveorderAction(){
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

    if(! $cart){
        $resData['success'] = 0;
        $resData['message'] = "no order products";
        echo json_encode($resData);
        return;
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];

    $orderId = makeNewOrder($name, $phone, $adress);
    if(! $orderId){
        $resData['success'] = 0;
        $resData['message'] = "Error create order";
        echo json_encode($resData);
        return;
    }

    $res = setPurchaseForOrder($orderId, $cart);

    if($res){
        $resData['success'] = 1;
        $resData['message'] = "Order saved";
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    }
    else{
        $resData['success'] = 0;
        $resData['message'] = "Inaccurate data entry for the order" . $orderId;
    }
    echo json_encode($resData);
}