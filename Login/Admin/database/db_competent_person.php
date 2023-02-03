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

    public function fetch_competent_person_trash(){

        $sql= "SELECT * FROM `trash` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

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