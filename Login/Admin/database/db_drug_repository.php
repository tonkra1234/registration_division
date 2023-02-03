<?php

class ConfigDrug {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "drug_repository";
    private $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . '';
    protected $conn = null;

    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

class Drug extends ConfigDrug {

    public function count_drug_repository(){

        $sql= "SELECT count(*) as number_drug_repository FROM `drug_record` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function count_inspectors(){

        $sql= "SELECT count(*) as number_inspectors FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function inspectors(){

        $sql= "SELECT * FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function insert_inspectors($name,$division,$Avatar){

        $sql= "INSERT INTO inspector(name,Division,picture) VALUES(:name,:division,:picture) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'name'=>$name,
            'division' =>$division,
            'picture' => $Avatar
        ]);

        return true;
    }

    public function edit_inspectors($id,$Inspector_name,$Division,$Avatar) {
        $sql = "UPDATE inspector SET name=:Inspector_name, Division=:Division, picture=:Avatar WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Inspector_name' => $Inspector_name,
            'Division' => $Division,
            'Avatar' => $Avatar,
        ]);
        return true;
    }

    public function delete_inspectors($id) {
        $sql = "DELETE FROM inspector WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }
    
}

?>