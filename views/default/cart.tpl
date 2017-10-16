{*Basket template*}
<h1>Basket</h1>

{if ! $rsProducts}
    Basket empty.

    {else}
    <form action="/cart/order/" method="POST">
    <h2>Order data</h2>
    <table class="table table-striped">
        <tr>
            <td>
                №
            </td>
            <td>
                Name
            </td>
            <td>
                Quantity
            </td>
            <td>
                Unit price
            </td>
            <td>
                Price
            </td>
            <td>
                Akt
            </td>
        </tr>
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>
                    {$smarty.foreach.products.iteration}
                </td>
                <td>
                    <a href="/product/{$item['id']}/">{$item['name']}</a><br/>
                </td>
                <td>
                    <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});" />
                </td>
                <td>
                    <span id="itemPrice_{$item['id']}" value="{$item['price']}" >
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}" >
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <a id="removeCart_{$item['id']}" href="#" onclick="removeFromCart({$item['id']}); return false;" title="Remove from basket">Remove</a>
                    <a id="addCart_{$item['id']}" class="hideme btn btn-success" href="#" onclick="addToCart({$item['id']}); return false;" title="Restore the element">Restore</a>
                </td>
            </tr>
        {/foreach}
    </table>
        <input class="btn btn-success" type="submit" value="Checkout">
    </form>
{/if}