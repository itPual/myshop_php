{*left colum*}
<div id="leftColum">

    <div id="leftMenu">
        <div class="menuCaption">Menu:</div>
        {foreach $rsCategories as $item}
            <a href="/?controller=category&id={$item['id']}/">{$item['name']}</a><br/>
            {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    --<a href="/?controller=category&id={$itemChild['id']}/">{$itemChild['name']}</a><br/>
                {/foreach}
            {/if}
        {/foreach}
    </div>

    <div id="registerBox">
        <div class="menuCaption showHiden" onclick="showRegisterBox()">Sin up</div>
        <div id="registerBoxHiden">
            <label>email:</label><br/>
            <input type="text" id="email" name="email" value="" placeholder="Entre your email"><br/>
            <label>password:</label><br/>
            <input type="password" id="pwd1" name="pwd1" value="" placeholder="Entre password">
            <label>password:</label><br/>
            <input type="password" id="pwd2" name="pwd2" value="" placeholder="Repeat enter">
            <input type="button" onclick="registerNewUser();" value="Sin up">
        </div>
    </div>

    <div class="menuCaption">Basket</div>
    <a href="/cart/" title="Go shopping cart">In basket</a>
    <span id="cartCntItems">
    {if $cartCntItems > 0}
        {$cartCntItems}
    {else}empty
    {/if}
</span>

</div>
