<?php

    if(isset($_POST["submit"]))
    {
        include '../Model/LoginRegModel.php';

        $reg = new LoginRegModel();

        $res = $reg->registeration($_POST["reg_username"],$_POST["reg_password"],$_POST["reg_nationalID"],$_POST["reg_name"], 1, $_POST["reg_email"],$_POST["reg_phonenumber"]);

        if(!$res) {
            echo "error";
        }

    }

