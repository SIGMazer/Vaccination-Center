<?php include "Controller/MiscController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <link href="View/Css/bootstrap.min.css" rel="stylesheet">
    <link href="View/Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col">
            <div class="cardhead">
                <h>Available vaccination centers</h>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="cardbody">
                <div class="backcard">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Type</th>
                        </tr>

                        <?php
                            echoLandingTable();
                        ?>

                    </table>
                </div>
                <a href="View/login.php"><button name="get_started" class="btn btn-primary">Get started</button></a>
            </div>
        </div>
    </div>

</div>
</body>
</html>
