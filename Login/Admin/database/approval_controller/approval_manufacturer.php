<?php
include '../db_manufacturer.php';

$manufacturerId = $_POST['manufacturerId'];
$db = new Manufacturer();

$Name_Manufacturer = $_POST['Name_Manufacturer'];
$Proprietor = $_POST['Proprietor'];
$Key_person = $_POST['Key_person'];
$Category = $_POST['Category'];
$Location = $_POST['Location'];
$Email = $_POST['Email'];
$Dzongkhag = $_POST['Dzongkhag'];
$image_link = $_POST['image_link'];

if ($db->approval_manufacturer($Name_Manufacturer,$Proprietor , $Key_person, $Category, $Location, $Email, $Dzongkhag, $image_link)) {
    $db->reject_manufacturer($manufacturerId);
}



?>