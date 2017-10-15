{*Order page*}
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

        {foreach $rsProducts as $item name=products}
           <tr>
               <td>{$smarty.foreach.products.iteration}</td>
               <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
               <td>
                   <span id="itemCnt_{$item['id']}">
                      <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}" >
                       {$item['cnt']}
                   </span>
               </td>
               <td>
                   <span id="itemPrice_{$item['id']}">
                       <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}" >
                       {$item['price']}
                   </span>
               </td>
               <td>
                   <span id="itemRealPrice_{$item['id']}">
                       <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}" >
                       {$item['realPrice']}
                   </span>
               </td>
           </tr>
        {/foreach}

    </table>

    {if isset($arUser)}
        {$buttonClass = ""}
        <h2>Customer data</h2>
        <div id="orderInfoUser" {$buttonClass}>
            {$name = $arUser['name']}
            {$phone = $arUser['phone']}
            {$adress = $arUser['adress']}
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="name" name="name" value="{$name}"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" id="phone" name="phone" value="{$phone}"></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td><textarea type="text" id="adress" name="adress">{$adress}</textarea></td>
                </tr>
            </table>
        </div>
    {else}
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
        {$buttonClass = "class='hideme'"}
    {/if}

<input {$buttonClass} id="btnSaveOrder" type="button" value="Checkout" onclick="saveOrder();">
</form>
