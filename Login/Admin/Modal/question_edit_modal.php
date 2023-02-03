<div class="offcanvas offcanvas-start" tabindex="-1" id="edit_question<?php echo $number;?>"
    aria-labelledby="edit_question">
    <form id="edit-new-question" method="POST" action="./database/edit_controller/question_edit.php" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="edit_question">Edit question</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <div class="row">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result['id']?>">
                <div class="col-lg-12 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="question" name="question"
                            placeholder="question" required value="<?php echo $result['question'];?>">
                        <label for="floatingInput">Question</label>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" id="level" name="level"
                            required>
                            <option value="<?php echo $result['level'];?>"><?php echo $result['level'];?></option>
                            <option value="O">O</option>
                            <option value="M">M</option>
                            <option value="C">C</option>
                        </select>
                        <label for="floatingInput">Level</label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Edit</button>
    </form>
</div>