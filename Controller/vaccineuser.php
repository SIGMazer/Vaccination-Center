<?php 
    include'../Model/VaccineUser.php';
    $vaccineuser = new VaccineUser();
    // reserve_center, reserve_vaccine, reserve_date, reserve_submit
    if(isset($_POST["reserve_submit"])){
		
	    if(!empty($_POST['reserve_center']) && !empty($_POST['reserve_vaccine'])&& !empty($_POST['reserve_date'])) {
            $center_contactNum=$_POST['reserve_center'];
		    $vaccine_ID=$_POST['reserve_vaccine'];
            $reservationDate=$_POST['reserve_date'];
		    $true = $vaccineuser->reserveDose($center_contactNum,$vaccine_ID,$reservationDate);
		
		    if ($true) {
                //The user has successfully registered a dose of vaccine
                header("location: ../View/user_panel.php");
		    } else {
                //The user has encountered an error (second dose error)
                header("location: ../View/user_panel.php?err=1");
                
            }
	    }
        else {
            header("location: ../View/user_panel.php?err=0");   
        }
    }

    if (isset($_POST["download"])) {
        //Downloading the file and forcing the 'save file' dialog box
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=certificate.pdf");
        readfile($vaccineuser->getReservePath());
    }
	

?>