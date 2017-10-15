<?php
/* Smarty version 3.1.30, created on 2017-10-15 11:43:31
  from "C:\xampp\htdocs\myshop.local\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e32dc3c41c62_84920615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56bf31b2920ae820863dc9da7be14c1de55a2582' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1508055984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e32dc3c41c62_84920615 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Your login information</h1>
<table border="0">
    <tr>
        <td>Login (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Name</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    <tr>
        <td>Adress</td>
        <td><input type="textarea" id="newAdress" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
"></td>
        
    </tr>
    <tr>
        <td>New password</td>
        <td><input type="password" id="newPwd1"></td>
    </tr>
    <tr>
        <td>Repeat password</td>
        <td><input type="password" id="newPwd2"></td>
    </tr>
    <tr>
        <td>In order to save the data, enter the current password</td>
        <td><input type="password" id="curPwd" value=""></td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
        <td>
            <input type="button" value="Save changes" onclick="updateUserData();">
        </td>
    </tr>
</table><?php }
}
