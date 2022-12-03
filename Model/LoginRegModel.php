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
            $this->error = "User is already exist.";
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

}