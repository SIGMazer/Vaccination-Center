<?php
class adminModel {
    private $db;
    public function __construct() {
        require_once "../Include/DatabaseClass.php";
        $this->db = new database();
    }

    public function addCity($cityName) {
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

    public function addVaccine($name, $gap, $precautions) {
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

    public function addVaccinationCenter($username, $password, $name, $cityID, $address, $contactNum, $type) {
        //Checking if this vaccination center doesn't exist, the username isn't taken
        $check1 = $this->db->check("SELECT * FROM vaccinationCenter WHERE ContactNum = '$contactNum' AND Name = '$name'");
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

    public function listUsers() {
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
            echo "</tr>";
        }
    }

    public function searchVaccinationCenter($cityID) {
        $query = "SELECT * from vaccinationcenter WHERE CityID = '$cityID'";
        @$vcList = $this->db->display($query);
        @$vcCount = $this->db->check($query);
        for ($x = 0; $x < $vcCount; $x++) {
            echo "<tr>";
            echo "<form action = '../Controller/vclistController.php' method = 'post'>";
            echo "<td><input type = 'text' name = 'newName' value = '{$vcList[$x]['Name']}'></td>";
            echo "<td><input type = 'text' name = 'newAddress' value = '{$vcList[$x]['Address']}'></td>";
            echo "<td><input type = 'text' name = 'newContactNum' value = '{$vcList[$x]['ContactNum']}'></td>";
            echo "<td><select name='newType' id='type-names'>
                  <option>Government</option>
                  <option>Private</option>
                  </select></td>";
            echo "<td><input type = 'hidden' name = 'contactnum' value = '{$vcList[$x]['ContactNum']}'></td>";
            echo "<td><input type = 'hidden' name = 'uID' value = '{$vcList[$x]['UserID']}'></td>";
            echo "<td><input type = 'submit' name = 'update' value = 'update' class='btn btn-primary'></td>";
            echo "<td><input type = 'submit' name = 'delete' value = 'delete' class='btn btn-primary'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }

    public function updateVaccinationCenter($contactNum, $newName, $newAddress, $newContactNum, $newType) {
        $query = "UPDATE vaccinationcenter SET Name = '$newName', Address = '$newAddress',
                Type = '$newType', ContactNum = '$newContactNum' WHERE ContactNum = '$contactNum'";
        $check = $this->db->check("SELECT * FROM vaccinationcenter WHERE (ContactNum = '$newContactNum'
                                OR Name = '$newName') AND ContactNum != '$contactNum'");
        if ($check > 0) {
            return false;
        } else {
            @$updating = $this->db->update($query);
            if ($updating) {
                return true;
            }
        }
    }

    public function deleteVaccinationCenter($userID) {
        $query = "DELETE FROM user WHERE ID = '$userID'";
        $this->db->delete($query);
    }
}