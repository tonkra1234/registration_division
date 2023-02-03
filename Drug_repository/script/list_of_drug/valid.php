<?php
$today = date("Y-m-d");
require '../../include/connection.php';
require '../../include/header.php';

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



?>

<div class="container my-5" style="min-height: 90vh;">
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
            Valid drugs
        </p>
    </div>
    <div class="rounded p-3 mb-5" style="background-color:#27AE60  ;">
        <div class="d-flex align-items-center justify-content-center ms-3">
            <span class="text-light fs-2 fw-bold">Total of valid drugs</span>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="d-flex" method="GET" action="">
                <input class="border w-100" type="search" name="search" placeholder="Search" aria-label="Search" required value="<?php echo $search_key; ?>">
                <button class="btn btn-primary px-5 ms-1" type="submit">Search </button>
                <a class="btn btn-danger px-5 ms-1" role="button" href="./valid.php?search=">Clear</a>
            </form>
        </div>
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
                <th scope="col">Detail</th>
                <th scope="col">Certification</th>
            </tr>
        </thead>
        <tbody>

        <?php
        if(empty($search_key)){
            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date <= '$today'");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; 
            
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >= '$today' LIMIT $offset, $total_records_per_page");
            
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
                <td><a href="./detail.php?Certificate_Number=<?php echo $row["Certificate_Number"]; ?>&typeofcer=valid"
                        class="btn btn-info">More</a></td>
                <td><a href="../PDF/htmlToPdf.php?id=<?php echo $row["Number"]; ?>" class="btn btn-primary" target="_blank">Click</a>
                </td>
            </tr>

            <?php
            $i++;
            }
        }else{
            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date <= '$today' AND CONCAT(Certificate_Number,Generic_Name,Brand_Name,Therapeutic_Category,Manufacturer,Market_Authorisation_Holder) LIKE '%$search_key%'");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; 
            
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >= '$today' AND CONCAT(Certificate_Number,Generic_Name,Brand_Name,Therapeutic_Category,Manufacturer,Market_Authorisation_Holder) LIKE '%$search_key%' LIMIT $offset, $total_records_per_page");
            
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
                <td><a href="./detail.php?Certificate_Number=<?php echo $row["Certificate_Number"]; ?>"
                        class="btn btn-info">More</a></td>
                <td><a href="../PDF/htmlToPdf.php?id=<?php echo $row["Number"]; ?>" class="btn btn-primary">Click</a>
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
    <?php include './pagination.php';?>
</div>





<?php
require '../../include/footer.php';
?>