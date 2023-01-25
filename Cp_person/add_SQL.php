<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<?php
include './db.php';
include './util.php';

$db = new Database();
$util = new Util();

$Name = $util->testInput($_POST['Name']);
$Gender = $util->testInput($_POST['Gender']);
$CP_category = $util->testInput($_POST['CP_category']);
$CP_Registration_No = $util->testInput($_POST['CP_Registration_No']);
$CID_No = $util->testInput($_POST['CID_No']);
$CP_type = $util->testInput($_POST['CP_type']);
$Contact_No = $util->testInput($_POST['Contact_No']);
$email_address = $util->testInput($_POST['email_address']);
$Firm_Name = $util->testInput($_POST['Firm_Name']);
$Firm_Location = $util->testInput($_POST['Firm_Location']);
$Previous_Firm_name = $util->testInput($_POST['Previous_Firm_name']);
$Dzongkhag = $util->testInput($_POST['Dzongkhag']);
$Application_Number = $util->testInput($_POST['Application_Number']);
$BMHC_Certificate_No = $util->testInput($_POST['BMHC_Certificate_No']);
$Qualification = $util->testInput($_POST['Qualification']);
$Nationality = $util->testInput($_POST['Nationality']);
$Date_of_receipt_of_application = $util->testInput($_POST['Date_of_receipt_of_application']);
$Date_of_registration = $util->testInput($_POST['Date_of_registration']);
$st_expiray_date = $util->testInput($_POST['st_expiray_date']);
$Application_date = $util->testInput($_POST['Application_date']);
$Renewal_date = $util->testInput($_POST['Renewal_date']);
$Application_date_second = $util->testInput($_POST['Application_date_second']);
$Renewal_date_second = $util->testInput($_POST['Renewal_date_second']);
$Certificate_Validity_Date = $util->testInput($_POST['Certificate_Validity_Date']);
$Application_date_pharmacy = $util->testInput($_POST['Application_date_pharmacy']);
$Issuance_date_pharmacy = $util->testInput($_POST['Issuance_date_pharmacy']);
$Remarks = $util->testInput($_POST['Remarks']);
$Status_show = $util->testInput($_POST['Status_show']);

if ($db->insert($Name, $Gender, $CP_category, $CP_Registration_No, 
$CID_No, $CP_type, $Contact_No, $email_address, $Firm_Name, $Firm_Location, $Previous_Firm_name,
$Dzongkhag, $Application_Number, $BMHC_Certificate_No, $Qualification, $Nationality, $Date_of_receipt_of_application, $Date_of_registration,
$st_expiray_date, $Application_date, $Renewal_date, $Application_date_second, $Renewal_date_second, $Certificate_Validity_Date, $Application_date_pharmacy,
$Issuance_date_pharmacy, $Remarks, $Status_show)){
    
    echo "<script>Swal.fire(
        'New Competent person record successfully!',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = './home.php';
      });
      </script>";
}else{
    echo "<script>Swal.fire(
        'Warning there are some problems',
        'Please, click button to back to home page!',
      );
    </>";
}
?>

</body>
</html>
