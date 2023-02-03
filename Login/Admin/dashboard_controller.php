<?php
require './database/db_users.php';
require './database/db_drug_repository.php';
require './database/db_competent_person.php';
require './database/db_manufacturer.php';

$db_users = new DataBase();
$results_users = $db_users->fetch_users();

$db_manufacturer = new Manufacturer();
$results_manufacturer = $db_manufacturer->count_manufacturer();

$db_competent_person = new CP();
$results_competent_person = $db_competent_person->count_competent_person();

$db_drugs = new Drug();
$results_drugs = $db_drugs->count_drug_repository();


?>