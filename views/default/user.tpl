{*user page*}
<h1>Your login information</h1>
<table border="0">
    <tr>
        <td>Login (email)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Name</td>
        <td><input type="text" id="newName" value="{$arUser['name']}"></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="text" id="newPhone" value="{$arUser['phone']}"></td>
    </tr>
    <tr>
        <td>Adress</td>
        <td><input type="textarea" id="newAdress" value="{$arUser['adress']}"></td>
        {*<td><textarea id="newAdress" value="user">{$arUser['adress']}</textarea></td>*}
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
</table>

<h2>Orders:</h2>
{if ! $rsUserOrders}
    No orders
    {else}
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>№</th>
            <th>Act</th>
            <th>Order id</th>
            <th>Status</th>
            <th>Date of creation</th>
            <th>Date of payment</th>
            <th>Additional Information</th>
        </tr>
        {foreach $rsUserOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td><a href="#" onclick="showProducts('{$item['id']}'); return false;">Show order goods</a></td>
                <td>{$item['id']}</td>
                <td>{$item['status']}</td>
                <td>{$item['date_created']}</td>
                <td>{$item['date_payment']}&nbsp;</td>
                <td>{$item['comment']}</td>
            </tr>

            <tr class="hideme" id="purchasesForOrderId_{$item['id']}">
                <td colspan="7">
                    {if $item['children']}
                        <table border="1" cellpadding="1" cellspacing="1" width="100%">
                            <tr>
                                <th>№</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            {foreach $item['children'] as $itemChild name=products}
                                <tr>
                                    <td>{$smarty.foreach.products.iteration}</td>
                                    <td>{$itemChild['product_id']}</td>
                                    <td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a> </td>
                                    <td>{$itemChild['price']}</td>
                                    <td>{$itemChild['amout']}</td>
                                </tr>
                            {/foreach}
                        </table>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </table>
{/if}