<?php
include '../db_manufacturer.php';

$manufacturerId = $_POST['manufacturerId'];
$db = new Manufacturer();

$manufacturerdelete = $_POST['manufacturerdelete'];
$fileName = $_POST['fileName'];

$targetDir = "../../../../Manufacturer_list/upload_image/";

if ($manufacturerdelete === 'delete') {
    $db->delete_manufacturer($manufacturerId);
    if ($fileName !== null || $fileName !== '') {
    
        $deleteTargetPath = $targetDir . $fileName;
        try {
            unlink($deleteTargetPath); // delete old image
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
elseif($manufacturerdelete === 'retrieve'){
    $db->retrieve_manufacturer($manufacturerId);
    $db->delete_manufacturer($manufacturerId);
}


?>
