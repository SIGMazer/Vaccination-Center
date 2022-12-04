<?php
class adminModel {
    private $db;
    function __construct() {
        require_once "../Include/DatabaseClass.php";
        $this->db = new database();
    }

    function addCity($cityName) {
        $query = "INSERT INTO city(Name) VALUES('$cityName')";
        $check = $this->db->check("SELECT * FROM city WHERE Name = '$cityName'");
        if ($check > 0) {
            return false;
        } else {
            $adding = $this->db->insert($query);
            if ($adding) {
                return true;
            }
        }
    }

    function addVaccine($name, $gap, $precautions) {
        $query = "INSERT INTO vaccine(Name, Gap, Precautions) VALUES ('$name', '$gap', '$precautions')";
        $check = $this->db->check("SELECT * FROM vaccine WHERE Name = '$name'");
        if ($check > 0) {
            return false;
        } else {
            $adding = $this->db->insert($query);
            if ($adding) {
                return true;
            }
        }
    }

    function addVaccinationCenter($username, $password, $name, $cityID, $address, $contactNum, $type) {
        //Checking if this vaccination center doesn't exist, the username isn't taken
        $check1 = $this->db->check("SELECT * FROM vaccinationCenter WHERE ContactNum = '$contactNum'");
        $check2 = $this->db->check("SELECT * FROM user WHERE Username = '$username'");
        if ($check1 > 0 || $check2 > 0) {
            return false;
        } else {
            //Query to add in the user table
            $queryU = "INSERT INTO user(Username, Password, UserType) VALUES ('$username', '$password', 2)";
            @$addingUser = $this->db->insert($queryU);
            $userID = $this->db->select("SELECT * FROM user WHERE Username = '$username'")["ID"];
            //Query to add in the vaccination center table
            $queryV = "INSERT INTO vaccinationcenter(ContactNum, UserID, CityID, Name, Address, Type)
                   VALUES ('$contactNum', '$userID', '$cityID', '$name', '$address', '$type')";
            @$addingVC = $this->db->insert($queryV);
            if ($addingUser && $addingVC) {
                return true;
            }
        }
    }

    function listUsers() {
        $query = "SELECT Username, NationalID, city.Name as City, vaccineuser.Name as Name, Email, PhoneNumber 
                FROM user INNER JOIN vaccineuser ON vaccineuser.UserID INNER JOIN city ON vaccineuser.CityID = city.ID
                WHERE user.UserType = 3";
        $userList = $this->db->display($query);
        $userCount = $this->db->check($query);
        for ($x = 0; $x < $userCount; $x++) {
            echo "<tr>";
            echo "<td>" . $userList[$x]['Username'] . "</td>";
            echo "<td>" . $userList[$x]['Name']. "</td>";
            echo "<td>" . $userList[$x]['City']. "</td>";
            echo "<td>" . $userList[$x]['Email']. "</td>";
            echo "<td>" . $userList[$x]['PhoneNumber']. "</td>";
            echo "<td>" . $userList[$x]['NationalID']. "</td>";
        }
    }
}