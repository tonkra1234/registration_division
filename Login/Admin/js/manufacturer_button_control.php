<!-- <script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var manufacturerId = $(this).val();
        var fileName = $('.delete_file_name'+manufacturerId).val();
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
                    url: "./database/delete_controller/delete_manufacturer.php",
                    data: {
                        'manufacturerdelete': "delete",
                        'manufacturerId': manufacturerId,
                        'fileName': fileName,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + manufacturerId).hide(1000);
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
</script> -->
<script>
    $('.retrieve_button').click(function (e) {
        e.preventDefault();
        var manufacturerId = $(this).val();

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
                    url: "./database/delete_controller/delete_manufacturer.php",
                    data: {
                        'manufacturerdelete': "retrieve",
                        'manufacturerId': manufacturerId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + manufacturerId).hide(1000);
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
        var manufacturerId = $(this).val();
        var Name_Manufacturer = $('#Name_Manufacturer'+manufacturerId).val();
        var Proprietor = $('#Proprietor'+manufacturerId).val();
        var Key_person = $('#Key_person'+manufacturerId).val();
        var Category = $('#Category'+manufacturerId).val();
        var Location = $('#Location'+manufacturerId).val();
        var Email = $('#Email'+manufacturerId).val();
        var Dzongkhag = $('#Dzongkhag'+manufacturerId).val();
        var image_link = $('#image_link'+manufacturerId).val();


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
                    url: "./database/approval_controller/approval_manufacturer.php",
                    data: {
                        'manufacturerapproval': "approval",
                        'manufacturerId': manufacturerId,
                        'Name_Manufacturer': Name_Manufacturer,
                        'Proprietor': Proprietor,
                        'Key_person': Key_person,
                        'Category': Category,
                        'Location': Location,
                        'Email': Email,
                        'Dzongkhag':Dzongkhag,
                        'image_link':image_link,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + manufacturerId).hide(1000);
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
        var manufacturerId = $(this).val();
        var image_link = $('#image_link'+manufacturerId).val();

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
                    url: "./database/reject_controller/reject_manufacturer.php",
                    data: {
                        'manufacturerapproval': "reject",
                        'manufacturerId': manufacturerId,
                        'image_link':image_link,
                    },
                    success: function (reponse) {
                        $('#refresh-approval' + manufacturerId).hide(1000);
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