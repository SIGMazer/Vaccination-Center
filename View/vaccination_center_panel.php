<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vaccination center panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="Css/Style_sheet.css" rel="stylesheet">

</head>
<body>
  <div class="row">
    <div class="col-md-12">
      <div class="card_header">
      <h1>VC Manager name</h1>
      </div>
     </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class = "card">
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

      </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">


        <div class="card">
        <p class="card-head">Find user</p>
          <div class="card-body">
            <form action="" method="post">
          <p>Reservation No. : </p>
          <p><input  type="text" name="res_no" placeholder="reservation number"></p>

            <button name="res_find" class="btn btn-primary"  >Find user</button>
            </form>
      </div>
      </div>
    </div>
    <div class="col-md-6">

        <div class="card">
          <div class="card-body row">
            <form action="" method="post">
            <p class="card-text">User's name : </p>
            <p class="card-text">National ID :</p>
            <p class="card-text">Vaccine name : </p>
            <button name="res_confirm" class="btn btn-primary"  >Confirm</button>
            </form>

      </div>
      </div>
    </div>
  </div>


</body>
</html>