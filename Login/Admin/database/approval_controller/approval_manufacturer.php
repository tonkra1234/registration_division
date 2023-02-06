<?php
include '../db_manufacturer.php';
include '../../include/util.php';

$util = new Util();

$manufacturerId = $_POST['manufacturerId'];
$db = new Manufacturer();

$Name_Manufacturer = $util->testInput($_POST['Name_Manufacturer']);
$Proprietor = $util->testInput( $_POST['Proprietor']);
$Key_person = $util->testInput( $_POST['Key_person']);
$Category = $util->testInput( $_POST['Category']);
$Location = $util->testInput( $_POST['Location']);
$Email = $util->testInput( $_POST['Email']);
$Dzongkhag = $util->testInput( $_POST['Dzongkhag']);
$image_link = $util->testInput( $_POST['image_link']);

if ($db->approval_manufacturer($Name_Manufacturer,$Proprietor , $Key_person, $Category, $Location, $Email, $Dzongkhag, $image_link)) {
    $db->reject_manufacturer($manufacturerId);
}



?>