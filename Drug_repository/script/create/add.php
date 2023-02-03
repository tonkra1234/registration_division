<?php
$year = date("y"); 
require '../../include/connection.php';
require '../../include/header.php';

$Therapeutic = mysqli_query($conn,"SELECT * FROM `therapeutic_category` ");

if (isset($_POST['submit'])) 
{
    require './session_post.php';
    require '../../database/Add.php';

}

?>
<div class="container my-5">
<div class="d-flex mt-4">
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
        <p class="text-dark fw-bold">
            Add page
        </p>
    </div>
    <div class="card shadow">
        <div class="card-header" style="background-color:#27AE60 ;">
            <h2 class="text-center text-white">Add new drug into inventory</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <!-- First line -->
                    <div class="col-md-4 mb-4">
                        <label>Registration Type</label></br>

                        <select class="form-select" id="Registration_Type" name="Registration_Type"
                            onchange="RtypeSelect();">
                            <option value="Full Registration">Full Registration</option>
                            <option value="Expedited Registration">Expedited Registration</option>
                            <option value="Abridged Registration">Abridged Registration</option>
                            <option value="Company Registration">Company Registration</option>
                            <option value="Renewed Registration">Renewed Registration</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label>Application Type</label></br>

                        <select class="form-select" id="Atype" name="Application_Type">
                            <option value="Generic Drug application">Generic Drug application</option>
                            <option value="New Drug application">New Drug application</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label>This product is intended for</label></br>

                        <select class="form-select" id="Intention" name="Intention" onchange="RtypeSelect();">
                            <option value="Veterinary Use">Veterinary Use</option>
                            <option value="Human Use">Human Use</option>
                        </select>
                    </div>

                    <!-- Second line -->
                    <div class="col-md-4">
                        <label>Category of Medical Product</label></br>

                        <select class="form-select" id="CategoryOfMedical" name="Category_of_Medical_Product">
                            <option value="Human Allopathic Medicine">Human Allopathic Medicine</option>
                            <option value="Veterinary Allopathic Medicine">Veterinary Allopathic Medicine</option>
                            <option value="Herbal Medicine">Herbal Medicine</option>
                            <option value="Traditional Medicine">Traditional Medicine</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label> Dossage Form</label></br>
                        <input type="text" name="Dosage_Form" id="Dosage_Form" class="form-control"
                            placeholder="Type to enter"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Pack Size</label></br>
                        <input type="text" name="Pack_Size" id="Pack_Size" class="form-control"></br>
                    </div>

                    <!-- Third line -->
                    <div class="col-md-4">
                        <label>Brand Name</label></br>
                        <input type="text" name="Brand_Name" id="Brand_Name" class="form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Type of Packaging</label></br>
                        <input type="text" name="Type_of_Packaging" id="Type_of_Packaging" class="form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Therapeutic Category</label></br>
                        <input type="text" name="Therapeutic_Category" id="Therapeutic_Category" class="form-control"
                            placeholder="Type to enter" list="TC"></br>
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
                        <input type="text" name="Certificate_Number" id="Certificate_Number" class="form-control"
                            value="BHU-DRA/<?php echo $year;?>/"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Issue Date</label></br>
                        <input type="date" name="Issue_Date" id="Issue_Date" class="form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Expiry Date</label></br>
                        <input type="date" name="Expiry_Date" id="Expiry_Date" class="form-control"></br>
                    </div>

                    <!-- Fifth line -->
                    <div class="col-md-4">
                        <label>Market Authorisation Holder</label></br>
                        <input type="text" name="Market_Authorisation_Holder" id="Market_Authorisation_Holder"
                            class="form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Generic Name</label></br>
                        <input type="text" name="Generic_Name" id="Generic_Name" class="form-control"></br>
                    </div>
                    <div class="col-md-4">
                        <label>Essential/Non-essential</label></br>
                        <select class="form-select" id="Essential" name="Essential">
                            <option value="Essential">Essential</option>
                            <option value="Non-essential">Non-essential</option>
                        </select>
                    </div>

                    <!-- Sixth line -->
                    <div class="col-md-4">
                        <label>Manufacturer</label></br>
                        <input type="text" name="Manufacturer" id="Manufacturer" class="form-control"></br>
                    </div>
                    <div class="col-md-3">
                        <label>Marketer</label></br>
                        <input type="text" name="Marketer" id="Marketer" class="form-control"></br>
                    </div>
                    <div class="col-md-2">
                        <label>Country of Manufacturer</label></br>
                        <select class="form-select" id="Country_of_Manufacturer" name="Country_of_Manufacturer">
                            <?php require './country_select.php';?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Price</label>
                        <div class="input-group">
                            <select class="form-select" id="Currency" name="Currency">
                                <option value="Nu">Nu</option>
                                <option value="INR">INR</option>
                                <option value="USD">USD</option>
                            </select>
                            <input type="number" name="Price" id="Price" min="0" class="form-control" step="0.1">
                            <span class="input-group-text" id="PER">PER</span>
                            <input type="text" name="Unit" id="Unit" class="form-control">
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

                        <textarea class="form-control" id="Composition" rows="3" name="Composition"></textarea>
                    </div>

                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" value="Create" name="submit">Save</button>
                </div>

            </form>
        </div>
    </div>

</div>
<script>
    function RtypeSelect() {
        var val = document.getElementById("Registration_Type").value;
        if (val == "Full Registration") {
            if (document.getElementById("Intention").value == "Veterinary") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/V{{$full}}";
            } else if (document.getElementById("Intention").value == "Human") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/H{{$full}}";
            }
        } else if (val == "Expedited Registration") {
            if (document.getElementById("Intention").value == "Veterinary") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/ER/V{{$ex}}";
            } else if (document.getElementById("Intention").value == "Human") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/ER/H{{$ex}}";
            }
        } else if (val == "Abridged Registration") {
            if (document.getElementById("Intention").value == "Veterinary") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/AR/V{{$ab}}";
            } else if (document.getElementById("Intention").value == "Human") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/AR/H{{$ab}}";
            }
        } else if (val == "Company Registration") {
            if (document.getElementById("Intention").value == "Veterinary") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/CR/V{{$cr}}";
            } else if (document.getElementById("Intention").value == "Human") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/CR/H{{$cr}}";
            }
        } else {
            if (document.getElementById("Intention").value == "Veterinary") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/RN/V{{$rn}}";
            } else if (document.getElementById("Intention").value == "Human") {
                document.getElementById("Certificate_Number").value = "BHU-DRA/<?php echo $year;?>/RN/H{{$rn}}";
            }
        }

    }
</script>




<?php
require '../../include/footer.php';
?>