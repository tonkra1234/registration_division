<?php
require '../../include/connection.php';

$today = date("j-M-Y");

$id= (isset($_GET['id']))?$_GET['id']:'';

$sql = "SELECT * FROM drug_record WHERE Number=$id";
$result = mysqli_query ($conn, $sql);
$data = $result->fetch_assoc();

$date=date_create($data['Expiry_Date']);
$expire = date_format($date,"j-M-Y");

$date_issue=date_create($data['Issue_Date']);
$issue = date_format($date_issue,"j-M-Y");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    
    <style>
        table.two {
            border-collapse: collapse;
            width: auto;
            table-layout: fixed;
        }
        table.one {
            border-collapse: collapse;
            width: auto;
            table-layout: fixed;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px 5px;
        }
        .container{
            padding: 15px;
            margin-right: 50px;
            border: 1px;
            height: 98%;
            width: 690px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: black;
            text-align: right;
        }
        
    </style>
</head>

<body >
    <div class="container">
        <img style="margin-left:30px;" src="../../public/image/head.png" alt="" width="650">
        <h3 style="text-align: center;margin-bottom:0px;font-family: bookantiquebold;">CERTIFICATE OF REGISTRATION OF MEDICINAL PRODUCT (S)</h3>
        <p style="font-family: bookantique;">Registration No.: <span style="font-family: bookantiquebold;"><?php echo $data['Certificate_Number'];?></span></p>
        <p style="margin-bottom:0 ;font-family: bookantique;">The following medicinal product (s) is/are registered for sale/distribution in Bhutan under the provisions
            of
            the Medicines Act of the Kingdom of Bhutan 2003.</p>
        <p style="font-family: bookantique;">This registration is valid up to <span style="font-weight: bold;font-family: bookantiquebold;"><?php echo $expire;?></span> (three years from the date of issue) unless it is earlier
            canceled
            or suspended or revoked.</p>
        <table class="one">
            <tr>
                <th style="width:25% ;font-family: bookantiquebold;" rowspan="3">Name of the Product</th>
                <th style="width:37.5%;font-family: bookantiquebold;">Generic Name</th>
                <th style="width:37.5%;font-family: bookantiquebold;">Trade name</th>
            </tr>
            <tr>
                <td rowspan="2" style="width:37.5%;font-family: bookantique;"><?php echo $data['Generic_Name'];?></td>
                <td style="font-family: bookantique;"><?php echo $data['Brand_Name'];?></td>
            </tr>
        
        </table>
        <table class="two">
            <tr>
                <th style="width:25%;margin:0 0 200px 0;font-family: bookantiquebold;" rowspan="3">Strength with Composition</th>
                <td style="width:37.5%; margin:0 0 200px 0;font-family: bookantique;" rowspan="3"><?php echo explode(":",$data['Composition'])[0];?>:<br><br>&nbsp;&nbsp;&nbsp;<?php echo explode(":",$data['Composition'])[1];?></td>
                <th style="width:17%; padding:20px 0;text-align: center;font-family: bookantiquebold;">Dosage Form</th>
                <td style="width:20.5%;font-family: bookantique;"><?php echo $data['Dosage_Form'];?></td>
            </tr>
            <tr>
                <th style="padding:20px 0;text-align: center;font-family: bookantiquebold;">Pack Size</th>
                <td style="width:20.5%;font-family: bookantique;"><?php echo $data['Pack_Size'];?></td>
            </tr>
            <tr>
                <th style="padding:20px 0;text-align: center;font-family: bookantiquebold;">Type of package</th>
                <td style="width:20.5%;font-family: bookantique;"><?php echo $data['Type_of_Packaging'];?></td>
            </tr>
            <tr>
                <th style="font-family: bookantiquebold;">Therapeutic Category</th>
                <td colspan="3" style="font-family: bookantique;"><?php echo $data['Therapeutic_Category'];?></td>
            </tr>
        </table>
        <p style="margin-bottom:0 ;font-family: bookantique;">Market Authorization Holder: <span style="font-family: bookantiquebold;"><?php echo $data['Market_Authorisation_Holder'];?></span></p>
        <p style="margin-bottom:0 ;font-family: bookantique;">Manufacturer: <span style="font-family: bookantiquebold;"><?php echo $data['Manufacturer'];?></span></p>
        <p style="margin-bottom:5px ;font-family: bookantique;">Marketed by: <span style="font-family: bookantiquebold;"><?php echo $data['Marketer'];?></span></p>
        <h5 style="margin-bottom:0 ;font-family: bookantiquebold;">Conditions:</h5>
        <p style="margin-bottom:0 ;font-family: bookantique;">1. The Market Authorization shall abide by the duties and principles as specified under the Rules and
            Regulation.</p>
        <p style="margin-bottom:0 ;font-family: bookantique;">2. The Market Authorization Holder shall be responsible for timely removal in case of confirmed defective
            medicinal products from the market.</p>
        <h5 style="margin-bottom:0px ;font-family: bookantiquebold;">Registration Date: <span><?php echo $issue;?></span></h5>
        <h5 style="font-family: bookantiquebold;">Printed Date : <span><?php echo $today;?></span></h5>
        <div class="footer" style="padding-right: 40px;margin-top:45px;font-family: bookantiquebold;">
            <h5>Drug controller</h5>
        </div>
    
    </div>

</body>

</html>