<?php
/* Smarty version 3.1.30, created on 2017-10-16 13:15:31
  from "C:\xampp\htdocs\myshop.local\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e494d3b0d690_26160022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a10b9a43657bd32053c552373343ec0a4244e099' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\header.tpl',
      1 => 1508152530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_59e494d3b0d690_26160022 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <!-- Bootstrap -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>


</head>
<body>
<div class="container">
    <div id="header" class="page-header">
        <img id="icon" src="/images/icon.jpg" width="50" />
        <a href="/index/">
            <h2>Super online store</h2>
        </a>
    </div>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-lg-4">
            <?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>

        <div class="col-xs-11 col-sm-10 col-lg-8">
            <div id="centerColumn"><?php }
}
