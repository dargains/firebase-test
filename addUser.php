<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Firebase test - Add User</title>
    <?php include "css.html"; ?>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php $page="add"; include "header.php" ?>
        <main class="mdl-layout__content">
            <div class="page-content" id="page-content">
                <form action="#" id="form">
                    <h3>Add new user</h3>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="name" pattern="[A-Z,a-z, ]*">
                        <label class="mdl-textfield__label" for="name">Name:</label>
                    </div>
                    <br>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="email">
                        <label class="mdl-textfield__label" for="email" onkeypress="if (keyCode == 13) submitUser()">Email:</label>
                        <span class="mdl-textfield__error" id="errorMsg">This e-mail aready exists</span>
                        <div class="success" id="successMsg">User added</div>
                    </div>
                    <br>
                    <br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="submitButton" onclick="submitUser()">add user</button>
                </form>
            </div>
        </main>
    </div>
    <?php include "scripts.html"; ?>
</body>

</html>