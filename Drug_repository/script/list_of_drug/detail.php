<?php
$year = date("Y"); 
require '../../include/connection.php';
require '../../include/header.php';

$Certificate_Number= (isset($_GET['Certificate_Number']))?$_GET['Certificate_Number']:'';
$typeofcer = (isset($_GET['typeofcer']))?$_GET['typeofcer']:'';

$sql = "SELECT * FROM drug_record WHERE Certificate_Number='$Certificate_Number'";
$result = mysqli_query ($conn, $sql);
$data = $result->fetch_assoc();
?>
<style>
    th {
        border-right: 1px solid;
    }
</style>
<div class="d-flex ms-lg-5 mt-lg-5">
    <a href="../../../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <a href="../home/home.php" class="link-secondary">
        Drug repository
    </a>
    <div class="mx-1">
        /
    </div>
    <?php if($typeofcer==='valid'):?>
    <a href="./valid.php" class="link-secondary">
        Valid
    </a>
    <?php elseif($typeofcer==='expire'):?>
    <a href="./expire.php" class="link-secondary">
        Expiry
    </a>
    <?php endif ?>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        details of <?php echo $data['Certificate_Number']?>
    </p>
</div>

<div class="card text-center mx-lg-5 my-lg-5 mt-lg-3">

    <div class="card-header" style="background-color:#31968B ;">
        <span class="fs-4 fw-bold text-white">Drug details</span>
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
                <a
                    href="../Edit/edit.php?Certificate_Number=<?php echo $data["Certificate_Number"]; ?>&typeofcer=<?php echo $typeofcer;?>"><button
                        class="btn btn-warning w-100"><i class="fa fa-eye"></i> Edit</button></a>
            </div>
            <div class="col-md-6 col-12 d-grid gap-2 ">
                <button type="button" class="delete_button btn btn-danger w-100 " value="<?php echo $data["Number"]; ?>"><i class="fa-solid fa-x"></i> Delete</button>
            </div>
        </div>
    </div>

</div>

<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var drugId = $(this).val();
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#BD9802',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../../database/Delete.php",
                    data: {
                        'drugdelete': "delete",
                        'drugId': drugId,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been delete.',
                    'success'
                ).then(function(){
                    window.location ="../home/home.php";
                });
            }
        })

    });
</script>

<?php
require '../../include/footer.php';
?>