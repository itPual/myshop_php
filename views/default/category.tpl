{*Page categories*}
<h1>Categories goods {$rsCategory['name']}</h1>
{foreach $rsProducts as $item name=products}
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/product/{$item['id']}/">
            <img src="/images/products/{$item['image']}" width="100"><br/>
        <a href="/product/{$item['id']}/">{$item['name']}</a><br/>
        <a href="/product/{$item['id']}/">{$item['price']}</a>
        </a>
    </div>
    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both;"></div>
    {/if}
    {*{foreachelse}
    <h2> No products</h2>*}
{/foreach}

{foreach $rsChildCats as $item name=childCats}
    <h2><a href="/category/{$item['id']}/">{$item['name']}</a> </h2>
    {*{foreachelse}
    <h2> No products</h2>*}
{/foreach}
