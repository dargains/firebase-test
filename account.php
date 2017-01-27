<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Firebase test - Account</title>
    <?php include "css.html"; ?>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php $page="account"; include "header.php" ?>
        <main class="mdl-layout__content">
            <div class="page-content" id="page-content">
                <h3 id="userEmail"></h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="email">
                    <label class="mdl-textfield__label" for="email" onkeypress="if (keyCode == 13) submitUser()">Email:</label>
                    <span class="mdl-textfield__error" id="errorMsg">This e-mail is not registered</span>
                </div>
                <br>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password">
                    <label class="mdl-textfield__label" for="password">Password:</label>
                    <span class="mdl-textfield__error" id="errorMsg">This password does not match the e-mail</span>
                </div>
                <br>
                <br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="logoutButton">Log out</button>
                <br>
                <br>
                <p id="loginError"></p>
            </div>
        </main>
    </div>
    <?php include "scripts.html"; ?>
</body>

</html>