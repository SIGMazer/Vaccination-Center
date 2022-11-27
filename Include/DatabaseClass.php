<?php
class database {
    private $host;
    private $user;
    private $password;
    private $database;
    public $conn;

    function __construct() {
        require_once 'connect.php';
        $this->host = $host;
        $this->user = $dbUser;
        $this->password = $dbPass;
        $this->database = $dbName;
        include_once 'DatabaseConnectionSingleton.php';
        $this->conn = Singleton::getinstance();
    }

    function connect() {
        if (!$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database)) {
            throw new Exception("Error:not connected to the server or not found database.");
        }
    }

    function close() {
        $this->conn->close();
    }

    function check($sql) {
        if ($result = $this->conn->query($sql)) {
            $num = $result->num_rows;
            return $num;
        }
    }

    function display($sql) {
        if ($result = $this->conn->query($sql)) {
            $num = $result->num_rows;
            if ($num > 0) {
                for ($i = 0; $i < $num; $i++) {
                    $data[$i] = $result->fetch_array(MYSQLI_ASSOC);
                }
                return $data;
            }
        } else {
            throw new Exception("problem in query:".$sql);
        }
    }

    function select($sql) {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("can not make query :" . $sql);
            return false;
        }
        if($row = $result->fetch_array(MYSQLI_ASSOC))
            $result->close();
        return $row;
    }

    function update($sql) {
        if(!$result=$this->conn->query($sql)) {
            throw new Exception("Error:can not execute the query");
        } else {
            return true;
        }
    }

    function insert($sql) {
        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            throw new Exception("Error :SQL:".$sql);
            return false;
        }
    }

    function delete($sql) {
        if(!$result=$this->conn->query($sql)) {
            throw new Exception("Error: not deleted");
            return false;
        } else {
            return true;
        }

    }

    function getLastRecordData($tablename) {
        $query = "SELECT * FROM $tablename ORDER BY id  DESC LIMIT 1";
        if ($result = $this->conn->query($query)) {
            $data = $result->fetch_array(MYSQLI_ASSOC);
        }
        return $data;
    }
}
?>