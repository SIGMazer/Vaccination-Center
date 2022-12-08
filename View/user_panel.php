<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user_panel</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="cardhead">
                <h>Welcome</h>
                <p>Available vaccination center</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="cardbody">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col">
                            <p>Center</p>
                            <p><label for="res_center"></label>
                                <select name="reserve_center" id="res_center">
                                    <option>kafr nsar</option>
                                </select>
                            </p>
                        </div>
                        <div class="col">
                            <p>Reserve vaccine </p>
                            <label for="res_vaccine"></label>
                            <select name="reserve_vaccine" id="res_vaccine">
                                <option>corona 69</option>
                            </select>


                        </div>
                        <div class="col">
                            <p>Birth date
                                <input type="date" name="reserve_date" id="birthday"></p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <p><input type="submit" name="reserve_submit" class="btn btn-primary"></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>



