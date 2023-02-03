<div class="offcanvas offcanvas-start" tabindex="-1" id="edit_inspector<?php echo $number;?>"
    aria-labelledby="edit_inspector">
    <form id="edit-new-inspector" method="POST" action="./database/edit_controller/inspector_edit.php" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="edit_inspector">Edit inspector</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <div class="row">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result['id']?>">
                <div class="col-lg-6 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Inspector_name" name="Inspector_name"
                            placeholder="Inspector_name" required value="<?php echo $result['name'];?>">
                        <label for="floatingInput">Inspector name</label>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" id="Division" name="Division"
                            required>
                            <option value="<?php echo $result['Division'];?>"><?php echo $result['Division'];?></option>
                            <option value="PMCD">PMCD</option>
                            <option value="Registration Division">Registration Division</option>
                            <option value="PPS">PPS</option>
                        </select>
                        <label for="floatingInput">Division</label>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <?php if (($result['picture']) != null) :?>
                        <img src="./image/Officer_image/<?php echo $result['picture'];?>" class="img-thumbnail"
                            alt="preview image">
                        <input type="hidden" id="old_image" name="old_image" value="<?php echo $result['picture'];?>">
                    <?php else : ?>
                        <img src="./image/Officer_image/question_mark.png" class="img-thumbnail" alt="preview image">
                    <?php endif; ?>
                    <input type="hidden" id="old_image" name="old_image" value="<?php echo $result['picture'];?>">
                </div>
                <div class="col-lg-8 col-12">
                    <div class="mb-3">
                        <label for="Avatar" class="form-label">Avatar</label>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" id="new_Avatar" name="new_Avatar"
                            aria-label="Avatar file">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Edit</button>
    </form>
</div>