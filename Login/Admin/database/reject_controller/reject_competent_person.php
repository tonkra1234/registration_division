<?php
include '../db_competent_person.php';

$cpId = $_POST['cpId'];
$db = new CP();

$db->reject_competent_person($cpId);



?>