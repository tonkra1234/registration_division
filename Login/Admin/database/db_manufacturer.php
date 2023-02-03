<?php

class ConfigManufacturer {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "manufacturer";
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

class Manufacturer extends ConfigManufacturer {

    public function count_manufacturer(){

        $sql= "SELECT count(*) as number_manufacturer FROM `manufacturer_list` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_manufacturer_trash(){

        $sql= "SELECT * FROM `trash` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function count_manufacturer_trash(){

        $sql= "SELECT count(*) as number_manufacturer_trash FROM `trash` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function delete_manufacturer($id) {
        $sql = "DELETE FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_manufacturer($id) {
        $sql = "INSERT INTO manufacturer_list SELECT * FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function count_manufacturer_approval(){

        $sql= "SELECT count(*) as number_manufacturer_approval FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_manufacturer_approval(){

        $sql= "SELECT * FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function approval_manufacturer($Name_Manufacturer, $Proprietor, $Key_person, $Category, $Location, $Email, $Dzongkhag, $image_link) {
        $sql = "INSERT INTO manufacturer_list(Name_Manufacturer,Proprietor,Key_person,Category,`Location`,Email,Dzongkhag,image_link) VALUES(:Name_Manufacturer,:Proprietor,:Key_person,:Category,:Location,:Email,:Dzongkhag,:image_link)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Name_Manufacturer' => $Name_Manufacturer,
            'Proprietor' => $Proprietor,
            'Key_person' => $Key_person,
            'Category' => $Category,
            'Location' => $Location,
            'Email' => $Email,
            'Dzongkhag' => $Dzongkhag,
            'image_link' => $image_link,
        ]);

        return true;
    }

    public function reject_manufacturer($id) {
        $sql = "DELETE FROM pre_approval WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }


}

?>
