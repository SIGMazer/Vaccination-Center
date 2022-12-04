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
        <div class="row">
            <div class="col-md-12">
                <div class="card_header">
                    <h1>Admin name</h1>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="card">
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
                                <?php
                                    $admin->listUsers();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>

