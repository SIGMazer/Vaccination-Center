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
    <div class="col-md-12">
        <div class="card">
            <p class="card-head">Available vaccination centers</p>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once "Controller/MiscController.php";
                                    echoLandingTable();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col">
        <div class="card">
            <div class="card-head centeralize-button">
                <a href="View/login.php"><button name="get-started" class="btn btn-primary">Get started</button></a>
            </div>
        </div></div>
    <div class="col"></div>

</div>
</body>
</html>
