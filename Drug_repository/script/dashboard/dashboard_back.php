<?php

// Chart of country
$sum_country = "SELECT Country_of_Manufacturer as country, COUNT(Number) as sum from drug_record group by Country_of_Manufacturer";
$country = mysqli_query ($conn, $sum_country );

$country_sum =[];
$country_title =[];

while($number_counter = mysqli_fetch_array($country)){
    array_push($country_sum,$number_counter['sum']);
    array_push($country_title,$number_counter['country']);
}

// Nearly expired drugs

$today = date('Y-m-d');
$next_period = date('Y-m-d', strtotime($today.'+3 months'));

$expired_drugs = "SELECT count(*) as expired from drug_record WHERE Expiry_Date BETWEEN '$today' AND '$next_period' ";
$sum_expired_drug = mysqli_query ($conn, $expired_drugs);
$expired = $sum_expired_drug -> fetch_assoc();

// Essential and Non-essential drugs

$essential_drugs = "SELECT count(*) as sum_ess from drug_record WHERE Essential = 'Essential Medicine' ";
$essential_drug = mysqli_query ($conn, $essential_drugs);
$essential = $essential_drug -> fetch_assoc();

$non_essential_drugs = "SELECT count(*) as sum_non_ess from drug_record WHERE Essential = 'Non Essential Medicine' ";
$non_essential_drug = mysqli_query ($conn, $non_essential_drugs);
$non_essential = $non_essential_drug -> fetch_assoc();

$total_ess = $essential['sum_ess']+$non_essential['sum_non_ess'];

$percent_ess = ($essential['sum_ess'] *100)/$total_ess ;
$percent_non_ess = ($non_essential['sum_non_ess'] *100)/$total_ess ;

// Intention 

$Intention_human_sql = "SELECT count(*) as intention_human from drug_record WHERE Intention = 'Human Use' ";
$Intention_result_human = mysqli_query ($conn, $Intention_human_sql);
$Intention_human = $Intention_result_human -> fetch_assoc();

$Intention_veterinary_sql = "SELECT count(*) as intention_veterinary from drug_record WHERE Intention = 'Veterinary Use' ";
$Intention_result_veterinary = mysqli_query ($conn, $Intention_veterinary_sql);
$Intention_veterinary = $Intention_result_veterinary -> fetch_assoc();

// registrated drugs
$annual_sql = "SELECT date_format(Issue_Date,'%Y') as Year, COUNT(Number) as sum from drug_record group by year(Issue_Date) order by year(Issue_Date)";
$result_annual = mysqli_query ($conn, $annual_sql);

$annual_sum =[];
$annual_title =[];

while($annual_array = mysqli_fetch_array($result_annual)){
    array_push($annual_sum,$annual_array['sum']);
    array_push($annual_title,$annual_array['Year']);
}

$annual_sql_human = "SELECT date_format(Issue_Date,'%Y') as Year, COUNT(Number) as sum from drug_record where Intention = 'Human Use' group by year(Issue_Date) order by year(Issue_Date)";
$result_annual_human = mysqli_query ($conn, $annual_sql_human);

$annual_sum_human =[];
$annual_title_human =[];

while($annual_array_human = mysqli_fetch_array($result_annual_human)){
    array_push($annual_sum_human,$annual_array_human['sum']);
    array_push($annual_title_human,$annual_array_human['Year']);
}

$annual_sql_veterinary = "SELECT date_format(Issue_Date,'%Y') as Year, COUNT(Number) as sum from drug_record where Intention = 'Veterinary Use' group by year(Issue_Date) order by year(Issue_Date)";
$result_annual_veterinary = mysqli_query ($conn, $annual_sql_veterinary);

$annual_sum_veterinary =[];
$annual_title_veterinary =[];

while($annual_array_veterinary = mysqli_fetch_array($result_annual_veterinary)){
    array_push($annual_sum_veterinary,$annual_array_veterinary['sum']);
    array_push($annual_title_veterinary,$annual_array_veterinary['Year']);
}




?>