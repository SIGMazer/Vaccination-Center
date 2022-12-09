<?php
//The vaccination center manager clicks the Add City button
if (isset($_POST["city_add"])) {
    if (!empty($_POST["city_name"])) {
        include "../Model/adminModel.php";
        $admin = new adminModel();
        $addStatus = $admin->addCity($_POST["city_name"]);
        if ($addStatus) {
            //Adding the city is successful
            header('location: ../View/admin_panel.php');
        } else {
            //Adding the city failed (repeated city name)
            header('location: ../View/admin_panel.php?cerr=1');
        }
    } else {
        //Empty textbox
        header('location: ../View/admin_panel.php?cerr=0');
    }
}

//The vaccination center manager clicks the Add Vaccine button
if (isset($_POST["vaccine_add"])) {
    if (!empty($_POST["vaccine_name"]) && !empty($_POST["vaccine_gap"]) && !empty($_POST["vaccine_precautions"])) {
        include "../Model/adminModel.php";
        $admin = new adminModel();
        $addStatus = $admin->addVaccine($_POST["vaccine_name"], $_POST["vaccine_gap"], $_POST["vaccine_precautions"]);
        if ($addStatus) {
            //Adding the city is successful
            header('location: ../View/admin_panel.php');
        } else {
            //Adding the vaccine failed (repeated vaccine name)
            header('location: ../View/admin_panel.php?verr=1');
        }
    } else {
        //Empty textboxes
        header('location: ../View/admin_panel.php?verr=0');
    }
}

if (isset($_POST["center_add"])) {
    if (!empty($_POST["center_name"]) && !empty($_POST["center_address"])
        && !empty($_POST["center_contactno"]) && !empty($_POST["center_username"])
        && !empty($_POST["center_password"])) {
        if (!preg_match('@[a-z]@', $_POST["center_password"]) ||
            !preg_match('@[0-9]@', $_POST["center_password"]) || strlen($_POST["center_password"]) < 8) {
            //The password doesn't follow the requirements
            header('location: ../View/admin_panel.php?vcerr=2');
        } else {
            if (strlen($_POST["center_contactno"]) != 11) {
                //The contact number isn't formed of 11 numbers
                header('location: ../View/admin_panel.php?vcerr=3');
            } else {
                include "../Model/adminModel.php";
                $admin = new adminModel();
                $addStatus = $admin->addVaccinationCenter($_POST["center_username"], $_POST["center_password"],
                    $_POST["center_name"], $_POST["center_city"], $_POST["center_address"],
                    $_POST["center_contactno"], $_POST["center_type"]);
                if ($addStatus) {
                    //Adding the city is successful
                    header('location: ../View/admin_panel.php');
                } else {
                    //Adding the vaccination center failed (repeated vaccination name)
                    header('location: ../View/admin_panel.php?vcerr=1');
                }
            }
        }
    } else {
        //Empty textboxes
        header('location: ../View/admin_panel.php?vcerr=0');
    }
}

//This method prints the errors based on the GET error ID in the link
function echoError($errorName) {
    //List of possible errors
    $errorList = array("cerr" => array("Enter a name", "This city already exists"),
        "verr" => array("Enter all information", "This vaccine already exists"),
        "vcerr" => array("Enter all information", "This username or vaccination center already exist",
            "The password should be longer than 7 letters, contain numbers and letters", "The contact number should be 11 digits"));
    if (isset($_GET[$errorName])) {
        echo $errorList[$errorName][$_GET[$errorName]];
    }
}