<?php
include '../db_competent_person.php';
include '../../include/util.php';

$util = new Util();

$cpId = $_POST['cpId'];
$db = new CP();

$Name = $util->testInput( $_POST['Name']);
$Gender = $util->testInput( $_POST['Gender']);
$CP_category = $util->testInput( $_POST['CP_category']);
$CP_Registration_No = $util->testInput( $_POST['CP_Registration_No']);
$CID_No = $util->testInput( $_POST['CID_No']);
$CP_type = $util->testInput( $_POST['CP_type']);
$Contact_No = $util->testInput( $_POST['Contact_No']);
$email_address = $util->testInput( $_POST['email_address']);
$Firm_Name = $util->testInput( $_POST['Firm_Name']);
$Firm_Location = $util->testInput( $_POST['Firm_Location']);
$Previous_Firm_name = $util->testInput( $_POST['Previous_Firm_name']);
$Dzongkhag = $util->testInput( $_POST['Dzongkhag']);
$Application_Number = $util->testInput( $_POST['Application_Number']);
$BMHC_Certificate_No = $util->testInput( $_POST['BMHC_Certificate_No']);
$Qualification = $util->testInput( $_POST['Qualification']);
$Nationality = $util->testInput( $_POST['Nationality']);
$Date_of_receipt_of_application = $util->testInput( $_POST['Date_of_receipt_of_application']);
$Date_of_registration = $util->testInput( $_POST['Date_of_registration']);
$st_expiray_date = $util->testInput( $_POST['st_expiray_date']);
$Application_date = $util->testInput( $_POST['Application_date']);
$Renewal_date = $util->testInput( $_POST['Renewal_date']);
$Application_date_second = $util->testInput( $_POST['Application_date_second']);
$Renewal_date_second = $util->testInput( $_POST['Renewal_date_second']);
$Certificate_Validity_Date = $util->testInput( $_POST['Certificate_Validity_Date']);
$Application_date_pharmacy = $util->testInput( $_POST['Application_date_pharmacy']);
$Issuance_date_pharmacy = $util->testInput( $_POST['Issuance_date_pharmacy']);
$Remarks = $util->testInput( $_POST['Remarks']);
$Status_show = $util->testInput( $_POST['Status_show']);


if ($db->approval_competent_person($Name, $Gender, $CP_category, $CP_Registration_No, 
$CID_No, $CP_type, $Contact_No, $email_address, $Firm_Name, $Firm_Location, $Previous_Firm_name,
$Dzongkhag, $Application_Number, $BMHC_Certificate_No, $Qualification, $Nationality, $Date_of_receipt_of_application, $Date_of_registration,
$st_expiray_date, $Application_date, $Renewal_date, $Application_date_second, $Renewal_date_second, $Certificate_Validity_Date, $Application_date_pharmacy,
$Issuance_date_pharmacy, $Remarks, $Status_show)) {
    $db->reject_competent_person($cpId);
}



?>