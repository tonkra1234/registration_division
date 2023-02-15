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

    public function fetch_drug_trash() {
        
        $paginators=$this->paginator();
        $offset = $paginators[0];
        $total_records_per_page = $paginators[1];
        $total_records = $paginators[2];
        $page_no = $paginators[3];
        $total_no_of_pages = $paginators[4];

        $sql ="SELECT * FROM `trash` ORDER BY `Number` DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records];
    }


    public function count_drug_trash(){

        $sql= "SELECT count(*) as number_drug_trash FROM `trash` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function delete_drug($id) {
        $sql = "DELETE FROM trash WHERE Number=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_drug($id) {
        $sql = "INSERT INTO drug_record SELECT * FROM trash WHERE Number=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function count_drug_approval(){

        $sql= "SELECT count(*) as number_drug_approval FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_drug_approval(){

        $sql= "SELECT * FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function reject_drug($id) {
        $sql = "DELETE FROM `pre_approval` WHERE Number=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function approval_drug($Essential,$Registration_Type, $Application_Type,$Market_Authorisation_Holder, 
    $Category_of_Medical_Product,$Intention,$Generic_Name,$Brand_Name, $Dosage_Form,$Pack_Size,
    $Type_of_Packaging, $Composition, $Manufacturer, $Marketer,$Country_of_Manufacturer, 
    $Therapeutic_Category,$Certificate_Number,$Issue_Date,$Expiry_Date,$Price_per_unit) {
        $sql = "INSERT INTO drug_record(Essential, Schedule, Registration_Type, Application_Type, 
        Market_Authorisation_Holder, Category_of_Medical_Product, Intention, Generic_Name, Brand_Name, 
        Dosage_Form, Pack_Size,Type_of_Packaging,Composition, Manufacturer, Marketer, Country_of_Manufacturer, 
        Therapeutic_Category, Certificate_Number, Issue_Date, Expiry_Date, Price_per_unit) 
        VALUES(:Essential, ' ', :Registration_Type, :Application_Type,:Market_Authorisation_Holder, 
        :Category_of_Medical_Product,:Intention,:Generic_Name,:Brand_Name, :Dosage_Form,:Pack_Size,
        :Type_of_Packaging, :Composition, :Manufacturer, :Marketer,:Country_of_Manufacturer, 
        :Therapeutic_Category,:Certificate_Number,:Issue_Date,:Expiry_Date,:Price_per_unit)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Essential' => $Essential,
            'Registration_Type' => $Registration_Type,
            'Application_Type' => $Application_Type,
            'Market_Authorisation_Holder' => $Market_Authorisation_Holder,
            'Category_of_Medical_Product' => $Category_of_Medical_Product,
            'Intention' => $Intention,
            'Generic_Name' => $Generic_Name,
            'Brand_Name' => $Brand_Name,
            'Dosage_Form' => $Dosage_Form,
            'Pack_Size' => $Pack_Size,
            'Type_of_Packaging' => $Type_of_Packaging,
            'Composition' => $Composition,
            'Manufacturer' => $Manufacturer,
            'Marketer' => $Marketer,
            'Country_of_Manufacturer' => $Country_of_Manufacturer,
            'Therapeutic_Category' => $Therapeutic_Category,
            'Certificate_Number' => $Certificate_Number,
            'Issue_Date' => $Issue_Date,
            'Expiry_Date' => $Expiry_Date,
            'Price_per_unit' => $Price_per_unit,
        ]);

        return true;
    }
     
}

?>