<?php

    include_once '../Model/VaccinationCenterModel.php';
    $modelInstance = new VaccinationCenterModel();

    if(isset($_POST['res_find'])){
        if (!empty($_POST['res_no'])){
            $search = $modelInstance->findReservation($_POST['res_no']);
            if ($search) {
                header("location: ../View/vaccination_center_panel.php");
            } else {
                header("location: ../View/vaccination_center_panel.php?err=1");
            }
        }
        else {
            header("location: ../View/vaccination_center_panel.php?err=0");
        }
    }

    if(isset($_POST['res_confirm'])){
        if (!empty($_SESSION['ResID'])) {
            if (isset($_SESSION['Doses']) && $_SESSION['Doses'] == 1) {
                if($_FILES['file']['name'] != '') {
                    @$file = $_FILES['file'];
                    $allowedExts = array("pdf", "txt");
                    $maxSize = 1024000;
                    $destination = "../Upload/";

                    include '../Model/UploadClass.php';
                    $upload = new upload($file, $allowedExts, $maxSize, $destination);
                    $filePath = $upload->uploadPath('file');
                    $modelInstance->confirmReservation($_SESSION['ResID'], $filePath);
                    header("location: ../View/vaccination_center_panel.php");
                } else {
                    header("location: ../View/vaccination_center_panel.php?uerr=0");
                }
            } else {
                $modelInstance->confirmReservation($_SESSION['ResID'], false);
                header("location: ../View/vaccination_center_panel.php");
            }
        } else {
            header("location: ../View/vaccination_center_panel.php");
        }
    }

    function echoDetails($arrayIndex) {
        if (isset($_SESSION[$arrayIndex])) {
            echo $_SESSION[$arrayIndex];
        }
    }

    function echoError($errorName) {
        $errorList = array("err" => array("Enter a reservation number", "This reservation number doesn't exist"),
            "uerr" => array("Upload an appropriate file"));
        if (isset($_GET[$errorName])) {
            echo $errorList[$errorName][$_GET[$errorName]];
        }
    }