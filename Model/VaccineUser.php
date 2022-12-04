<?php
class vaccineuser {
    private $name;
    private  $doses;
    private $reserveStatus;
    private $center_contactNum;
    private $vaccine_ID;
    private $reservationDate;
    private $resurvationNumber;
    
    function __construct() {
		include_once'../Include/DatabaseClass.php';		
		$this->db = new database();
	}

    public function getName(){
        return $this->name;
    }
    public function getDoses(){
        return $this->doses;
    }
    public function getResetveStatus(){
        return $this->reserveStatus;
    }
    public function getReservation(){
        return $resurvationNumber;
    }
    public function reserveDose(center_contactNum,vaccine_ID,reservationDate){
        $this->center_contactNum = $center_contactNum;
		$this->vaccine_ID = $vaccine_ID;
        $this->reservationDate = $reservationDate;
		// $sql = "SELECT * FROM VaccineUser";
		// $row = $this->db->select($sql);
        
        // if ($row['reservationDate'] === $this->reservationDate) {
        //     session_start();
        //     $_SESSION['center_contactNum'] = $row['center_contactNum'];
        //     $_SESSION['vaccine_ID']=$row['vaccine_ID'];
        //     $_SESSION['reservationDate'] = $row['reservationDate'];
            
                
        //     $this->db->close();	
        //     return true;
        // }
        // $this->db->close();	
        // return false;
    
    }
    public function listVaccines(){
        $sql = "SELECT * FROM VaccineUser";
        ?><select><?php
        //$result = $this->conn->query($sql)
        while($result = mysqli_fetch_array($sql)){
               ?><option><?php echo $result['title'];?> </option>
        <?php        
        }
    }
}
?>