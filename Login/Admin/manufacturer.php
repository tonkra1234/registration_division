<?php require './include/header.php';?>
<?php 

require './database/db_manufacturer.php';
$db_manufacturer = new Manufacturer();
$count_manufacturer_trash = $db_manufacturer->count_manufacturer_trash();
// $results_manufacturer_trash = $db_manufacturer->fetch_manufacturer_trash();
// $count_manufacturer_approval = $db_manufacturer->count_manufacturer_approval();
// $results_manufacturer_approval = $db_manufacturer->fetch_manufacturer_approval();
?>

<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manufacturer list</h1>
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
                            <th scope="col">No</th>
                            <th scope="col">Name of Manufacturer</th>
                            <th scope="col">Proprietor</th>
                            <th scope="col">Category</th>
                            <th scope="col">Dzongkhag</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $outcome = ($db_manufacturer->fetch_manufacturer_trash()[0]);

                        $page_no = ($db_manufacturer->fetch_manufacturer_trash()[1]);
                        $total_no_of_pages = ($db_manufacturer->fetch_manufacturer_trash()[2]);
                        $total_records = ($db_manufacturer->fetch_manufacturer_trash()[3]);
                     $number = 1;
                     if($count_manufacturer_trash['number_manufacturer_trash'] > 0){
                        foreach ($outcome as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['id']?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result['Name_Manufacturer']?></td>
                            <td><?php echo $result['Proprietor']?></td>
                            <td><?php echo $result['Category']?></td>
                            <td><?php echo $result['Dzongkhag']?></td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="retrieve_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Retrieve</button>
                                    <!-- <button type="button"
                                        class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Delete</button> -->
                                    <input type="hidden" value="<?php echo $result['image_link'];?>" class="delete_file_name<?php echo $result['id'];?>">
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
            if($count_manufacturer_trash['number_manufacturer_trash'] > 0){
                include './Paginator/paginator.php';
            }
            ?>
        </main>
    </div>
</div>
<?php require './js/manufacturer_button_control.php';?>
<?php require './include/footer.php';?>