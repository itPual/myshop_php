<?php
/* Smarty version 3.1.30, created on 2017-10-12 13:40:31
  from "C:\xampp\htdocs\myshop\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59df54afd4e3a9_99736401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9aa7f138530f2328097d899ddc00bedff0593c5e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop\\views\\default\\header.tpl',
      1 => 1507808429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_59df54afd4e3a9_99736401 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" />
</head>
<body>
<div id="header">
    <h1>my shop - internet shop</h1>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="centerColumn"><?php }
}
