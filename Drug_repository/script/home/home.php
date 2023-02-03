<?php
require '../../include/connection.php';

require './select_filter.php';

$search_key = (isset($_GET['search']))?$_GET['search']:'';

// variable to store number of rows per page
$total_records_per_page = 15;   

// update the active page number
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

// get the initial page number
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


require '../../include/header.php';
?>

<div class="container my-5" style="min-height: 90vh;">
    <div class="d-flex mt-4">
        <a href="../../../main.php" class="link-secondary">
            Main menu
        </a>
        <div class="mx-1">
            /
        </div>
        <p class="text-dark fw-bold">
            Drug repository
        </p>
    </div>
    <div class="rounded p-3 mb-5" style="background-color:#2980B9 ;">
        <div class="d-flex align-items-center justify-content-center ms-3">
            <span class="text-light fs-2 fw-bold">Total of registration drugs</span>
        </div>
    </div>
    <div class="card p-3 py-4 mb-3">
        <h3 class="px-2">Filter</h3>
        <form action="" method="GET" accept-charset="utf-8">
            <div class="row g-3 mt-2">
                <form action="" method="GET">
                    <div class="col-sm-8 col-12">
                    <input class="border w-100 form-control" type="search" name="search" placeholder="Search" aria-label="Search" required value="<?php echo $search_key; ?>">
                    </div>
                    <div class="col-sm-2 col-12 d-grid">
                        <button class="btn btn-secondary btn-block" type="submit"
                            style="background-color: #31968B ;">Search Results</button>
                    </div>
                    <div class="col-sm-2 col-12 d-grid">
                        <a class="btn btn-danger px-5 ms-1" role="button" href="./home.php?search=">Clear all</a>
                    </div>
                </form>
            </div>
            <div class="mt-3">
                <a class="btn btn-secondary dropdown-toggle mb-2" data-bs-toggle="collapse" href="#collapseExample"
                    role="button" aria-expanded="false" aria-controls="collapseExample"
                    style="background-color: #31968B ;">
                    Advance Search With Filters
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="mb-1">
                                    <label for="startingDate">Start date</label>
                                    <input placeholder="Selected starting date" type="date" id="startingDate"
                                        name="startingDate" class="form-control" onchange=" filter()">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="mb-1">
                                    <label for="endingDate">End date</label>
                                    <input placeholder="Selected ending date" type="date" id="endingDate"
                                        name="endingDate" class="form-control" onchange=" filter()">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <select class="form-select w-100" aria-label="Default select example" onchange=" filter()"
                                    name="Market_Authorisation_Holder" id="Market_Authorisation_Holder">
                                    <option value="" selected>Select Market Authorisation Holder</option>
                                    <?php
                                    while ($category = mysqli_fetch_array($unique_market,MYSQLI_ASSOC)):;
                                    ?>
                                    <option value="<?php echo $category["Market_Authorisation_Holder"]; ?>">
                                        <?php echo $category["Market_Authorisation_Holder"];?>
                                    </option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mt-2">
                                <select class="form-select w-100"
                                    aria-label="Default select example" name="Country_Market_holder" id="Country_Market_holder"
                                    value="" onchange=" filter()">
                                    <option value="" selected>Select country</option>
                                    <?php
                                    while ($category = mysqli_fetch_array($unique_country,MYSQLI_ASSOC)):;
                                    ?>
                                    <option value="<?php echo $category["Country_of_Manufacturer"]; ?>">
                                        <?php echo $category["Country_of_Manufacturer"];?>
                                    </option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-hover rounded-3 shadow table-striped">
        <thead class="table-success">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Certificate number</th>
                <th scope="col">Generic name</th>
                <th scope="col">Brand name</th>
                <th scope="col">Therapeutic category</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Market Authorization</th>
                <th scope="col">Expire date</th>
        </thead>
        <tbody id="MyTable">

        <?php
        if(empty($search_key)){
            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record`");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; 
            
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` LIMIT $offset, $total_records_per_page");
            
            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);

            while ($row = mysqli_fetch_array($result)){

            ?>

            <tr>
                <th scope="row"><?php echo $i ; ?></th>
                <td><?php echo $row["Certificate_Number"]; ?></td>
                <td><?php echo $row["Generic_Name"]; ?></td>
                <td><?php echo $row["Brand_Name"]; ?></td>
                <td><?php echo $row["Therapeutic_Category"]; ?></td>
                <td><?php echo $row["Manufacturer"]; ?></td>
                <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
                <td><?php 
                $Expiry_date=date_create($row["Expiry_Date"]); 
                echo date_format($Expiry_date,"Y-M-d");
                ?>
                </td>
            </tr>

            <?php
            $i++;
            }
        }else{
            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE CONCAT(Certificate_Number,Generic_Name,Brand_Name,Therapeutic_Category,Manufacturer,Market_Authorisation_Holder) LIKE '%$search_key%'");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; 
            
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE CONCAT(Certificate_Number,Generic_Name,Brand_Name,Therapeutic_Category,Manufacturer,Market_Authorisation_Holder) LIKE '%$search_key%' LIMIT $offset, $total_records_per_page");
            
            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
            if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)){

            ?>

            <tr>
                <th scope="row"><?php echo $i ; ?></th>
                <td><?php echo $row["Certificate_Number"]; ?></td>
                <td><?php echo $row["Generic_Name"]; ?></td>
                <td><?php echo $row["Brand_Name"]; ?></td>
                <td><?php echo $row["Therapeutic_Category"]; ?></td>
                <td><?php echo $row["Manufacturer"]; ?></td>
                <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
                <td><?php 
                $Expiry_date=date_create($row["Expiry_Date"]); 
                echo date_format($Expiry_date,"Y-M-d");
                ?>
                </td>
            </tr>

            <?php
            $i++;
            }
            }else {
            ?>
                <tr>
                    <td colspan="10" class="p-5 text-center fw-bold fs-3">No Record Found</td>
                </tr>
            <?php
            }
        }
    ?>

        </tbody>
    </table>
    <?php 
    
    include './pagination.php';

    ?>
</div>
<script>
    function filter() {
    
    var select_sdate = $("#startingDate").val();
    var select_edate = $("#endingDate").val();
    var select_market = $("#Market_Authorisation_Holder").val();
    var select_country = $("#Country_Market_holder").val();
   
    $.ajax({
            url: "./filter_home.php",
            method: "POST",
            data:{
                select_sdate:select_sdate,
                select_edate:select_edate,
                select_market:select_market,
                select_country:select_country, 
            },
            success: function(page){
                $('#MyTable').html(page);
            }
        })
    }

    $("#reset").click(function(){
        document.location.reload(true);
    });

</script>
<?php

require '../../include/footer.php';

?>