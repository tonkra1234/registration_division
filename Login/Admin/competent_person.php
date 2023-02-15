<?php require './include/header.php';?>
<?php
require './database//db_competent_person.php';
$db_competent_person = new CP();
$count_competent_person_trash = $db_competent_person->count_competent_person_trash();
// $results_competent_person_trash = $db_competent_person->fetch_competent_person_trash();
// $count_competent_person_approval = $db_competent_person->count_competent_person_approval();
// $results_competent_person_approval = $db_competent_person->fetch_competent_person_approval();

?>

<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Competent person list</h1>
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
                            <th scope="col">Name</th>
                            <th scope="col">CP category</th>
                            <th scope="col">CP Number</th>
                            <th scope="col">Contact No & Email</th>
                            <th scope="col">Firm name</th>
                            <th scope="col">Dzongkhag</th>
                            <th scope="col">Cp type</th>
                            <th scope="col">Certificate valid</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $outcome = ($db_competent_person->fetch_competent_person_trash()[0]);

                        $page_no = ($db_competent_person->fetch_competent_person_trash()[1]);
                        $total_no_of_pages = ($db_competent_person->fetch_competent_person_trash()[2]);
                        $total_records = ($db_competent_person->fetch_competent_person_trash()[3]);
                        $number = 1;
                     if($count_competent_person_trash['number_competent_person_trash'] > 0){
                        foreach ($outcome as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['id']?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td>
                                <p> <?php echo $result['Name'] ?> </p>
                                <p>(<?php echo $result['Gender'] ?>)</p>
                            </td>
                            <td> <?php echo $result['CP_category'] ?> </td>
                            <td> <?php echo $result['CP_Registration_No'] ?> </td>
                            <td>
                                <p> <?php echo $result['Contact_No']?></p>
                                <p> <?php echo $result['email_address'] ?> </p>
                            </td>
                            <td> <?php echo $result['Firm_Name'] ?> </td>
                            <td><?php  echo $result['Dzongkhag'] ?> </td>
                            <td> <?php echo $result['CP_type'] ?> </td>
                            <td class="text-center align-middle">
                                <?php if(((!empty($result['Status_show'])) ? $result['Status_show'] : "" ) === "Active") : ?>
                                <span class="badge bg-success"><?php echo $result['Status_show'] ;?></span></td>
                            <?php elseif(((!empty($result['Status_show'])) ? $result['Status_show'] : "" ) === "Inactive") : ?>
                            <span class="badge bg-danger"><?php echo $result['Status_show'] ;?></span></td>
                            <?php else : ?>
                            <span class="badge bg-warning text-dark"><?php echo $result['Status_show'] ;?></span>
                            </td>
                            <?php endif; ?>
                            <td><?php echo $result['Certificate_Validity_Date'] ?> </td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="retrieve_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Retrieve</button>
                                    <!-- <button type="button"
                                        class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Delete</button> -->
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="11">
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
            if($count_competent_person_trash['number_competent_person_trash'] > 0){
                include './Paginator/paginator.php';
            }
            ?>
        </main>
    </div>
</div>
<?php require './js/competent_person_button.php';?>
<?php require './include/footer.php';?>