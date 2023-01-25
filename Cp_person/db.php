<?php

require_once './includes/config.php';

class DataBase extends Config {

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

        $sql_count ="SELECT COUNT(*) As total_records FROM `cp_repository`";
        $stmt = $this->conn->prepare($sql_count);
        $stmt->execute();
        $result_count= $stmt->fetch();

        $total_records = $result_count['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        return [$offset, $total_records_per_page,$total_records,$page_no,$total_no_of_pages];
    }

    public function read() {
        
        $paginators=$this->paginator();
        $offset = $paginators[0];
        $total_records_per_page = $paginators[1];
        $total_records = $paginators[2];
        $page_no = $paginators[3];
        $total_no_of_pages = $paginators[4];

        $sql ="SELECT * FROM `cp_repository` ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records];
    }

    public function readOne($id) {
        $sql = "SELECT * FROM cp_repository WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update($id, $Name, $Gender, $CP_category, $CP_Registration_No, 
    $CID_No, $CP_type, $Contact_No, $email_address, $Firm_Name, $Firm_Location, $Previous_Firm_name,
    $Dzongkhag, $Application_Number, $BMHC_Certificate_No, $Qualification, $Nationality, $Date_of_receipt_of_application, $Date_of_registration,
    $st_expiray_date, $Application_date, $Renewal_date, $Application_date_second, $Renewal_date_second, $Certificate_Validity_Date, $Application_date_pharmacy,
    $Issuance_date_pharmacy, $Remarks, $Status_show) {
        $sql = "UPDATE cp_repository SET `Name` = :Name, Gender = :Gender, CP_category = :CP_category, CP_Registration_No= :CP_Registration_No, 
        CID_No = :CID_No, CP_type = :CP_type, Contact_No = :Contact_No , email_address = :email_address, Firm_Name = :Firm_Name, Firm_Location = :Firm_Location,
        Previous_Firm_name = :Previous_Firm_name, Dzongkhag = :Dzongkhag, Application_Number = :Application_Number, 
        BMHC_Certificate_No = :BMHC_Certificate_No, Qualification = :Qualification, Nationality = :Nationality,
        Date_of_receipt_of_application = :Date_of_receipt_of_application, Date_of_registration = :Date_of_registration, st_expiray_date = :st_expiray_date,
        Application_date = :Application_date, Renewal_date = :Renewal_date, Application_date_second = :Application_date_second,
        Renewal_date_second = :Renewal_date_second, Certificate_Validity_Date = :Certificate_Validity_Date, Application_date_pharmacy = :Application_date_pharmacy,
        Issuance_date_pharmacy = :Issuance_date_pharmacy, Remarks = :Remarks, Status_show = :Status_show
        WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
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
            'Status_show' => $Status_show
        ]);
        return true;
    }

    public function insert($Name, $Gender, $CP_category, $CP_Registration_No, 
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
}

?>