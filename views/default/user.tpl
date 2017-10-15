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