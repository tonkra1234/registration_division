<?php
require '../../include/connection.php';
session_start();

require './select_filter.php';

$search_key = (isset($_GET['search']))?$_GET['search']:'';
$start = (isset($_GET['startingDate']))?$_GET['startingDate']:'';
$end = (isset($_GET['endingDate']))?$_GET['endingDate']:'';
$market = (isset($_GET['Market_Authorisation_Holder']))?$_GET['Market_Authorisation_Holder']:'';
$country = (isset($_GET['Country_Market_holder']))?$_GET['Country_Market_holder']:'';

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

$user_name = $_SESSION['user_name'];
$_SESSION['user_name'] = $user_name;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug repository</title>

    <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <link rel="stylesheet" href="../../public/css/header_style.css">

    <style>
        #Mynav {
            background-image: url('../../public/image/Head_Web.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="shadow">
        <nav class="navbar" id="Mynav">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <a class="navbar-brand" href="./home.php"><img src="../../public/image/logo.png" height="100"
                                alt="DRA logo" loading="lazy" />
                        </a>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column justify-content-start">
                                <span class="fs-5 fw-bold text-primary">Drug</span>
                                <span class="fs-5 fw-bold text-primary">Regulatory</span>
                                <span class="fs-5 fw-bold text-primary">Authority</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column px-3 rounded-3 bg-gradient" style="background-color: transparent; width:40vw;">
                        <span class="fs-5 fst-italic text-center" style="color:#37779C ;"><span class="fs-5 fst-italic fw-bold" style="color:#37779C ;">" </span>The most dynamic, reliable and client-centric model</span>
                        <span class="fs-5 fst-italic text-end me-5" style="color:#37779C ;">
                            regulatory organization<span class="fs-5 fst-italic fw-bold" style="color:#37779C ;"> "</span></span>
                    </div>
                </div>


            </div>
        </nav>
    </div>

<div class="container my-5" style="min-height: 90vh;">
    <div class="rounded p-3 mb-5" style="background-color:#2980B9 ;">
        <div class="d-flex align-items-center justify-content-center ms-3">
            <span class="text-light fs-2 fw-bold">Registered Drugs</span>
        </div>
    </div>
    <div class="card p-3 py-4 mb-3">
        <h3 class="px-2">Filter</h3>
        <form action="" method="GET" accept-charset="utf-8">
            <div class="row g-3 mt-2">
                    <div class="col-sm-8 col-12">
                        <input class="border w-100 form-control" type="search" name="search" placeholder="Search" aria-label="Search" value="<?php echo $search_key; ?>">
                    </div>
                    <div class="col-sm-2 col-12 d-grid">
                        <button class="btn btn-secondary btn-block" type="submit"
                            style="background-color: #31968B ;">Search Results</button>
                    </div>
                    <div class="col-sm-2 col-12 d-grid">
                        <a class="btn btn-danger px-5 ms-1" role="button" href="./main.php">Clear all</a>
                    </div>
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
                                        name="startingDate" class="form-control" value="<?php echo $start; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="mb-1">
                                    <label for="endingDate">End date</label>
                                    <input placeholder="Selected ending date" type="date" id="endingDate"
                                        name="endingDate" class="form-control" value="<?php echo $end; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <select class="form-select w-100" aria-label="Default select example" 
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
                                    value="" >
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
        if(empty($search_key) && empty($start) && empty($end) && empty($market) && empty($country)){
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
        }elseif (!empty($search_key)){
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
        elseif(!empty($start) || !empty($market) || !empty($country) ){
            if (!empty($start)){
                if(!empty($end)){
                    if (!empty($market)) {
                        if (!empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                        elseif (empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Market_Authorisation_Holder = '$market' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Market_Authorisation_Holder = '$market' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                    }
                    elseif (empty($market)) {
                        if (!empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Country_of_Manufacturer = '$country' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' AND Country_of_Manufacturer = '$country' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                        elseif (empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '$end' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                    }
                }
                elseif(empty($end)){
                    if (!empty($market)) {
                        if (!empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                        elseif (empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Market_Authorisation_Holder = '$market' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Market_Authorisation_Holder = '$market' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                    }
                    elseif (empty($market)) {
                        if (!empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Country_of_Manufacturer = '$country' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN  '$start' AND '2035-01-01' AND Country_of_Manufacturer = '$country' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                        elseif (empty($country)) {
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Expiry_Date BETWEEN '$start' AND '2030-01-01' ");
    
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; 
                            
                            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date BETWEEN '$start' AND '2030-01-01' LIMIT $offset, $total_records_per_page");
                            
                            $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                        }
                    }
                }
            }
            elseif (!empty($market)) {
                if (!empty($country)) {
                        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country'");
    
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1; 
                            
                        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$market' AND Country_of_Manufacturer = '$country' LIMIT $offset, $total_records_per_page");
                            
                        $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                }
                elseif (empty($country)) {
                        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Market_Authorisation_Holder = '$market' ");
    
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1; 
                            
                        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$market'  LIMIT $offset, $total_records_per_page");
                            
                        $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                }
            }
            elseif (!empty($country)) {
                        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record` WHERE Country_of_Manufacturer = '$country' ");
    
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1; 
                            
                        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Country_of_Manufacturer = '$country'  LIMIT $offset, $total_records_per_page");
                            
                        $i = ($total_records_per_page*$page_no)-($total_records_per_page-1);
            }
        }
        
        ?>  
        <?php
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
    ?>

        </tbody>
    </table>
    <?php 
    
    include './paginator.php';

    ?>
</div>
<?php

require '../../include/footer.php';

?>