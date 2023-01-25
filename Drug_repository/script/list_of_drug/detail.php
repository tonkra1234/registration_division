<?php
$year = date("Y"); 
require '../../include/connection.php';
require '../../include/header.php';

$Certificate_Number= (isset($_GET['Certificate_Number']))?$_GET['Certificate_Number']:'';
$typeofcer= (isset($_GET['typeofcer']))?$_GET['typeofcer']:'';

$sql = "SELECT * FROM drug_record WHERE Certificate_Number='$Certificate_Number'";
$result = mysqli_query ($conn, $sql);
$data = $result->fetch_assoc();
?>
<style>
    th{
        border-right: 1px solid;
    }
</style>
<div class="ms-5 mt-5">
    <?php if($typeofcer === 'valid') :?>
        <a class="btn btn-warning fw-bold" href="../list_of_drug/valid.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>  Back to previous page</a>
    <?php elseif($typeofcer === 'expire') :?>
        <a class="btn btn-warning fw-bold" href="../list_of_drug/expire.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>  Back to previous page</a>
    <?php elseif($typeofcer === 'edit_back') :?>
        <a class="btn btn-warning fw-bold" href="../home/home.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>  Back to home page</a>
    <?php endif?>
</div>

<div class="card text-center m-5">

    <div class="card-header" style="background-color:#31968B ;">
        <span class="fs-4 fw-bold text-white" >Drug details</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-striped show-table">
                <tbody>
                    <tr>
                        <th scope="row">Certification number</th>
                        <td><?php echo $data['Certificate_Number']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Market Authorisation Holder</th>
                        <td><?php echo $data['Market_Authorisation_Holder']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Manufacturer</th>
                        <td><?php echo $data['Manufacturer']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Country of Manufacturer</th>
                        <td><?php echo $data['Country_of_Manufacturer']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Category of Medical Product</th>
                        <td><?php echo $data['Category_of_Medical_Product']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Intention</th>
                        <td><?php echo $data['Intention']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Marketer</th>
                        <td><?php echo $data['Marketer']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Generic Name</th>
                        <td><?php echo $data['Generic_Name']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Brand Name</th>
                        <td><?php echo $data['Brand_Name']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Registration Type</th>
                        <td><?php echo $data['Registration_Type']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Application Type</th>
                        <td><?php echo $data['Application_Type']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Therapeutic Category</th>
                        <td><?php echo $data['Therapeutic_Category']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Dosage Form</th>
                        <td><?php echo $data['Dosage_Form']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Pack Size</th>
                        <td><?php echo $data['Pack_Size']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Price per unit</th>
                        <td><?php echo $data['Price_per_unit']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Type of Packaging</th>
                        <td><?php echo $data['Type_of_Packaging']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Ingredients</th>
                        <td><?php echo $data['Composition']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Issue date</th>
                        <td><?php echo $data['Issue_Date']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Expire date</th>
                        <td><?php echo $data['Expiry_Date']?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">
        <div class="row">
            <div class="col-md-6 col-12 d-grid gap-2 ">
                <a href="../Edit/edit.php?Certificate_Number=<?php echo $data["Certificate_Number"]; ?>"><button class="btn btn-warning w-100"><i class="fa fa-eye"></i> Edit</button></a>
            </div>
            <div class="col-md-6 col-12 d-grid gap-2 ">
                <a href="#"><button class="btn btn-danger w-100 "><i class="fa-solid fa-x"></i> Delete</button></a>               
            </div>
        </div>
    </div>
    
</div>



<?php
require '../../include/footer.php';
?>