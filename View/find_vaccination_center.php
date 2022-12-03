<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p-head>Find Vaccination center</p-head>
                        <form action="" method="post">
                            <p>City :
                                <label for="city-names"></label>
                                <select name="city_find" id="city-names">
                                    <option >cairo</option>
                                    <option >spaniol</option>
                                    <option >alex</option>
                                    <option >giza</option>
                                </select></p>
                            <input type="submit" value="Search" name="city_search" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>



                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-head">
                                <form action="" method="post">
                                    <p-head>Vaccination center details:
                                        <input type="submit" value="Update" name="city_update" class="btn btn-primary">
                                        <input type="submit" value="Delete" name="city_delete" class="btn btn-primary">
                                    </p-head>
                                </form>
                            </div>
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
                                        <th scope="col">Reservation No. </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">National ID</th>
                                        <th scope="col">Vaccine name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1007</td>
                                        <td>Ahmad</td>
                                        <td>---2102617</td>
                                        <td>dodo</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <form action="" method="post">
                                    <input type="submit" value="Update" name="update_submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



</body>
</html>


