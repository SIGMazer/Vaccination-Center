<?php

class LoginRegModel
{

    private $db;

    function __construct(){
        include_once '../Include/DatabaseClass.php';
        $this->db = new database();
    }

    public function registeration($username,$password,$nationalId,$name,$cityId,$email,$phoneNUmber)
    {
        $duplicate = $this->db->select("SELECT * FROM vaccineuser,user WHERE  vaccineuser.NationalID ='$nationalId' OR user.Username ='$username'  ");
        if($duplicate > 0) // if user duplicated
        {
            return false;
        }
        else
        {
            $query = "INSERT INTO user(Username,Password,UserType) VALUES('$username','$password',3)";
            $this->db->insert($query); //store data in user table

            $id = $this->db->select("SELECT ID FROM user WHERE Username ='$username'")["ID"]; // get user id

            $query = "INSERT INTO vaccineuser(NationalID,UserID,CityID,Name,Email,PhoneNumber) VALUES('$nationalId','$id','$cityId','$name','$email','$phoneNUmber')";

            $this->db->insert($query); // store data in vaccineuser table

            return true; // registration success 

        }


    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE Username='$username'";
        $row = $this->db->select($sql);
        if ($row['Password'] === $password) {
            session_start();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['username']=$row['Username'];
            $_SESSION['type'] = $row['UserType'];


            return true;
        }

        return false;
    }


     public static  function errorHandler($msg)
    {


        $check = $msg;

        if ($check == 'empty') {
            echo "<p class = 'error' style=color:red >Fill all inputs<p>";
            exit();
        }
        if ($check == 'invalidData') {
            echo "<p class = 'error' style=color:red >Username or password wrong<p>";
            exit();
        }
        if($check == "invalidpass" )
        {
            echo "<p class = 'error' style=color:red >Password should contain number, be at least 8 character long<p>";
            exit();
        }
        if($check == "invalidemail")
        {
            echo "<p class = 'error' style=color:red >Invalid email<p>";
            exit();
        }
        if($check == "invalidphone")
        {
            echo "<p class = 'error' style=color:red >Invalid phone number<p>";
            exit();
        }
        if($check == "invalidID")
        {
            echo "<p class = 'error' style=color:red >Invalid national ID<p>";
            exit();
        }
        if ($check == "exists")
        {
            echo "<p class = 'error' style=color:red >This username is already taken or this person is already registered<p>";
            exit();
        }

    }

    function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
    }

    }