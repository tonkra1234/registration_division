<?php
include './db.php';

$db = new DataBase();

$competentPersonId = $_POST['competentPersonId'];

if($db->move_competent_person($competentPersonId)){
    $db->delete_competent_person($competentPersonId);
}
?>