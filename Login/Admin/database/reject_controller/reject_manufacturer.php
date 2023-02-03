<?php
include '../db_manufacturer.php';

$manufacturerId = $_POST['manufacturerId'];
$db = new Manufacturer();

$fileName = $_POST['image_link'];

$targetDir = "../../../../Manufacturer_list/upload_image/";



if ($fileName !== null || $fileName !== '') {
    
    $deleteTargetPath = $targetDir . $fileName;
    try {
        unlink($deleteTargetPath); // delete old image
        $db->reject_manufacturer($manufacturerId);
    }
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}


?>