<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var drugId = $(this).val();

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
                    url: "./database/delete_controller/delete_drug.php",
                    data: {
                        'drugdelete': "delete",
                        'drugId': drugId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + drugId).hide(1000);
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
        var drugId = $(this).val();

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
                    url: "./database/delete_controller/delete_drug.php",
                    data: {
                        'drugdelete': "retrieve",
                        'drugId': drugId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + drugId).hide(1000);
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
<script>
    $('.approval_button').click(function (e) {
        e.preventDefault();
        var drugId = $(this).val();
        var Essential = $('#Essential' + drugId).val();
        var Registration_Type = $('#Registration_Type' + drugId).val();
        var Application_Type = $('#Application_Type' + drugId).val();
        var Market_Authorisation_Holder = $('#Market_Authorisation_Holder' + drugId).val();
        var Category_of_Medical_Product = $('#Category_of_Medical_Product' + drugId).val();
        var Intention = $('#Intention' + drugId).val();
        var Generic_Name = $('#Generic_Name' + drugId).val();
        var Brand_Name = $('#Brand_Name' + drugId).val();
        var Dosage_Form = $('#Dosage_Form' + drugId).val();
        var Pack_Size = $('#Pack_Size' + drugId).val();
        var Type_of_Packaging = $('#Type_of_Packaging' + drugId).val();
        var Composition = $('#Composition' + drugId).val();
        var Manufacturer = $('#Manufacturer' + drugId).val();
        var Country_of_Manufacturer = $('#Country_of_Manufacturer' + drugId).val();
        var Therapeutic_Category = $('#Therapeutic_Category' + drugId).val();
        var Certificate_Number = $('#Certificate_Number' + drugId).val();
        var Issue_Date = $('#Issue_Date' + drugId).val();
        var Expiry_Date = $('#Expiry_Date' + drugId).val();
        var Price_per_unit = $('#Price_per_unit' + drugId).val();
        var Marketer = $('#Marketer' + drugId).val();

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
                    url: "./database/approval_controller/approval_drug.php",
                    data: {
                        'drugapproval': "approval",
                        'drugId': drugId,
                        'Essential' : Essential,
                        'Registration_Type' : Registration_Type,
                        'Application_Type' : Application_Type,
                        'Market_Authorisation_Holder' : Market_Authorisation_Holder,
                        'Category_of_Medical_Product' : Category_of_Medical_Product,
                        'Intention' : Intention,
                        'Generic_Name' : Generic_Name,
                        'Brand_Name' : Brand_Name,
                        'Dosage_Form' : Dosage_Form,
                        'Pack_Size' : Pack_Size,
                        'Type_of_Packaging' : Type_of_Packaging,
                        'Composition' : Composition,
                        'Manufacturer' : Manufacturer,
                        'Marketer' : Marketer,
                        'Country_of_Manufacturer' : Country_of_Manufacturer,
                        'Therapeutic_Category' : Therapeutic_Category,
                        'Certificate_Number' : Certificate_Number,
                        'Issue_Date' : Issue_Date,
                        'Expiry_Date' : Expiry_Date,
                        'Price_per_unit' : Price_per_unit,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + drugId).hide(1000);
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
        var drugId = $(this).val();

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
                    url: "./database/reject_controller/reject_drug.php",
                    data: {
                        'drugapproval': "reject",
                        'drugId': drugId,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + drugId).hide(1000);
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
</script>