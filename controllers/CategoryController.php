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

    $rsCategory = getCatById($catId);
    d($rsCategory);
}