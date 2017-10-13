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

</div>