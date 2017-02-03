<header class="mdl-layout__header">
  <div class="mdl-layout__header-row"> <span class="mdl-layout-title">Users</span>
    <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      <a class="mdl-navigation__link <?php echo ($page == 'list') ? " selected " : " "; ?>" href="list.php">List</a>
      <a class="mdl-navigation__link <?php echo ($page == 'add') ? " selected " : " "; ?>" href="addUser.php">Add user</a>
      <a class="mdl-navigation__link <?php echo ($page == 'account') ? " selected " : " "; ?>" href="account.php">Account</a>
    </nav>
  </div>
</header>
<div class="mdl-layout__drawer">
 <span class="mdl-layout-title">Users</span>
 <nav class="mdl-navigation">
   <a class="mdl-navigation__link <?php echo ($page == 'list') ? " selected " : " "; ?>" href="list.php">List</a>
   <a class="mdl-navigation__link <?php echo ($page == 'add') ? " selected " : " "; ?>" href="addUser.php">Add user</a>
   <a class="mdl-navigation__link <?php echo ($page == 'account') ? " selected " : " "; ?>" href="account.php">Account</a>
 </nav>
</div>