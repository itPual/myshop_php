<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 13-Oct-17
 * Time: 09:02 AM
 * Product controller
 */

include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * product page formation
 * @param $smarty
 */
function indexAction($smarty){
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($itemId == null) exit();
//connect product data
    $rsProduct =  getProductById($itemId);

    //get all categories
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('itemInCart', 0);
    if(in_array($itemId, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }

    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);


    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
