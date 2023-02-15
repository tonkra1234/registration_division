<?php

class ConfigCP {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "cp_table";
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

class CP extends ConfigCP {

    public function count_competent_person(){

        $sql= "SELECT count(*) as total_competent_person FROM cp_repository ";
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

    public function fetch_competent_person_trash() {
        
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

    // public function fetch_competent_person_trash(){

    //     $sql= "SELECT * FROM `trash` ";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     $results =  $stmt->fetchAll();

    //     return $results;
    // }

    public function count_competent_person_trash(){

        $sql= "SELECT count(*) as number_competent_person_trash FROM `trash` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function delete_competent_person($id) {
        $sql = "DELETE FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_competent_person($id) {
        $sql = "INSERT INTO cp_repository SELECT * FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function count_competent_person_approval(){

        $sql= "SELECT count(*) as number_competent_person_approval FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_competent_person_approval(){

        $sql= "SELECT * FROM `pre_approval` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function approval_competent_person($Name, $Gender, $CP_category, $CP_Registration_No, 
    $CID_No, $CP_type, $Contact_No, $email_address, $Firm_Name, $Firm_Location, $Previous_Firm_name,
    $Dzongkhag, $Application_Number, $BMHC_Certificate_No, $Qualification, $Nationality, $Date_of_receipt_of_application, $Date_of_registration,
    $st_expiray_date, $Application_date, $Renewal_date, $Application_date_second, $Renewal_date_second, $Certificate_Validity_Date, $Application_date_pharmacy,
    $Issuance_date_pharmacy, $Remarks, $Status_show) {
        $sql = "INSERT INTO cp_repository (Application_Number,Date_of_receipt_of_application,
        Date_of_registration,st_expiray_date,CP_Registration_No,Name ,CID_No,BMHC_Certificate_No,
        Qualification,CP_category,Gender,Nationality,Contact_No,email_address,Firm_Name,
        Firm_Location,Dzongkhag,CP_type,Application_date,Renewal_date,Application_date_second,Renewal_date_second,
        Certificate_Validity_Date,Application_date_pharmacy,Issuance_date_pharmacy,Status_show,
        Previous_Firm_name,Remarks) 
        VALUES(:Application_Number,:Date_of_receipt_of_application,:Date_of_registration,:st_expiray_date,:CP_Registration_No,
        :Name,:CID_No,:BMHC_Certificate_No,:Qualification,:CP_category,:Gender,:Nationality,:Contact_No,:email_address,:Firm_Name,
        :Firm_Location,:Dzongkhag,:CP_type,:Application_date,:Renewal_date,:Application_date_second,:Renewal_date_second,
        :Certificate_Validity_Date,:Application_date_pharmacy,:Issuance_date_pharmacy,:Status_show,:Previous_Firm_name,:Remarks)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Name' => $Name,
            'Gender' => $Gender,
            'CP_category' => $CP_category,
            'CP_Registration_No' => $CP_Registration_No,
            'CID_No' => $CID_No,
            'CP_type' => $CP_type,
            'Contact_No' => $Contact_No,
            'email_address' => $email_address,
            'Firm_Name' => $Firm_Name,
            'Firm_Location' => $Firm_Location,
            'Previous_Firm_name' => $Previous_Firm_name,
            'Dzongkhag' => $Dzongkhag,
            'Application_Number' => $Application_Number,
            'BMHC_Certificate_No' => $BMHC_Certificate_No,
            'Qualification' => $Qualification,
            'Nationality' => $Nationality,
            'Date_of_receipt_of_application' => $Date_of_receipt_of_application,
            'Date_of_registration' => $Date_of_registration,
            'st_expiray_date' => $st_expiray_date,
            'Application_date' => $Application_date,
            'Renewal_date' => $Renewal_date,
            'Application_date_second' => $Application_date_second,
            'Renewal_date_second' => $Renewal_date_second,
            'Certificate_Validity_Date' => $Certificate_Validity_Date,
            'Application_date_pharmacy' => $Application_date_pharmacy,
            'Issuance_date_pharmacy' => $Issuance_date_pharmacy,
            'Remarks' => $Remarks,
            'Status_show' => $Status_show,
        ]);

        return true;
    }

    public function reject_competent_person($id) {
        $sql = "DELETE FROM pre_approval WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    

    
}

?>