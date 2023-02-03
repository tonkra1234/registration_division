<?php
include './db.php';

$db = new DataBase();

$manufacturerId = $_POST['manufacturerId'];

if($db->move_manufacturer($manufacturerId)){
    $db->delete_manufacturer($manufacturerId);
}
?>