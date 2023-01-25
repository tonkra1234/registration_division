<div class="modal fade" id="update_modal<?php echo $fetch['id'] ;?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="./update_SQL.php">
                <div class="modal-header">
                    <h4 class="my-1">Edit the person</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fetch['id'] ;?>">
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="Name" name="Name" class="form-control" placeholder="Enter Name"
                                required value="<?php echo $fetch['Name'] ;?>">
                            <label for="floatingInput" class="ms-2">Name</label>
                            <div class="invalid-feedback">Name is required!</div>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Gender" name="Gender" class="form-control" placeholder="Enter Gender"
                                value="<?php echo $fetch['Gender'] ?>">
                            <div class="invalid-feedback">Gender is required!</div>
                            <label for="floatingInput" class="ms-2">Gender</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="CP_category" name="CP_category" class="form-control"
                                placeholder="Enter Cp category"  value="<?php echo $fetch['CP_category'] ?>">
                            <div class="invalid-feedback">CP category is required!</div>
                            <label for="floatingInput" class="ms-2">CP_category</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="CP_Registration_No" name="CP_Registration_No" class="form-control"
                                placeholder="Enter Registration Number"  value="<?php echo $fetch['CP_Registration_No'] ?>">
                            <div class="invalid-feedback">CP Number is required!</div>
                            <label for="floatingInput" class="ms-2">CP number</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="CID_No" name="CID_No" class="form-control"
                                placeholder="Enter CID number"  value="<?php echo $fetch['CID_No'] ?>">
                            <div class="invalid-feedback">CID Number is required!</div>
                            <label for="floatingInput" class="ms-2">CID Number number</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="CP_type" name="CP_type" class="form-control"
                                placeholder="Enter Cp type"  value="<?php echo $fetch['CP_type'] ?>">
                            <div class="invalid-feedback">CP type is required!</div>
                            <label for="floatingInput" class="ms-2">CP type</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Contact_No" name="Contact_No" class="form-control"
                                placeholder="Enter Contact number" value="<?php echo $fetch['Contact_No'] ?>">
                            <div class="invalid-feedback">Contact number is required!</div>
                            <label for="floatingInput" class="ms-2">CP contact</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="email_address" name="email_address" class="form-control"
                                placeholder="Enter Email" value="<?php echo $fetch['email_address'] ?>">
                            <div class="invalid-feedback">Email is required!</div>
                            <label for="floatingInput" class="ms-2">Email</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Firm_Name" name="Firm_Name" class="form-control"
                                placeholder="Enter Firm name" value="<?php echo $fetch['Firm_Name'] ?>">
                            <div class="invalid-feedback">Firm is required!</div>
                            <label for="floatingInput" class="ms-2">Firm name</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="Firm_Location" name="Firm_Location" class="form-control"
                                placeholder="Enter Firm location" value="<?php echo $fetch['Firm_Location'] ?>">
                            <div class="invalid-feedback">Firm location is required!</div>
                            <label for="floatingInput" class="ms-2">Firm location</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Previous_Firm_name" name="Previous_Firm_name" class="form-control"
                                placeholder="Enter Previous Firm name"  value="<?php echo $fetch['Previous_Firm_name'] ?>">
                            <div class="invalid-feedback">Previous Firm name is required!</div>
                            <label for="floatingInput" class="ms-2">Previous Firm name</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="Dzongkhag" name="Dzongkhag" class="form-control"
                                placeholder="Enter Dzongkhag" value="<?php echo $fetch['Dzongkhag'] ?>">
                            <div class="invalid-feedback">Dzongkhag is required!</div>
                            <label for="floatingInput" class="ms-2">Dzongkhag</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Application_Number" name="Application_Number" class="form-control"
                                placeholder="Enter Application Number"  value="<?php echo $fetch['Application_Number'] ?>">
                            <div class="invalid-feedback">Application Number is required!</div>
                            <label for="floatingInput" class="ms-2">Application Number</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="form-floating col">
                            <input type="text" id="BMHC_Certificate_No" name="BMHC_Certificate_No" class="form-control"
                                placeholder="Enter BMHC Number"  value="<?php echo $fetch['BMHC_Certificate_No'] ?>">
                            <div class="invalid-feedback">BMHC Number is required!</div>
                            <label for="floatingInput" class="ms-2">BMHC Number</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Qualification" name="Qualification" class="form-control"
                                placeholder="Enter Qualification" value="<?php echo $fetch['Qualification'] ?>">
                            <div class="invalid-feedback">Qualification is required!</div>
                            <label for="floatingInput" class="ms-2">Qualification</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" id="Nationality" name="Nationality" class="form-control"
                                placeholder="Enter Nationality"  value="<?php echo $fetch['Nationality'] ?>">
                            <div class="invalid-feedback">Nationality is required!</div>
                            <label for="floatingInput" class="ms-2">Nationality</label>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <label for="Date_of_receipt_of_application" class="form-label">Receipt date</label>
                            <input type="date" id="Date_of_receipt_of_application" name="Date_of_receipt_of_application"
                                class="form-control"  value="<?php echo $fetch['Date_of_receipt_of_application'] ?>">
                            <div class="invalid-feedback">Receipt date is required!</div>
                        </div>
                        <div class="col">
                            <label for="Date_of_registration" class="form-label">Registration date</label>
                            <input type="date" id="Date_of_registration" name="Date_of_registration"
                                class="form-control"  value="<?php echo $fetch['Date_of_registration'] ?>">
                            <div class="invalid-feedback">registration date is required!</div>
                        </div>
                        <div class="col">
                            <label for="st_expiray_date" class="form-label">Fisrt date</label>
                            <input type="date" id="st_expiray_date" name="st_expiray_date" class="form-control"
                                 value="<?php echo $fetch['st_expiray_date'] ?>">
                            <div class="invalid-feedback">fisrt date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <label for="Application_date" class="form-label">Application date</label>
                            <input type="date" id="Application_date" name="Application_date" class="form-control"
                                value="<?php echo $fetch['Application_date'] ?>">
                            <div class="invalid-feedback">Application date is required!</div>
                        </div>
                        <div class="col">
                            <label for="Renewal_date" class="form-label">Renewal date</label>
                            <input type="date" id="Renewal_date" name="Renewal_date" class="form-control" value="<?php echo $fetch['Renewal_date'] ?>">
                            <div class="invalid-feedback">Renewal date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <label for="Application_date_second" class="form-label">Second application date</label>
                            <input type="date" id="Application_date_second" name="Application_date_second"
                                class="form-control"  value="<?php echo $fetch['Application_date_second'] ?>">
                            <div class="invalid-feedback">Second application date is required!</div>
                        </div>
                        <div class="col">
                            <label for="Renewal_date_second" class="form-label">Second renewal date</label>
                            <input type="date" id="Renewal_date_second" name="Renewal_date_second" class="form-control"
                                 value="<?php echo $fetch['Renewal_date_second'] ?>">
                            <div class="invalid-feedback">Second renewal date is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <label for="Certificate_Validity_Date" class="form-label">Valid date</label>
                            <input type="date" id="Certificate_Validity_Date" name="Certificate_Validity_Date"
                                class="form-control" value="<?php echo $fetch['Certificate_Validity_Date'] ?>">
                            <div class="invalid-feedback">valid date is required!</div>

                        </div>
                        <div class="col">
                            <label for="Application_date_pharmacy" class="form-label">Pharmacy date</label>
                            <input type="date" id="Application_date_pharmacy" name="Application_date_pharmacy"
                                class="form-control"  value="<?php echo $fetch['Application_date_pharmacy'] ?>">
                            <div class="invalid-feedback">Pharmacy date is required!</div>
                        </div>
                        <div class="col">
                            <label for="Issuance_date_pharmacy" class="form-label">Issuance pharmacy date</label>
                            <input type="date" id="Issuance_date_pharmacy" name="Issuance_date_pharmacy"
                                class="form-control" value="<?php echo $fetch['Issuance_date_pharmacy'] ?>">
                            <div class="invalid-feedback">Issuance pharmacy date is required!</div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="Remarks" name="Remarks" class="form-control" value="<?php echo $fetch['Remarks'] ?>">
                        <div class="invalid-feedback">Remarks is required!</div>
                        <label for="floatingInput">Remarks</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="Status_show" name="Status_show" class="form-control" placeholder="Enter status"
                            value="<?php echo $fetch['Status_show'] ?>">
                        <div class="invalid-feedback">Status is required!</div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button name="update" class="btn btn-warning">Update</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>