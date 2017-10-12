<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 11-Oct-17
 * Time: 09:46 AM
 * Description of functions
 */

/**
 * Forming the requested page
 *
 * @param $controllerName
 * @param string $actionName
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . "Action";
    $function($smarty);
}

/**
 * loadTemplate
 * @param $smarty
 * @param $templateName
 */
function loadTemplate($smarty, $templateName){
    //var_dump($smarty);
    //var_dump(TemplatePostfix);
    $smarty->display($templateName. TemplatePostfix);
}

/**
 * function debag. Stop work program and show $value
 * @param null $value
 * @param int $die
 */
function d($value = null, $die = 1){
    echo "Debug: <br/><pre>";
    print_r($value);
    echo "</pre>";
    if ($die) die;
}

function createSmartyRsArray($rs){
    if(!$rs) return false;

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}