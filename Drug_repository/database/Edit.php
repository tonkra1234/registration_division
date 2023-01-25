<?php

include '../../include/connection.php';

$sql = " UPDATE drug_record SET Essential='$Essential', Schedule='', Registration_Type='$Registration_Type',
Application_Type='$Application_Type', Market_Authorisation_Holder='$Market_Authorisation_Holder', 
Category_of_Medical_Product='$Category_of_Medical_Product', Intention='$Intention', Generic_Name='$Generic_Name',
Brand_Name='$Brand_Name', Dosage_Form='$Dosage_Form', Pack_Size='$Pack_Size',Type_of_Packaging='$Type_of_Packaging',
Composition='$Composition', Manufacturer='$Manufacturer', Marketer='$Marketer', Country_of_Manufacturer='$Country_of_Manufacturer', 
Therapeutic_Category='$Therapeutic_Category', Certificate_Number='$Certificate_Number_input', Issue_Date='$Issue_Date', 
Expiry_Date='$Expiry_Date', Price_per_unit='$Price_per_unit' WHERE Certificate_Number='$Certificate_Number' ";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    swal(
        'Update successfully!',
        'Please, click button to continue!',
        'success'
    ).then(function() {
        window.location = '../list_of_drug/detail.php?Certificate_Number=$Certificate_Number&typeofcer=edit_back';
    });
    </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>