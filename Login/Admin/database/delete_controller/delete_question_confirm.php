<?php
include '../db_self_inspection.php';

$db = new SelfInspection();

$id = $_POST['inspectionId'];
$db->delete_question($id);
?>
