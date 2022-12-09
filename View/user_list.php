<?php
include "../Controller/userlistController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
        <nav class="navbar sticky-top navbar-light justify-content-between" style="background-color: #20c997">
            <a href="admin_panel.php" class="link">Back to the admin panel</a>
            <form action="../Controller/LoginController.php" method="post" class="form-inline">
                <input type="submit" value="Log out" name="logout" class="btn btn-primary my-2 my-sm-0">
            </form>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="cardhead">
                    <h>Users list</h>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="cardbody">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">National ID</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $admin->listUsers(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>

