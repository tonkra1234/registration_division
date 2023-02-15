<?php

include '../../include/connection.php';

$sql = "INSERT INTO drug_record (Essential, Schedule, Registration_Type, Application_Type, 
Market_Authorisation_Holder, Category_of_Medical_Product, Intention, Generic_Name, Brand_Name, 
Dosage_Form, Pack_Size,Type_of_Packaging,Composition, Manufacturer, Marketer, Country_of_Manufacturer, 
Therapeutic_Category, Certificate_Number, Issue_Date, Expiry_Date, Price_per_unit)
VALUES ('$Essential', '', '$Registration_Type', '$Application_Type','$Market_Authorisation_Holder', 
'$Category_of_Medical_Product','$Intention','$Generic_Name','$Brand_Name', '$Dosage_Form','$Pack_Size',
'$Type_of_Packaging', '$Composition', '$Manufacturer', '$Marketer','$Country_of_Manufacturer', 
'$Therapeutic_Category','$Certificate_Number','$Issue_Date','$Expiry_Date','$Price_per_unit')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    Swal.fire(
        'New record created successfully!',
        'Please, click button to continue!',
        'success'
    ).then(function() {
        window.location = '../home/home.php';
    });
    </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>