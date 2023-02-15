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

    public function paginator(){

        // variable to store number of rows per page
        $total_records_per_page = 15;   

        // update the active page number
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        // get the initial page number
        $offset = ($page_no-1) * $total_records_per_page;

        $sql_count ="SELECT COUNT(*) As total_records FROM `trash`";
        $stmt = $this->conn->prepare($sql_count);
        $stmt->execute();
        $result_count= $stmt->fetch();

        $total_records = $result_count['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        return [$offset, $total_records_per_page,$total_records,$page_no,$total_no_of_pages];
    }

    public function fetch_manufacturer_trash() {
        
        $paginators=$this->paginator();
        $offset = $paginators[0];
        $total_records_per_page = $paginators[1];
        $total_records = $paginators[2];
        $page_no = $paginators[3];
        $total_no_of_pages = $paginators[4];

        $sql ="SELECT * FROM `trash` ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records];
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
