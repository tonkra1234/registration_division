<?php
include '../db_competent_person.php';

$cpId = $_POST['cpId'];
$db = new CP();

$Name = $_POST['Name'];
$Gender = $_POST['Gender'];
$CP_category = $_POST['CP_category'];
$CP_Registration_No = $_POST['CP_Registration_No'];
$CID_No = $_POST['CID_No'];
$CP_type = $_POST['CP_type'];
$Contact_No = $_POST['Contact_No'];
$email_address = $_POST['email_address'];
$Firm_Name = $_POST['Firm_Name'];
$Firm_Location = $_POST['Firm_Location'];
$Previous_Firm_name = $_POST['Previous_Firm_name'];
$Dzongkhag = $_POST['Dzongkhag'];
$Application_Number = $_POST['Application_Number'];
$BMHC_Certificate_No = $_POST['BMHC_Certificate_No'];
$Qualification = $_POST['Qualification'];
$Nationality = $_POST['Nationality'];
$Date_of_receipt_of_application = $_POST['Date_of_receipt_of_application'];
$Date_of_registration = $_POST['Date_of_registration'];
$st_expiray_date = $_POST['st_expiray_date'];
$Application_date = $_POST['Application_date'];
$Renewal_date = $_POST['Renewal_date'];
$Application_date_second = $_POST['Application_date_second'];
$Renewal_date_second = $_POST['Renewal_date_second'];
$Certificate_Validity_Date = $_POST['Certificate_Validity_Date'];
$Application_date_pharmacy = $_POST['Application_date_pharmacy'];
$Issuance_date_pharmacy = $_POST['Issuance_date_pharmacy'];
$Remarks = $_POST['Remarks'];
$Status_show = $_POST['Status_show'];


if ($db->approval_competent_person($Name, $Gender, $CP_category, $CP_Registration_No, 
$CID_No, $CP_type, $Contact_No, $email_address, $Firm_Name, $Firm_Location, $Previous_Firm_name,
$Dzongkhag, $Application_Number, $BMHC_Certificate_No, $Qualification, $Nationality, $Date_of_receipt_of_application, $Date_of_registration,
$st_expiray_date, $Application_date, $Renewal_date, $Application_date_second, $Renewal_date_second, $Certificate_Validity_Date, $Application_date_pharmacy,
$Issuance_date_pharmacy, $Remarks, $Status_show)) {
    $db->reject_competent_person($cpId);
}



?>