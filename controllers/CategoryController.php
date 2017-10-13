<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 12-Oct-17
 * Time: 03:05 PM
 * Controller of page category
 */

//connect model
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
/**
 * @param $smarty
 * category page formation
 */
function indexAction($smarty){
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($catId == null) exit();

    $rsProducts = null;
    $rsChildCats = null;
    $rsCategory = getCatById($catId);
    //d($rsCategory);

    if($rsCategory['parent_id'] == 0){
        $rsChildCats = getChildrenForCat($catId);
    }
    else{
        $rsProducts = getProductsByCat($catId);
    }
    //d($rsProducts);

    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('pageTitle', 'Categories goods ' . $rsCategory['name']);

    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');

}