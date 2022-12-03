<?php

class LoginRegModel
{

    private $db;
    private $error ;


    function __construct(){
        include_once '../Include/DatabaseClass.php';
        $this->db = new database();
    }


    public function registeration($username,$password,$nationalId,$name,$cityId,$email,$phoneNUmber)
    {
        $duplicate = mysqli_query($this->db, "SELECT * FROM vaccineuser,user WHERE  vaccineuser.NationalID ='$nationalId' OR user.Username ='$username'  ");

        if(mysqli_num_rows($duplicate) > 0) // if user duplicated
        {
            $this->error = "User is already exist.";
            return false ;
        }
        else
        {
            $query = "INSERT INTO user(Username,Password,UserType) VALUES('$username','$password',3)";
            mysqli_query($this->db,$query); //store data in user table

            $id = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT ID FROM user WHERE Username ='$username'")); // get user id

            $query = "INSERT INTO vaccineuser(NationalID,UserID,CityID,Name,Email,PhoneNumber) VALUES('$nationalId','$id[0]','$cityId','$name','$email','$phoneNUmber')";
            mysqli_query($this->db,$query); // store data in vaccineuser table

            return true; // registration success 

        }


    }

    public function getError()
    {
        return $this->error;
    }



}