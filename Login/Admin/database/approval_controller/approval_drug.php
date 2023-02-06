<?php
include '../db_drug_repository.php';
include '../../include/util.php';

$db = new Drug();
$util = new Util();

$drugId = $_POST['drugId'];


$Essential = $util->testInput( $_POST['Essential']);
$Registration_Type = $util->testInput( $_POST['Registration_Type']);
$Application_Type = $util->testInput( $_POST['Application_Type']);
$Market_Authorisation_Holder= $util->testInput( $_POST['Market_Authorisation_Holder']);
$Category_of_Medical_Product = $util->testInput( $_POST['Category_of_Medical_Product']);
$Intention = $util->testInput( $_POST['Intention']);
$Generic_Name = $util->testInput( $_POST['Generic_Name']);
$Brand_Name = $util->testInput( $_POST['Brand_Name']);
$Dosage_Form = $util->testInput( $_POST['Dosage_Form']);
$Pack_Size = $util->testInput( $_POST['Pack_Size']);
$Type_of_Packaging = $util->testInput($_POST['Type_of_Packaging']);
$Composition = $util->testInput( $_POST['Composition']);
$Manufacturer =  $util->testInput( $_POST['Manufacturer']);
$Country_of_Manufacturer = $util->testInput( $_POST['Country_of_Manufacturer']);
$Therapeutic_Category = $util->testInput( $_POST['Therapeutic_Category']);
$Certificate_Number = $util->testInput( $_POST['Certificate_Number']);
$Issue_Date = $util->testInput( $_POST['Issue_Date']);
$Expiry_Date = $util->testInput( $_POST['Expiry_Date']);
$Price_per_unit = $util->testInput( $_POST['Price_per_unit']);
$Marketer = $util->testInput( $_POST['Marketer']);


if ($db->approval_drug($Essential,$Registration_Type, $Application_Type,$Market_Authorisation_Holder, 
$Category_of_Medical_Product,$Intention,$Generic_Name,$Brand_Name, $Dosage_Form,$Pack_Size,
$Type_of_Packaging, $Composition, $Manufacturer, $Marketer,$Country_of_Manufacturer, 
$Therapeutic_Category,$Certificate_Number,$Issue_Date,$Expiry_Date,$Price_per_unit)) {
    $db->reject_drug($drugId);
}



?>