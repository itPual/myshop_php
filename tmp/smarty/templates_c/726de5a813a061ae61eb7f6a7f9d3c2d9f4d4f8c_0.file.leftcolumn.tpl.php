<?php
/* Smarty version 3.1.30, created on 2017-10-16 13:06:29
  from "C:\xampp\htdocs\myshop.local\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e492b5680d49_60928674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '726de5a813a061ae61eb7f6a7f9d3c2d9f4d4f8c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1508151988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e492b5680d49_60928674 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="leftColum">

    <div id="leftMenu">
        <div class="menuCaption">Menu:</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br/>
            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    <span>&nbsp;*</span><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br/>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
            <a href="/user/" id="userLink"><h4><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</h4></a><br/>
            <a href="/user/logout/" onclick="logout();">Exit</a>
        </div>
        <?php } else { ?>


    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br/>
        <a href="/user/logout/" onclick="logout();">Exit</a>
    </div>


    <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
    <div id="loginBox">
        <div class="menuCaption">Login</div>
        <input class="form-control" type="text" id="loginEmail" name="loginEmail" value="" placeholder="Entre your email">
        <input class="form-control" type="password" id="loginPwd" name="loginPwd" value="" placeholder="Entre password">
        <input class="btn btn-success form-control" type="button" onclick="login();" value="Login">
        
    </div>

    <div id="registerBox">
        <div class="menuCaption showHiden" onclick="showRegisterBox()">Sin up</div>
        <div id="registerBoxHiden">
            <label>email:</label><br/>
            <input class="form-control" type="text" id="email" name="email" value="" placeholder="Entre your email"><br/>
            <label>password:</label><br/>
            <input class="form-control" type="password" id="pwd1" name="pwd1" value="" placeholder="Entre password">
            <label>password:</label><br/>
            <input class="form-control" type="password" id="pwd2" name="pwd2" value="" placeholder="Repeat enter">
            <input class="btn btn-success form-control" type="button" onclick="registerNewUser();" value="Sin up">
            
        </div>
    </div>
    <?php }?>
    <?php }?>

    <div class="menuCaption">Basket</div>
    <a href="/cart/" title="Go shopping cart">In basket</a>
    <span id="cartCntItems">
    <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
        <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

    <?php } else { ?>empty
    <?php }?>
</span>

</div>
<?php }
}
