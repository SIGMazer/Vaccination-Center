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
            <h1>Welcome ,User name</h1>
            <p>Vaccine doses » 0</p>
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
                            <th scope="col">Name</th>
                            <th scope="col">Gap between doses</th>
                            <th scope="col">Precautions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <p>Vaccination Center</p>
                            <p><label for="res_center"></label>
                            <select name="reserve_center" id="res_center">
                                <option>kafr nsar</option>
                            </select>
                            </p>
                        </div>
                        <div class="col">
                            <p>Vaccine</p>
                            <label for="res_vaccine"></label>
                            <select name="reserve_vaccine" id="res_vaccine">
                                <option>corona 69</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Dose date</p>
                            <input type="date" name="reserve_date" id="birthday"></p>
                        </div>
                    </div>
                    <p><input type="submit" name="reserve_submit" class="btn btn-primary"></p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

