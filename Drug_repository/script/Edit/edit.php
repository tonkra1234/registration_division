<?php
$year = date("Y");
require '../../include/connection.php';
require '../../include/header.php';

$Certificate_Number = (isset($_GET['Certificate_Number']))?$_GET['Certificate_Number']:'';
$typeofcer= (isset($_GET['typeofcer']))?$_GET['typeofcer']:'';

$sql = "SELECT * FROM drug_record WHERE Certificate_Number='$Certificate_Number'";
$result = mysqli_query ($conn, $sql);
$data = $result->fetch_assoc();

$Therapeutic = mysqli_query($conn,"SELECT * FROM `therapeutic_category` ");

if (isset($_POST['submit'])) 
{
    require './session_post.php';
    require '../../database/Edit.php';
}

?>

<div class="container my-5">
    <div class="d-flex mt-lg-4 mb-lg-3">
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
            <a href="../list_of_drug/valid.php" class="link-secondary">
            Valid
        </a>
        <?php elseif($typeofcer==='expire'):?>
            <a href="../list_of_drug/expire.php" class="link-secondary">
            Expiry
        </a>
        <?php endif ?>
        <div class="mx-1">
            /
        </div>
        <a href="../list_of_drug/detail.php?Certificate_Number=<?php echo $data["Certificate_Number"]; ?>&typeofcer=<?php echo $typeofcer; ?>" class="link-secondary">
            Detail
        </a>
        <div class="mx-1">
            /
        </div>
        <p class="text-dark fw-bold">
            <?php echo $Certificate_Number;?>
        </p>
    </div>
    <div class="card shadow">
        <div class="card-header" style="background-color:#D35400  ;">
            <h2 class="text-center text-white">Update the data</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <!-- First line -->
                    <div class="col-md-4 mb-4">
                        <label>Registration Type</label></br>
                        <select class="form-select" id="Registration_Type" name="Registration_Type" required>
                            <option value="<?php echo $data['Registration_Type'];?>">
                                <?php echo $data['Registration_Type'];?></option>
                            <option value="Full Registration">Full Registration</option>
                            <option value="Expedited Registration">Expedited Registration</option>
                            <option value="Abridged Registration">Abridged Registration</option>
                            <option value="Company Registration">Company Registration</option>
                            <option value="Renewed Registration">Renewed Registration</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label>Application Type</label></br>

                        <select class="form-select" id="Atype" name="Application_Type" required>
                            <option value="<?php echo $data['Application_Type'];?>">
                                <?php echo $data['Application_Type'];?></option>
                            <option value="Generic Drug application">Generic Drug application</option>
                            <option value="New Drug application">New Drug application</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label>This product is intended for</label></br>
                        <select class="form-select" id="Intention" name="Intention" required>
                            <option value="<?php echo $data['Intention'];?>"><?php echo $data['Intention'];?></option>
                            <option value="Veterinary Use">Veterinary Use</option>
                            <option value="Human Use">Human Use</option>
                        </select>
                    </div>

                    <!-- Second line -->
                    <div class="col-md-4">
                        <label>Category of Medical Product</label></br>

                        <select class="form-select" id="CategoryOfMedical" name="Category_of_Medical_Product" required>
                            <option value="<?php echo $data['Category_of_Medical_Product'];?>">
                                <?php echo $data['Category_of_Medical_Product'];?></option>
                            <option value="Human Allopathic Medicine">Human Allopathic Medicine</option>
                            <option value="Veterinary Allopathic Medicine">Veterinary Allopathic Medicine</option>
                            <option value="Herbal Medicine">Herbal Medicine</option>
                            <option value="Traditional Medicine">Traditional Medicine</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label> Dossage Form</label></br>
                        <input type="text" name="Dosage_Form" id="Dosage_Form" class="form-control"
                            placeholder="Type to enter" value="<?php echo $data['Dosage_Form'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Pack Size</label></br>
                        <input type="text" name="Pack_Size" id="Pack_Size" class="form-control"
                            value="<?php echo $data['Pack_Size'];?>"></br>
                    </div>

                    <!-- Third line -->
                    <div class="col-md-4">
                        <label>Brand Name</label></br>
                        <input type="text" name="Brand_Name" id="Brand_Name" class="form-control"
                            value="<?php echo $data['Brand_Name'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Type of Packaging</label></br>
                        <input type="text" name="Type_of_Packaging" id="Type_of_Packaging" class="form-control"
                            value="<?php echo $data['Type_of_Packaging'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Therapeutic Category</label></br>
                        <input type="text" name="Therapeutic_Category" id="Therapeutic_Category" class="form-control"
                            placeholder="Type to enter" list="TC"
                            value="<?php echo $data['Therapeutic_Category'];?>"></br>
                        <!-- List for helping -->
                        <datalist id="TC">
                            <?php while($Therapeutic_cat = mysqli_fetch_array($Therapeutic)) {?>
                            <option value="<?php echo $Therapeutic_cat['Therapeutic_category'];?>">
                                <?php echo $Therapeutic_cat['Therapeutic_category'];?></option>
                            <?php } ?>
                        </datalist>
                    </div>

                    <!-- Fourth line -->
                    <div class="col-md-4">
                        <label>Certificate Number</label></br>
                        <input type="text" name="Certificate_Number_input" id="Certificate_Number_input"
                            class="form-control" value="<?php echo $data['Certificate_Number'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Issue Date</label></br>
                        <input type="date" name="Issue_Date" id="Issue_Date" class="form-control"
                            value="<?php echo $data['Issue_Date'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Expiry Date</label></br>
                        <input type="date" name="Expiry_Date" id="Expiry_Date" class="form-control"
                            value="<?php echo $data['Expiry_Date'];?>"></br>
                    </div>

                    <!-- Fifth line -->
                    <div class="col-md-4">
                        <label>Market Authorisation Holder</label></br>
                        <input type="text" name="Market_Authorisation_Holder" id="Market_Authorisation_Holder"
                            class="form-control" value="<?php echo $data['Market_Authorisation_Holder'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Generic Name</label></br>
                        <input type="text" name="Generic_Name" id="name" class="form-control"
                            value="<?php echo $data['Generic_Name'];?>"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Essential/Non-essential</label></br>
                        <select class="form-select" id="Essential" name="Essential">
                            <option value="<?php echo $data['Essential'];?>"><?php echo $data['Essential'];?></option>
                            <option value="Essential">Essential</option>
                            <option value="Non-essential">Non-essential</option>
                        </select>
                    </div>

                    <!-- Sixth line -->
                    <div class="col-md-4">
                        <label>Manufacturer</label></br>
                        <input type="text" name="Manufacturer" id="Manufacturer" class="form-control"
                            value="<?php echo $data['Manufacturer'];?>"></br>
                    </div>
                    <div class="col-md-3">
                        <label>Marketer</label></br>
                        <input type="text" name="Marketer" id="Marketer" class="form-control"
                            value="<?php echo $data['Marketer'];?>"></br>
                    </div>
                    <div class="col-md-2">
                        <label>Country of Manufacturer</label></br>
                        <select class="form-select" id="Country_of_Manufacturer" name="Country_of_Manufacturer">
                            <option value="<?php echo $data['Country_of_Manufacturer'];?>">
                                <?php echo $data['Country_of_Manufacturer'];?></option>
                            <?php require '../create/country_select.php';?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Price</label>
                        <div class="input-group">
                            <input type="text" name="Price_per_unit" id="Price_per_unit" class="form-control"
                                value="<?php echo $data['Price_per_unit'];?>"></br>
                        </div>
                    </div>

                    <!-- Seventh line -->
                    <div class="col-md-12 mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    Composition of active ingredients with strengths
                                </label>
                            </div>
                        </div>

                        </br>

                        <textarea class="form-control" id="Composition" rows="3"
                            name="Composition"><?php echo $data['Composition'];?></textarea>
                    </div>

                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-warning" type="submit" value="Update" name="submit">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>
<?php
require '../../include/footer.php';
?>