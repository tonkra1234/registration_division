<?php require './include/header.php';?>
<?php
require './database/db_drug_repository.php';
$db_drug = new Drug();
$count_drug_trash = $db_drug->count_drug_trash();
// $results_drug_trash = $db_drug->fetch_drug_trash();
// $count_drug_approval = $db_drug->count_drug_approval();
// $results_drug_approval = $db_drug->fetch_drug_approval();

?>

<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Drug repository</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Trash list</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered shadow">
                    <thead class="rounded-3 text-white" style="background-color: #B25003 ;">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Certificate number</th>
                            <th scope="col">Generic name</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">Therapeutic category</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Expire date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $outcome = ($db_drug->fetch_drug_trash()[0]);

                        $page_no = ($db_drug->fetch_drug_trash()[1]);
                        $total_no_of_pages = ($db_drug->fetch_drug_trash()[2]);
                        $total_records = ($db_drug->fetch_drug_trash()[3]);
                        $number = 1;
                     if($count_drug_trash['number_drug_trash'] > 0){
                        foreach ($outcome as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['Number']?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result["Certificate_Number"]; ?></td>
                            <td><?php echo $result["Generic_Name"]; ?></td>
                            <td><?php echo $result["Brand_Name"]; ?></td>
                            <td><?php echo $result["Therapeutic_Category"]; ?></td>
                            <td><?php echo $result["Manufacturer"]; ?></td>
                            <td><?php 
                                $Expiry_date=date_create($result["Expiry_Date"]); 
                                echo date_format($Expiry_date,"Y-M-d");
                                ?>
                            </td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="retrieve_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['Number']?>">Retrieve</button>
                                    <!-- <button type="button"
                                        class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['Number']?>">Delete</button> -->
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="min-height: 10rem;">
                                    <h3>There is no data founded</h3>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php 
            if($count_drug_trash['number_drug_trash'] > 0){
                include './Paginator/paginator.php';
            }
            ?>
            <!-- <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Aproving list</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered shadow">
                    <thead class="rounded-3 text-white" style="background-color: #008E2F ;">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Certificate number</th>
                            <th scope="col">Generic name</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">Therapeutic category</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Expire date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     if($count_drug_approval['number_drug_approval'] > 0){
                        foreach ($results_drug_approval as $result) {
                     
                    ?>
                        <tr id="refresh-approval<?php echo $result['Number']?>">

                            <?php include './drug_repository_input.php';?>

                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result["Certificate_Number"]; ?></td>
                            <td><?php echo $result["Generic_Name"]; ?></td>
                            <td><?php echo $result["Brand_Name"]; ?></td>
                            <td><?php echo $result["Therapeutic_Category"]; ?></td>
                            <td><?php echo $result["Manufacturer"]; ?></td>
                            <td><?php 
                                $Expiry_date=date_create($result["Expiry_Date"]); 
                                echo date_format($Expiry_date,"Y-M-d");
                                ?>
                            </td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="approval_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['Number']?>">Approval</button>
                                    <button type="button"
                                        class="reject_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['Number']?>">Reject</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="min-height: 10rem;">
                                    <h3>There is no data founded</h3>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div> -->
            
        </main>
    </div>
</div>
<?php require './js/drug_repository_button_control.php';?>
<?php require './include/footer.php';?>