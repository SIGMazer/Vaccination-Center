<?php

    include_once '../Model/VaccinationCenterModel.php';
    $modelInstance = new VaccinationCenterModel();

/*  function echoReservations()
    {
        include_once '../Include/DatabaseClass.php';
        $db = new database();
        $query = "select nationalID as 'Vaccine User National ID', vaccineuser.Name as 'Name Of Receiver', 
                                    vaccinereservation.ID as 'Reservation Number', vaccine.Name as 'Vaccine Name' from vaccineuser 
                                    inner join vaccinereservation on vaccineuser.nationalID = vaccinereservation.ID 
                                    inner join vaccine on vaccine.ID = vaccinereservation.VaccineID 
                                    where vaccinereservation.Center_ContactNum = {$this->contactNum} AND Date = CURDATE()";
        $list = $db->display($query);
        $size = $db->check($query);
        for ($x = 0; $x < $size; $x++) {
            echo "<tr>";
            echo "<td>" . $list[$x]['Vaccine User National ID'] . "</td>";
            echo "<td>" . $list[$x]['Name Of Receiver']. "</td>";
            echo "<td>" . $list[$x]['Reservation Number']. "</td>";
            echo "<td>" . $list[$x]['Vaccine Name']. "</td>";
        }
    }
*/

    if(isset($_POST['res_find'])){
        if (!empty($_POST['res_find'])){
            header("location = ../View/vaccination_center_panel.php");
            $modelInstance->findReservation($_SESSION['ResID']);
        }
        else
            header("location = ../View/vaccination_center_panel.php?err=0");
    }

    if(isset($_POST['res_confirm'])){
            header("location = ../View/vaccination_center_panel.php");
            $modelInstance->confirmReservation($_SESSION['ResID']);
    }
