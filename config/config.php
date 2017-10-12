<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 11-Oct-17
 * Time: 09:46 AM
 *Constants for access to controllers
 * File settings
 */

//>Constants for access to controllers
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');
//<

//>Use temlate
$template='default';
//ways to templates (*tpl)
define('TemplatePrefix', "../views/{$template}/");
//
define('TemplatePostfix', '.tpl');

//path to template files in web space
define('TemplateWebPath', "./templates/{$template}/");
//>

//>Template Engine Smarty initialization
//put full path to Smarty.class/php
require("../library/Smarty/libs/Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//>
