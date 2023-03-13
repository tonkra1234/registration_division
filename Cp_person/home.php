<?php require './includes/header.php';

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        CP list
    </p>

</div>

<!-- Add User Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="my-1">Add the person</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" method="POST" action="./add_SQL.php" class="p-2" novalidate>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Name" name="Name" class="form-control" placeholder="Enter Name">
                            <label for="floatingInput" class="ms-2">Name</label>
                            <div class="invalid-feedback">Name is required!</div>
                        </div>
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Gender" name="Gender" class="form-control"
                                placeholder="Enter Gender">
                            <div class="invalid-feedback">Gender is required!</div>
                            <label for="floatingInput" class="ms-2">Gender</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="CP_category" name="CP_category" class="form-control"
                                placeholder="Enter Cp category">
                            <div class="invalid-feedback">CP category is required!</div>
                            <label for="floatingInput" class="ms-2">CP_category</label>
                        </div>
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="CP_Registration_No" name="CP_Registration_No" class="form-control"
                                placeholder="Enter Registration Number">
                            <div class="invalid-feedback">CP Number is required!</div>
                            <label for="floatingInput" class="ms-2">CP number</label>
                        </div>
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="CID_No" name="CID_No" class="form-control"
                                placeholder="Enter CID number">
                            <div class="invalid-feedback">CID Number is required!</div>
                            <label for="floatingInput" class="ms-2">CID Number number</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="CP_type" name="CP_type" class="form-control"
                                placeholder="Enter Cp type">
                            <div class="invalid-feedback">CP type is required!</div>
                            <label for="floatingInput" class="ms-2">CP type</label>
                        </div>
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Contact_No" name="Contact_No" class="form-control"
                                placeholder="Enter Contact number">
                            <div class="invalid-feedback">Contact number is required!</div>
                            <label for="floatingInput" class="ms-2">CP contact</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="email_address" name="email_address" class="form-control"
                                placeholder="Enter Email">
                            <div class="invalid-feedback">Email is required!</div>
                            <label for="floatingInput" class="ms-2">Email</label>
                        </div>
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Firm_Name" name="Firm_Name" class="form-control"
                                placeholder="Enter Firm name">
                            <div class="invalid-feedback">Firm is required!</div>
                            <label for="floatingInput" class="ms-2">Firm name</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Firm_Location" name="Firm_Location" class="form-control"
                                placeholder="Enter Firm location">
                            <div class="invalid-feedback">Firm location is required!</div>
                            <label for="floatingInput" class="ms-2">Firm location</label>
                        </div>
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Previous_Firm_name" name="Previous_Firm_name" class="form-control"
                                placeholder="Enter Previous Firm name" required>
                            <div class="invalid-feedback">Previous Firm name is required!</div>
                            <label for="floatingInput" class="ms-2">Previous Firm name</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Dzongkhag" name="Dzongkhag" class="form-control"
                                placeholder="Enter Dzongkhag">
                            <div class="invalid-feedback">Dzongkhag is required!</div>
                            <label for="floatingInput" class="ms-2">Dzongkhag</label>
                        </div>
                        <div class="form-floating col-lg-6 col-12">
                            <input type="text" id="Application_Number" name="Application_Number" class="form-control"
                                placeholder="Enter Application Number">
                            <div class="invalid-feedback">Application Number is required!</div>
                            <label for="floatingInput" class="ms-2">Application Number</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="BMHC_Certificate_No" name="BMHC_Certificate_No" class="form-control"
                                placeholder="Enter BMHC Number">
                            <div class="invalid-feedback">BMHC Number is required!</div>
                            <label for="floatingInput" class="ms-2">BMHC Number</label>
                        </div>
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="Qualification" name="Qualification" class="form-control"
                                placeholder="Enter Qualification">
                            <div class="invalid-feedback">Qualification is required!</div>
                            <label for="floatingInput" class="ms-2">Qualification</label>
                        </div>
                        <div class="form-floating col-lg-4 col-12">
                            <input type="text" id="Nationality" name="Nationality" class="form-control"
                                placeholder="Enter Nationality">
                            <div class="invalid-feedback">Nationality is required!</div>
                            <label for="floatingInput" class="ms-2">Nationality</label>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col-lg-4 col-12">
                            <label for="Date_of_receipt_of_application" class="form-label">Receipt date</label>
                            <input type="date" id="Date_of_receipt_of_application" name="Date_of_receipt_of_application"
                                class="form-control">
                            <div class="invalid-feedback">Receipt date is required!</div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <label for="Date_of_registration" class="form-label">Registration date</label>
                            <input type="date" id="Date_of_registration" name="Date_of_registration"
                                class="form-control">
                            <div class="invalid-feedback">registration date is required!</div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <label for="st_expiray_date" class="form-label">Fisrt date</label>
                            <input type="date" id="st_expiray_date" name="st_expiray_date" class="form-control">
                            <div class="invalid-feedback">fisrt date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col-lg-6 col-12">
                            <label for="Application_date" class="form-label">Application date</label>
                            <input type="date" id="Application_date" name="Application_date" class="form-control">
                            <div class="invalid-feedback">Application date is required!</div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="Renewal_date" class="form-label">Renewal date</label>
                            <input type="date" id="Renewal_date" name="Renewal_date" class="form-control">
                            <div class="invalid-feedback">Renewal date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col-lg-6 col-12">
                            <label for="Application_date_second" class="form-label">Second application date</label>
                            <input type="date" id="Application_date_second" name="Application_date_second"
                                class="form-control">
                            <div class="invalid-feedback">Second application date is required!</div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="Renewal_date_second" class="form-label">Second renewal date</label>
                            <input type="date" id="Renewal_date_second" name="Renewal_date_second" class="form-control">
                            <div class="invalid-feedback">Second renewal date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col-lg-4 col-12">
                            <label for="Certificate_Validity_Date" class="form-label">Valid date</label>
                            <input type="date" id="Certificate_Validity_Date" name="Certificate_Validity_Date"
                                class="form-control">
                            <div class="invalid-feedback">valid date is required!</div>

                        </div>
                        <div class="col-lg-4 col-12">
                            <label for="Application_date_pharmacy" class="form-label">Pharmacy date</label>
                            <input type="date" id="Application_date_pharmacy" name="Application_date_pharmacy"
                                class="form-control">
                            <div class="invalid-feedback">Pharmacy date is required!</div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <label for="Issuance_date_pharmacy" class="form-label">Issuance pharmacy date</label>
                            <input type="date" id="Issuance_date_pharmacy" name="Issuance_date_pharmacy"
                                class="form-control">
                            <div class="invalid-feedback">Issuance pharmacy date is required!</div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="Remarks" name="Remarks" class="form-control" required>
                        <div class="invalid-feedback">Remarks is required!</div>
                        <label for="floatingInput">Remarks</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="Status_show" name="Status_show" class="form-control"
                            placeholder="Enter status">
                        <div class="invalid-feedback">Status is required!</div>
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" value="Add User" class="btn btn-success" id="add-user-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="my-4">
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="">All the competent person in repository</h4>
            </div>
            <div>
                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#addNewUserModal">
                    <div class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-plus"></i>
                        <div class="ms-2 d-none d-sm-block">Add new competent person
                        </div>
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div style="font-size:0.9rem ;">
        <div class="container-fluid table-responsive">
            <table class="table table-striped table-hover table-bordered shadow ">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">CP category</th>
                        <th scope="col">CP Number</th>
                        <th scope="col">Contact No & Email</th>
                        <th scope="col">Firm name</th>
                        <th scope="col">Dzongkhag</th>
                        <th scope="col">Cp type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Certificate valid</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					include './db.php';
					$obj = new DataBase;
                    $outcome = ($obj->read()[0]);

                    $page_no = ($obj->read()[1]);
                    $total_no_of_pages = ($obj->read()[2]);
                    $total_records = ($obj->read()[3]);
                    $number=1;
                    
					foreach($outcome as $fetch){
				?>
                    <tr id="refresh-delete<?php echo $fetch['id']?>">
                        <th scope="row" class="text-center"> <?php echo $number; ?></th>
                        <td>
                            <p> <?php echo $fetch['Name'] ?> </p>
                            <p>(<?php echo $fetch['Gender'] ?>)</p>
                        </td>
                        <td> <?php echo $fetch['CP_category'] ?> </td>
                        <td> <?php echo $fetch['CP_Registration_No'] ?> </td>
                        <td>
                            <p> <?php echo $fetch['Contact_No']?></p>
                            <p> <?php echo $fetch['email_address'] ?> </p>
                        </td>
                        <td> <?php echo $fetch['Firm_Name'] ?> </td>
                        <td><?php  echo $fetch['Dzongkhag'] ?> </td>
                        <td> <?php echo $fetch['CP_type'] ?> </td>
                        <td class="text-center align-middle">
                            <?php if(((!empty($fetch['Status_show'])) ? $fetch['Status_show'] : "" ) === "Active") : ?>
                            <span class="badge bg-success"><?php echo $fetch['Status_show'] ;?></span></td>
                        <?php elseif(((!empty($fetch['Status_show'])) ? $fetch['Status_show'] : "" ) === "Inactive") : ?>
                        <span class="badge bg-danger"><?php echo $fetch['Status_show'] ;?></span></td>
                        <?php else : ?>
                        <span class="badge bg-warning text-dark"><?php echo $fetch['Status_show'] ;?></span>
                        </td>
                        <?php endif; ?>
                        <td><?php echo $fetch['Certificate_Validity_Date'] ?> </td>
                        <td>
                            <div class="d-grid">
                                <button type="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#update_modal<?php echo $fetch['id'] ;?>">Edit</button>
                                <button type="button"
                                    class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                    value="<?php echo $fetch['id']?>">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php
					
					include './update_modal.php';
					$number++;
					}
				?>
                </tbody>
            </table>
            <?php
                include './paginator.php';
            ?>
        </div>
    </div>

</div>
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var competentPersonId = $(this).val();

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
                    url: "./delete_controller.php",
                    data: {
                        'manufacturerdelete': "delete",
                        'competentPersonId': competentPersonId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + competentPersonId).hide(1000);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been delete.',
                    'success'
                )
            }
        })

    });
</script>

<?php require './includes/footer.php';?>