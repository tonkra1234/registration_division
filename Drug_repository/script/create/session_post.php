<?php
$Essential = $_POST['Essential'];
$_SESSION['Essential'] = $Essential;

$Registration_Type = $_POST['Registration_Type'];
$_SESSION['Registration_Type'] = $Registration_Type;

$Application_Type = $_POST['Application_Type'];
$_SESSION['Application_Type'] = $Application_Type;

$Market_Authorisation_Holder= $_POST['Market_Authorisation_Holder'];
$_SESSION['Market_Authorisation_Holder'] = $Market_Authorisation_Holder;

$Category_of_Medical_Product = $_POST['Category_of_Medical_Product'];
$_SESSION['Category_of_Medical_Product'] = $Category_of_Medical_Product;

$Intention = $_POST['Intention'];
$_SESSION['Intention'] = $Intention;

$Generic_Name = $_POST['Generic_Name'];
$_SESSION['Generic_Name'] = $Generic_Name;

$Brand_Name = $_POST['Brand_Name'];
$_SESSION['Brand_Name'] = $Brand_Name;

$Dosage_Form = $_POST['Dosage_Form'];
$_SESSION['Dosage_Form'] = $Dosage_Form;

$Pack_Size = $_POST['Pack_Size'];
$_SESSION['Pack_Size'] = $Pack_Size;

$Type_of_Packaging =$_POST['Type_of_Packaging'];
$_SESSION['Type_of_Packaging'] = $Type_of_Packaging;

$Composition = $_POST['Composition'];
$_SESSION['Composition'] = $Composition;

$Manufacturer = $_POST['Manufacturer'];
$_SESSION['Manufacturer'] = $Manufacturer;

$Country_of_Manufacturer = $_POST['Country_of_Manufacturer'];
$_SESSION['Country_of_Manufacturer'] = $Country_of_Manufacturer;

$Therapeutic_Category = $_POST['Therapeutic_Category'];
$_SESSION['Therapeutic_Category'] = $Therapeutic_Category;

$Certificate_Number = $_POST['Certificate_Number'];
$_SESSION['Certificate_Number'] = $Certificate_Number;

$Issue_Date = $_POST['Issue_Date'];
$_SESSION['Issue_Date'] = $Issue_Date;

$Expiry_Date = $_POST['Expiry_Date'];
$_SESSION['Expiry_Date'] = $Expiry_Date;

$Currency = $_POST['Currency'];
$_SESSION['Currency'] = $Currency;

$Price = $_POST['Price'];
$_SESSION['Price'] = $Price;

$Unit = $_POST['Unit'];
$_SESSION['Unit'] = $Unit;

$Price_per_unit = $Price." ".$Currency." per ".$Unit;

$Marketer = $_POST['Marketer'];
$_SESSION['Marketer'] = $Marketer;


?>