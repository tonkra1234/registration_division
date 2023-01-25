<?php

$sql1 = "SELECT Market_Authorisation_Holder from drug_record group by Market_Authorisation_Holder;";
$unique_market = mysqli_query ($conn, $sql1);

$sql2 = "SELECT Country_of_Manufacturer from drug_record group by Country_of_Manufacturer;";
$unique_country = mysqli_query ($conn, $sql2);

?>