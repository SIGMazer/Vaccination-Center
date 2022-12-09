<?php
function echoLandingTable() {
    include_once 'Include/DatabaseClass.php';
    $db = new database();
    $query = "SELECT vaccinationcenter.Name as 'Name', city.Name as 'City', Address, ContactNum, Type FROM vaccinationcenter INNER JOIN city ON city.ID = vaccinationcenter.CityID";
    $centerList = $db->display($query);
    $centerSize = $db->check($query);
    for ($x = 0; $x < $centerSize; $x++) {
        echo "<tr>";
        echo "<td>" . $centerList[$x]['Name'] . "</td>";
        echo "<td>" . $centerList[$x]['City']. "</td>";
        echo "<td>" . $centerList[$x]['Address']. "</td>";
        echo "<td>" . $centerList[$x]['ContactNum']. "</td>";
        echo "<td>" . $centerList[$x]['Type']. "</td>";
        echo "</tr>";
    }
}

function echoCityList() {
    include_once '../Include/DatabaseClass.php';
    $db = new database();
    $query = "SELECT * FROM city";
    $cityList = $db->display($query);
    $citySize = $db->check($query);
    for ($x = 0; $x < $citySize; $x++) {
        echo '<option value = "' . $cityList[$x]['ID'] . '">' . $cityList[$x]['Name'] . '</option>';
    }
}

function echoVaccineList() {
    include_once '../Include/DatabaseClass.php';
    $db = new database();
    $query = "SELECT * FROM vaccine";
    $cityList = $db->display($query);
    $citySize = $db->check($query);
    for ($x = 0; $x < $citySize; $x++) {
        echo '<option value = "' . $cityList[$x]['ID'] . '">' . $cityList[$x]['Name'] . '</option>';
    }
}

function echoCenterList() {
    include_once '../Include/DatabaseClass.php';
    $db = new database();
    $query = "SELECT * FROM vaccinationcenter";
    $cityList = $db->display($query);
    $citySize = $db->check($query);
    for ($x = 0; $x < $citySize; $x++) {
        echo '<option value = "' . $cityList[$x]['ContactNum'] . '">' . $cityList[$x]['Name'] . '</option>';
    }
}

function echoCityName() {
    if (isset($_SESSION["cID"]) && !empty($_SESSION["cID"])) {
        include_once '../Include/DatabaseClass.php';
        $db = new database();
        $name = $db->select("SELECT * FROM city where ID = {$_SESSION["cID"]}")['Name'];
        echo $name;
    } else {
        echo "none";
    }
}