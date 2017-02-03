<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Firebase test - Edit User</title>
  <?php include "css.html"; ?>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php $page="edit"; include "header.php"; ?>
      <?php $name = $_GET['name']; $email = $_GET['email']; $key = $_GET['key'];?>
        <main class="mdl-layout__content">
          <div class="page-content" id="page-content"> <a href="./list.php" class="goBack">&lt; back</a>
            <h3><?php echo $name ?></h3>
            <input type="hidden" id="key" value="<?php echo $key ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" pattern="[A-Z,a-z, ]*" value="<?php echo $name ?>">
              <label class="mdl-textfield__label" for="name">Name:</label>
            </div>
            <br>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="email" value="<?php echo $email ?>">
              <label class="mdl-textfield__label" for="email" onkeypress="if (keyCode == 13) submitUser()">Email:</label> <span class="mdl-textfield__error" id="errorMsg">This e-mail aready exists</span>
              <div class="success" id="successMsg">User edited</div>
            </div>
            <br>
            <br>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="editButton" onclick="editUser()">edit user</button>
          </div>
        </main>
  </div>
  <?php include "scripts.html"; ?>
</body>

</html>