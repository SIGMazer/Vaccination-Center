<?php

    include_once '../Model/VaccinationCenterModel.php';
    $modelInstance = new VaccinationCenterModel();

    if(isset($_POST['res_find'])){
        if (!empty($_POST['res_find'])){
            $modelInstance->findReservation($_POST["res_find"]);
            header("location = ../View/vaccination_center_panel.php");
        }
        else
            header("location = ../View/vaccination_center_panel.php?err=0");
    }

    if(isset($_POST['res_confirm'])){
            $modelInstance->confirmReservation($_SESSION['ResID']);
            header("location = ../View/vaccination_center_panel.php");
    }
