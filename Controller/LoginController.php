<?php

    if(isset($_POST['submit']))
    {


        include '../Model/LoginRegModel.php';

        $login = new LoginRegModel();

        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            header("location:http:../View/login.php?login=empty");
            exit();
        } else {
            if (!$login->login($username, $password)) {
                header("location:../View/login.php?login=invalidData");
                exit();
            } else {
                if ($login->login($username, $password)) {
                    @$type = $_SESSION['type'];
                    if ($type == 1) {
                        header("location:../View/admin_panel.php");
                        exit();
                    }
                    if ($type == 2) {
                        header("location:../View/vaccination_center_panel.php");
                        exit();
                    }
                    if ($type == 3) {
                        header("location:../View/user_panel.php");
                        exit();
                    }


                }
            }


        }
    }
    else
    {
        header("location: ../View/login.php");
        exit();
    }






