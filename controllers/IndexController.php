<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 11-Oct-17
 * Time: 09:46 AM
 * Controller of the main page
 */
//connection models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction(){
    echo "IndexController.php => testAction";
}
function IndexAction($smarty){

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getLastProducts(16);
    //d($rsCategories);

    $smarty->assign('pageTitle', 'Site\'s home page');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}