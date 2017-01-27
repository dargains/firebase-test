<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Firebase test - Users List</title>
    <?php include "css.html"; ?>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php $page="list"; include "header.php"; ?>
        <main class="mdl-layout__content">
            <div class="page-content" id="page-content">
                <h3>Users list</h3>
                <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th>E-mail</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table"></tbody>
                </table>
                <div id="loading-container">
                    <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                </div>
            </div>
        </main>
    </div>
    <?php include "scripts.html"; ?>
</body>

</html>