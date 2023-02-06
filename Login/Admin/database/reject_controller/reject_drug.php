<?php
include '../db_drug_repository.php';

$drugId = $_POST['drugId'];
$db = new Drug();

$db->reject_drug($drugId);

?>