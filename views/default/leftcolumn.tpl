{*left colum*}
<div id="leftColum">

    <div id="leftMenu">
        <div class="menuCaption">Menu:</div>
        {foreach $rsCategories as $item}
            <a href="/?controller=category&id={$item['id']}/">{$item['name']}</a><br/>
            {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    <span>&nbsp;*</span><a href="/?controller=category&id={$itemChild['id']}/">{$itemChild['name']}</a><br/>
                {/foreach}
            {/if}
        {/foreach}
    </div>

    {if isset($arUser)}
        <div id="userBox">
            <a href="/user/" id="userLink"><h4>{$arUser['displayName']}</h4></a><br/>
            <a href="/user/logout/" onclick="logout();">Exit</a>
        </div>
        {else}


    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br/>
        <a href="/user/logout/" onclick="logout();">Exit</a>
    </div>


    {if ! isset($hideLoginBox)}
    <div id="loginBox">
        <div class="menuCaption">Login</div>
        <input class="form-control" type="text" id="loginEmail" name="loginEmail" value="" placeholder="Entre your email">
        <input class="form-control" type="password" id="loginPwd" name="loginPwd" value="" placeholder="Entre password">
        <input class="btn btn-success form-control" type="button" onclick="login();" value="Login">
        {*<button class="btn btn-success" onclick="login();">Login</button>*}
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
            {*<button class="btn btn-success" onclick="registerNewUser();">Sin up</button>*}
        </div>
    </div>
    {/if}
    {/if}

    <div class="menuCaption">Basket</div>
    <a href="/cart/" title="Go shopping cart">In basket</a>
    <span id="cartCntItems">
    {if $cartCntItems > 0}
        {$cartCntItems}
    {else}empty
    {/if}
</span>

</div>
