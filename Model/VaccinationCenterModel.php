<?php
Class VaccinationCenterModel {
    private $name;
    private $contactNum;
    private $reservationNumber;
    private $db;


    function __construct() {
        include_once'../Include/DatabaseClass.php';
        $this->db = new database();
        session_start();
        $data = $this->db->select("select * from vaccinationcenter where UserID = {$_SESSION['id']}");
        $this->name = $data['Name'];
        $this->contactNum = $data['ContactNum'];
    }


    function  getName(){
        return $this->name;
    }


    function  listReservations(){
        $query = "SELECT vaccineuser.Name as 'Name', vaccinereservation.User_NationalID as 'NationalID', vaccine.Name as 'Vaccine', vaccinereservation.ID as 'resNumber' FROM vaccinereservation INNER JOIN vaccineuser ON vaccineuser.NationalID = vaccinereservation.User_NationalID INNER JOIN vaccine ON vaccine.ID = vaccinereservation.VaccineID WHERE vaccinereservation.Center_ContactNum = {$this->contactNum} AND vaccinereservation.Date = CURRENT_DATE";
        $list = $this->db->display($query);
        $resCount = $this->db->check($query);
        for ($x = 0; $x < $resCount; $x++) {
            echo "<tr>";
            echo "<td>" . $list[$x]['resNumber'] . "</td>";
            echo "<td>" . $list[$x]['Name'] . "</td>";
            echo "<td>" . $list[$x]['NationalID'] . "</td>";
            echo "<td>" . $list[$x]['Vaccine'] . "</td>";
            echo "</tr>";
        }
    }


    function  findReservation($reservationNumber){

        $reservation = $this->db->select("select * from vaccinereservation where ID = {$reservationNumber}");
        $nationalID = $reservation['User_NationalID'];
        $nameOfUser = $this->db->select("select Name from VaccineUser where nationalID = {$nationalID}")["Name"];
        $nameOfVaccine = $this->db->select("select Name from Vaccine where Vaccine.ID = {$reservation['VaccineID']}")["Name"];

        session_start();
        $_SESSION['ResID']= $reservationNumber;
        $_SESSION['NatID']= $nationalID;
        $_SESSION['NameUser']= $nameOfUser;
        $_SESSION['NameVac']= $nameOfVaccine;
    }


    function  confirmReservation($reservationNumber){

        $doseNum = $this->db->select("select DoseNumber from vaccineuser where nationalID = {$_SESSION['NatID']}")["DoseNumber"]+1;
        $this->db->update("update vaccineuser set DoseNumber = {$doseNum} where nationalID = {$_SESSION['NatID']}");

        if($doseNum==1)
        {
            $gap = $this->db->select("select Gap from vaccine where Name = {$_SESSION['NameVac']}")["Gap"];
            $this->db->update("update vaccineuser set SecondDoseDate = DATE_ADD(CURDATE(),INTERVAL {$gap} DAY) where nationalID = {$_SESSION['NatID']}");
        }
        else if ($doseNum==2)
        {

        }

        $this->db->delete("delete from vaccinereservation where ID = {$_SESSION['ResID']}");
    }

}