<?php
Class VaccinationCenterModel {
    private $name;
    private $contactNum;
    private $reservationNumber;
    private $db;


    function __construct() {
        include_once'../Include/DatabaseClass.php';
        $this->db = new database();
    }

    function  getName(){
        return $this->name;
    }

    function  listReservations(){
    # 3 join
        $list = $this->db->select("select nationalID as 'Vaccine User National ID', Name as 'Name Of Receiver', ID.VaccinationCenter as 'Reservation Number', Name.Vaccine as 'Vaccine Name' from VaccineUser inner join VaccineReservation on VaccineUser.nationalID = VaccineReservation.ID inner join Vaccine on Vaccine.ID = VaccineReservation.VaccineID");
        return $list;
    }

    function  findReservation($reservationNumber){
        ## query to find vaccine id
         $this->$reservationNumber;
         $nationalID = select('select user_nationalID from vaccineReservation where ID = $reservationNumber');
         $nameOfUser = select('select Name from VaccineUser where nationalId = $nationalID[0]');
         $nameOfVaccine = select('select Name from Vaccine where Vaccine.ID = VaccineReservation.VaccineID AND VaccineReservation.ID = $reservationNumber');
         echo $nationalID['user_nationalID'], $nameOfUser['Name'], $nameOfVaccine['Name'];
    }

    function  confirmReservation($reservationNumber){
        #vac user, increment
        # if dose no = 1 : set secdosedate -> 7asab el gap
        /*
         * save gap in SESSION
         *
         * dose date = today
         *
         * date after gap
         * */
        # delete reservation
        # header function

        #make query to update the DoseNumber
        #if doseNo = 1
        #calculate second dose date, then add//update (doseNo + SecondDoseDate) to query
        #if dose No = 2
        # remove whole row -- use query to remove (id) from reservation
        #delete from vacres where userid = $reservationNumber
    }
}
#