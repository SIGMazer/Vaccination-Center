<?php
Class VaccinationCenterModel {
    private $name;
    private $contactNum;
    private $reservationNumber;
    private $db;


    function __construct() {
        include_once'../Include/DatabaseClass.php';
        $this->db = new database();
        $data = $this->db->select('select * from vaccinationcenter where UserID = "$_SESSION["type"]"');
        $this->name = $data['Name'];
        $this->contactNum = $data['ContactNum'];
    }

    function  getName(){
        return $this->name;
    }

    function  listReservations(){

        $list = $this->db->select("select nationalID as 'Vaccine User National ID', vaccineuser.Name as 'Name Of Receiver', 
                                    vaccinereservation.ID as 'Reservation Number', vaccine.Name as 'Vaccine Name' from vaccineuser 
                                    inner join vaccinereservation on vaccineuser.nationalID = vaccinereservation.ID 
                                    inner join vaccine on vaccine.ID = vaccinereservation.VaccineID 
                                    where vaccinereservation.Center_ContactNum = {$this->contactNum} AND Date = CURDATE()");
        return $list;
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
            //upload
        }

        $this->db->delete("delete from vaccinereservation where ID = {$_SESSION['ResID']}");
    }
}
#