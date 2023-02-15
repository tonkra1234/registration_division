<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var cpId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#BD9802',
            confirmButtonText: 'Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/delete_controller/delete_competent_person.php",
                    data: {
                        'cpdelete': "delete",
                        'cpId': cpId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + cpId).hide(1000);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
</script>
<script>
    $('.retrieve_button').click(function (e) {
        e.preventDefault();
        var cpId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to retrieve this data",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1C9404',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, retrieve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/delete_controller/delete_competent_person.php",
                    data: {
                        'cpdelete': "retrieve",
                        'cpId': cpId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + cpId).hide(1000);
                    }
                });
                Swal.fire(
                    'Retrieve!',
                    'Your product has been retrieve.',
                    'success'
                )
            }
        })

    });
</script>
<!-- <script>
    $('.approval_button').click(function (e) {
        e.preventDefault();
        var cpId = $(this).val();
        var Application_Number = $('#Application_Number' + cpId).val();
        var Date_of_receipt_of_application = $('#Date_of_receipt_of_application' + cpId).val();
        var Date_of_registration = $('#Date_of_registration' + cpId).val();
        var st_expiray_date = $('#st_expiray_date' + cpId).val();
        var CP_Registration_No = $('#CP_Registration_No' + cpId).val();
        var Name = $('#Name' + cpId).val();
        var CID_No = $('#CID_No' + cpId).val();
        var BMHC_Certificate_No = $('#BMHC_Certificate_No' + cpId).val();
        var Qualification = $('#Qualification' + cpId).val();
        var CP_category = $('#CP_category' + cpId).val();
        var Gender = $('#Gender' + cpId).val();
        var Nationality = $('#Nationality' + cpId).val();
        var Contact_No = $('#Contact_No' + cpId).val();
        var email_address = $('#email_address' + cpId).val();
        var Firm_Name = $('#Firm_Name' + cpId).val();
        var Firm_Location = $('#Firm_Location' + cpId).val();
        var Dzongkhag = $('#Dzongkhag' + cpId).val();
        var CP_type = $('#CP_type' + cpId).val();
        var Application_date = $('#Application_date' + cpId).val();
        var Renewal_date = $('#Renewal_date' + cpId).val();
        var Application_date_second = $('#Application_date_second' + cpId).val();
        var Renewal_date_second = $('#Renewal_date_second' + cpId).val();
        var Certificate_Validity_Date = $('#Certificate_Validity_Date' + cpId).val();
        var Application_date_pharmacy = $('#Application_date_pharmacy' + cpId).val();
        var Issuance_date_pharmacy = $('#Issuance_date_pharmacy' + cpId).val();
        var Status_show = $('#Status_show' + cpId).val();
        var Previous_Firm_name = $('#Previous_Firm_name' + cpId).val();
        var Remarks = $('#Remarks' + cpId).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to approve this data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#209900',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/approval_controller/approval_competent_person.php",
                    data: {
                        'cpapproval': "approval",
                        'cpId': cpId,
                        'Name': Name,
                        'Gender': Gender,
                        'CP_category': CP_category,
                        'CP_Registration_No': CP_Registration_No,
                        'CID_No': CID_No,
                        'CP_type': CP_type,
                        'Contact_No': Contact_No,
                        'email_address': email_address,
                        'Firm_Name': Firm_Name,
                        'Firm_Location': Firm_Location,
                        'Previous_Firm_name': Previous_Firm_name,
                        'Dzongkhag': Dzongkhag,
                        'Application_Number': Application_Number,
                        'BMHC_Certificate_No': BMHC_Certificate_No,
                        'Qualification': Qualification,
                        'Nationality': Nationality,
                        'Date_of_receipt_of_application': Date_of_receipt_of_application,
                        'Date_of_registration': Date_of_registration,
                        'st_expiray_date': st_expiray_date,
                        'Application_date': Application_date,
                        'Renewal_date': Renewal_date,
                        'Application_date_second': Application_date_second,
                        'Renewal_date_second': Renewal_date_second,
                        'Certificate_Validity_Date': Certificate_Validity_Date,
                        'Application_date_pharmacy': Application_date_pharmacy,
                        'Issuance_date_pharmacy': Issuance_date_pharmacy,
                        'Remarks': Remarks,
                        'Status_show': Status_show,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + cpId).hide(1000);
                    }
                });
                Swal.fire(
                    'Record!',
                    'Your file has been recorded.',
                    'success'
                )
            }
        })

    });
</script>

<script>
    $('.reject_button').click(function (e) {
        e.preventDefault();
        var cpId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#BB8B02 ',
            confirmButtonText: 'Yes, reject it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/reject_controller/reject_competent_person.php",
                    data: {
                        'cpapproval': "reject",
                        'cpId': cpId,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + cpId).hide(1000);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been rejected.',
                    'success'
                )
            }
        })

    });
</script> -->