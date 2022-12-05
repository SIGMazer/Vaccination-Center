<?php
class vaccineuser {
    private $name;
    private  $doses;
    private $reserveStatus;
    private $center_contactNum;
    private $vaccine_ID;
    private $reservationDate;
    private $reservationNumber;
    private $center_contactNum;
    date_default_timezone_set("Africa/Cairo");
    
    function __construct() {
		include_once'../Include/DatabaseClass.php';		
		$this->db = new database();
        $sql = "SELECT * FROM vaccineuser,vaccinereservation where $_Session['UserID']";
        $row = $this->db->select($sql);
        $this->name=$row['Name'];
        $this->vaccine_ID=$row['VaccineID'];
        $this->reservationDate=$row['Date'];
        $this->doses=$row['DoseNumber'];
        $this->center_contactNum=$row['Center_ContactNum'];   
	}

    public function getName(){
        return $this->name;
    }
    public function getDoses(){
        return $this->doses;
    }
    public function getReserveStatus(){
        return $this->reserveStatus;
    }
    public function getReservation(){
        
        return $reservationNumber;
    }
    public function reserveDose(center_contactNum,vaccine_ID,reservationDate){
        $sql = "INSERT * FROM vaccinereservation,vaccineuser where vaccineuser['NationalID']= vaccinereservation['User_NationalID']";
        $this->center_contactNum = $center_contactNum;
		$this->vaccine_ID = $vaccine_ID;
        $this->reservationDate = date_create($reservationDate);
        if ($doses==0) {
            $row = $this->db->insert($sql);
            $reservationNumber="SELECT * FROM vaccinereservation,vaccineuser where vaccineuser['NationalID']= vaccinereservation['User_NationalID']";
            return true;
            $this->db->close();	
        }
        else if($doses==1){
            $row = $this->db->select($sql);
            $SecondDoseDate= "SELECT SecondDoseDate from vaccineuser";
            $diff= date_diff($reservationDate,$SecondDoseDate);
            if($diff->days >0){
                
                return getReservation();
            }
        }
        $this->db->close();	
        return false;
    }
    public function listVaccines(){
        $sql = "SELECT * FROM vaccine";
        $vaccineList= $db->display($sql);
        $vaccineList= $db->check($sql);
        for($x=0;$x<$vaccineList;$x++){
            echo "<tr>";
            echo "<td>". $vaccineList[$x]['Name']."</td>";
            echo "<td>". $vaccineList[$x]['Gap']."</td>";
            echo "<td>". $vaccineList[$x]['Precautions']."</td>";
        }
    }
}
?>