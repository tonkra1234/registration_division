<?php 

require './include/header.php';
require './db.php';

$db = new Database();
$results = $db->read();

?>
<!-- Modal -->
<div class="modal fade" id="addNewManufacturerModal" tabindex="-1" aria-labelledby="addNewManufacturerModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add-new" method="POST" action="./add_SQL.php" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewManufacturerModal">Add new manufacturer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Name_Manufacturer" name="Name_Manufacturer"
                                    placeholder="Name_Manufacturer" required>
                                <label for="floatingInput">Firm name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Proprietor" name="Proprietor"
                                    placeholder="Proprietor'name" required>
                                <label for="floatingInput">Proprietor'name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Category" name="Category"
                                    placeholder="Category of medicine" required>
                                <label for="floatingInput">Category of medicine</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Email"
                                    required>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <?php include './include/Dzongkhag.php';?>
                                <label for="Dzongkhag">Dzongkhag</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Location" name="Location"
                                    placeholder="Location" required>
                                <label for="floatingInput">Location</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control" id="Key_person" name="Key_person"
                                    placeholder="Key_person" required></textarea>
                                <label for="floatingInput">Key person</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="image_link" name="image_link"
                                    accept=".jpg, .jpeg, .png" aria-label="file logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="Add Manufacturer" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="my-5">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="">All the Manufacturer in repository</h4>
            </div>
            <div>
                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#addNewManufacturerModal">Add new manufacturer</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach($results as $result){?>

        <div class="col-md-4 col-12 my-2">
            <div class="card shadow" style="min-height: 50rem;">
                <?php if(is_file('./upload_image/'.$result["image_link"])): ?>
                    <img src="./upload_image/<?php echo $result['image_link']?>" class="img-fluid rounded-start p-5"
                    alt="logo">
                <?php elseif(true) : ?>
                    <img src="./upload_image/question_mark.png" class="img-fluid rounded-start p-5" alt="question_mark">
                <?php endif; ?>
                <div class="card-body d-flex align-items-center">
                    <h5 class="card-title"><?php echo $result['Name_Manufacturer']; ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa-solid fa-user-tie me-1"></i> <span
                            class="fs-6 fw-bold">Proprietor : </span><span><?php echo $result['Proprietor']?></span>
                    </li>
                    <li class="list-group-item"><i class="fa-solid fa-notes-medical me-1"></i> <span
                            class="fs-6 fw-bold">Medical product category :
                        </span><span><?php echo $result['Category']?></span>
                    </li>
                    <li class="list-group-item"><i class="fa-solid fa-at me-1"></i> <span class="fs-6 fw-bold">Email :
                        </span><span><?php echo $result['Email']?></span></li>
                    <li class="list-group-item"><i class="fa-solid fa-location-dot me-1"></i> <span
                            class="fs-6 fw-bold">Location : </span><span><?php echo $result['Location']?></span></li>
                    <li class="list-group-item"><i class="fa-solid fa-location-crosshairs me-1"></i> <span
                            class="fs-6 fw-bold">Dzongkhag : </span><span><?php echo $result['Dzongkhag']?></span></li>
                </ul>
                <div class="collapse" id="collapse<?php echo $result['id'];?>">
                    <div class="card card-body">
                        <h5>Key personnel</h5>
                        <?php 

                        $lists = explode(",",$result['Key_person']);
                        $no = 1;
                        foreach($lists as $list){
                            echo $no.'. '.$list .'<br>';
                            $no++;
                        }
                        
                        ?>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button type="button" class="btn btn-warning w-50 mx-1" data-bs-toggle="modal"
                        data-bs-target="#editModal<?php echo $result['id'];?>">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>
                    <a class="btn btn-success w-50 mx-1" data-bs-toggle="collapse" href="#collapse<?php echo $result['id'];?>" role="button"
                        aria-expanded="false" aria-controls="collapse<?php echo $result['id'];?>">
                        <i class="fa-solid fa-eye"></i> More detail
                    </a>
                </div>
            </div>
        </div>
        <?php 
        include './edit_modal.php';
    }
    ?>
    </div>
</div>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()

                    }

                    form.classList.add('was-validated')




                }, false)
            })
    })()
</script>


<?php require './include/footer.php';?>