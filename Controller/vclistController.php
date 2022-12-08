<?php
if (isset($_POST["city_search"])) {
    //Clicking the search button gets the admin back to the page, w/ list
    //header("location: ../View/find_vaccination_center.php?cID={$_POST["city_find"]}");
    session_start();
    $_SESSION["cID"] = $_POST["city_find"];
    header("location: ../View/find_vaccination_center.php");
}

if (isset($_POST["delete"])) {
    //Clicking the delete button erases the account (and cascade deletes other details) of the vaccination center
    include_once "../Model/adminModel.php";
    $admin = new adminModel();
    $admin->deleteVaccinationCenter($_POST["uID"]);
    header("location: ../View/find_vaccination_center.php");
}

if (isset($_POST["update"])) {
    //Updating the vaccination center
    if (!empty($_POST["newName"]) && !empty($_POST["newAddress"]) && !empty($_POST["newContactNum"])) {
        include_once "../Model/adminModel.php";
        $admin = new adminModel();
        $updating = $admin->updateVaccinationCenter($_POST["contactnum"], $_POST["newName"],
            $_POST["newAddress"], $_POST["newContactNum"], $_POST["newType"]);
        if ($updating) {
            header("location: ../View/find_vaccination_center.php");
        } else {
            header("location: ../View/find_vaccination_center.php?err=1");
        }
    } else {
        header("location: ../View/find_vaccination_center.php?err=0");
    }
}

function search() {
    @session_start();
    if (isset($_SESSION["cID"])) {
        include_once "../Model/adminModel.php";
        $admin = new adminModel();
        $admin->searchVaccinationCenter($_SESSION["cID"]);
    }
}

function echoError() {
    //List of possible errors
    $errorList = array("Fill the data properly.", "A vaccination center by this name, address or contact number already exist");
    if (isset($_GET["err"])) {
        echo $errorList[$_GET["err"]];
    }
}