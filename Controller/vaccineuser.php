<?php 
    // reserve_center, reserve_vaccine, reserve_date, reserve_submit
    if(isset($_POST["reserve_submit"])){
		include'../Model/VaccineUser.php';

	    if(!empty($_POST['reserve_center']) && !empty($_POST['reserve_vaccine'])&& !empty($_POST['reserve_date'])) {
		    $center_contactNum=$_POST['reserve_center'];
		    $vaccine_ID=$_POST['reserve_vaccine'];
            $reservationDate=$_POST['reserve_date'];
		    $vaccineuser = new vaccineuser();
		    $true = $vaccineuser->reserveDose($center_contactNum,$vaccine_ID,$reservationDate);
		
		    if ($true) {
                //The user has successfully registered a dose of vaccine
                header("location: ../View/user_panel.php");
		    } else {
                //The user has encountered an error (second dose error)
                header("location: ../View/user_panel.php?err=0");
            }
	    }
    }
	

?>