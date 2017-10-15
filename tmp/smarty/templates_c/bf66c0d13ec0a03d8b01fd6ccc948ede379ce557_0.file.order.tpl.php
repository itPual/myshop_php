<?php
/* Smarty version 3.1.30, created on 2017-10-15 14:10:26
  from "C:\xampp\htdocs\myshop.local\views\default\order.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e350328029c1_53063291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf66c0d13ec0a03d8b01fd6ccc948ede379ce557' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\order.tpl',
      1 => 1508069421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e350328029c1_53063291 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Order data</h2>
<form id="frmOrder" action="/catr/saveorder/" method="POST">
    <table>
        <tr>
            <td>№</td>
            <td>Name of product</td>
            <td>Quantity</td>
            <td>Unit price</td>
            <td>Total price</td>
        </tr>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
           <tr>
               <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
               <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
               <td>
                   <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                      <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" >
                       <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                   </span>
               </td>
               <td>
                   <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                       <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" >
                       <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                   </span>
               </td>
               <td>
                   <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                       <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" >
                       <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                   </span>
               </td>
           </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    </table>

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('buttonClass', '');
?>
        <h2>Customer data</h2>
        <div id="orderInfoUser" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['arUser']->value['name']);
?>
            <?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['arUser']->value['phone']);
?>
            <?php $_smarty_tpl->_assignInScope('adress', $_smarty_tpl->tpl_vars['arUser']->value['adress']);
?>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td><textarea type="text" id="adress" name="adress"><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <div id="loginBox">
            <div class="menuCaption">Login</div>
            <table>
                <tr>
                    <td>Login</td>
                    <td><input type="text" id="loginEmail" name="loginEmail" value="" placeholder="Entre your email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="loginPwd" name="loginPwd" value="" placeholder="Entre password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="login();" value="Login"></td>
                </tr>
            </table>
        </div>

        <div id="registerBox">
            <div class="menuCaption">Sin up</div>
            <label>email:</label><br/>
            <input type="text" id="email" name="email" value="" placeholder="Entre your email"><br/>
            <label>password:</label><br/>
            <input type="password" id="pwd1" name="pwd1" value="" placeholder="Entre password"><br/>
            <label>password:</label><br/>
            <input type="password" id="pwd2" name="pwd2" value="" placeholder="Repeat enter"><br/>

            <label>Name:</label><br/>
            <input type="text" id="name" name="name" value="" placeholder="Entre your name"><br/>
            <label>Phone:</label><br/>
            <input type="text" id="phone" name="phone" value="" placeholder="Entre your phone"><br/>
            <label>Adress:</label><br/>
            <textarea type="text" id="adress" name="adress" placeholder="Entre your adress"></textarea><br/>

            <input type="button" onclick="registerNewUser();" value="Sin up">
        </div>
        <?php $_smarty_tpl->_assignInScope('buttonClass', "class='hideme'");
?>
    <?php }?>

<input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="Checkout" onclick="saveOrder();">
</form>
<?php }
}
