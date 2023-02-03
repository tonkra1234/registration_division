<?php
include '../db_competent_person.php';

$id = $_POST['cpId'];
$cpdelete = $_POST['cpdelete'];
$db = new CP();

if ($cpdelete === 'delete') {
    $db->delete_competent_person($id);
}
elseif($cpdelete === 'retrieve'){
    $db->retrieve_competent_person($id);
    $db->delete_competent_person($id);
}

?>