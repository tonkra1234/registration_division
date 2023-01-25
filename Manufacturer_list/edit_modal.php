<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $result['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="edit-existing" method="POST" action="./edit_SQL.php" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit the manufacturer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Name_Manufacturer" name="Name_Manufacturer"
                                    placeholder="Name_Manufacturer" required
                                    value="<?php echo $result['Name_Manufacturer'];?>">
                                <label for="floatingInput">Firm name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Proprietor" name="Proprietor"
                                    placeholder="Proprietor'name" required value="<?php echo $result['Proprietor'];?>">
                                <label for="floatingInput">Proprietor'name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Category" name="Category"
                                    placeholder="Category of medicine" required
                                    value="<?php echo $result['Category'];?>">
                                <label for="floatingInput">Category of medicine</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Email"
                                    required value="<?php echo $result['Email'];?>">
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
                                    placeholder="Location" required value="<?php echo $result['Location'];?>">
                                <label for="floatingInput">Location</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="Key_person" name="Key_person" rows="4"
                                    placeholder="Key_person" required style="height: 100px"><?php echo $result['Key_person'];?></textarea>
                                <label for="floatingInput">Key person</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <?php if (($result['image_link']) != null) :?>
                                <img src="./upload_image/<?php echo $result['image_link'];?>" class="img-thumbnail" alt="preview image">
                                <input type="hidden" id="old_image" name="old_image" value="<?php echo $result['image_link'];?>">
                            <?php else : ?>
                                <img src="./upload_image/question_mark.png" class="img-thumbnail" alt="preview image">
                            <?php endif; ?>
                        </div>
                        <div class="col-10 align-self-center">
                            <input class="form-control" type="file" id="new_image" name="new_image"
                                accept=".jpg, .jpeg, .png" aria-label="file logo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="Edit Manufacturer" class="btn btn-warning w-100">Update data</button>
                </div>
            </form>
        </div>
    </div>
</div>