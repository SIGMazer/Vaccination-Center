<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vaccination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="col-md-5">


                <div class="card">
                    <p class="card-head">Add city</p>
                    <div class="card-body">
                        <p>Name</p>
                        <p><input  type="text" name="city_name" placeholder="City name"></p>

                        <a href="heartbeat.html"><button name="city_add" class="btn btn-primary"  >Add</button></a>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <p class="card-head">Add vaccine</p>
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>Name</p>
                            <p><input  type="text" name="vaccine_name" placeholder="Vaccine name"></p>
                        </div>
                        <div class="col">
                            <p>Days gap</p>
                            <p><input  type="text" name="vaccine_gap" placeholder="Days"></p>
                        </div>
                        <div class="col">
                            <p>precautions</p>
                            <p><input  type="text" name="vaccine_precautions" placeholder="Precautions"></p>
                        </div>
                    </div>
                    <a href="heartbeat.html"><button name="vaccine_add" class="btn btn-primary"  >Confirm</button></a>
                </div>
                </div>
        </div>
            </div>
        <div class="row" >
            <div class="col-12">
                <div class="card">
                    <p class="card-head"><strong>Add vaccination</strong></p>
                    <div class="card-body">
                        <div class="row">

                            <div class="col">
                                <p>Name</p>
                                <p><input  type="text" name="canter_name" placeholder="Name"></p>
                            </div>

                            <div class="col">
                                <p>City : </p>
                                <p><label for="city-names2"></label>
                                    <select name="center_city" id="city-names2">
                                        <option >cairo</option>
                                        <option >helwan</option>
                                        <option >alex</option>
                                        <option >giza</option>
                                    </select></p>
                            </div>

                            <div class="col">
                                <p>Address</p>
                                <p><input  type="text" name="center_address" placeholder="Adress"></p>
                            </div>

                            <div class="col">
                                <p>Contact No.</p>
                                <input  type="text" name="center_contactno" placeholder="Contact number">
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <p>Type : </p>
                                <p><label for="type-names"></label>
                                    <select name="center_name" id="type-names">
                                        <option >Government</option>
                                        <option >national</option>
                                    </select></p>
                            </div>

                            <div class="col">
                                <p>Username</p>
                                <input  type="text" name="center_username" placeholder="username">
                            </div>

                            <div class="col">
                                <p>Password</p>
                                <input type="password" name="center_password" placeholder="password"/>
                        </div>
                    </div>
                    </form>
                </div>
                    <div class="card-body centeralize-button"><button name="center_add" class="btn btn-primary"  >Add</button></div>
                </div>

            </div>

   </div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body centeralize-button">
                <a href="login.php"><button name="center_find" class="btn btn-primary"  >Find vaccination center</button></a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body centeralize-button">
                <a href="login.php"><button name="user_list" class="btn btn-primary"  >User's list</button></a>
            </div>
        </div>

    </div>
</div>

</body>
</html>