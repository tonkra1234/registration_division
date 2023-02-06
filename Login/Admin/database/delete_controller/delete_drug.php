<?php
include '../db_drug_repository.php';

$drugId = $_POST['drugId'];
$drugdelete = $_POST['drugdelete'];
$db = new Drug();

if ($drugdelete === 'delete') {
    $db->delete_drug($drugId);
}
elseif($drugdelete === 'retrieve'){
    $db->retrieve_drug($drugId);
    $db->delete_drug($drugId);
}

?>