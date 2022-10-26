<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="update-lesson-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Update Topic</h3>
            </div>
            <div class="modal-body">
                <form id="lesson-update" name="lesson-update" enctype="multipart/form-data" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <input type="hidden" name="lesson_id" id="lesson-id">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="lesson-update-title" id="lesson-update-title" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="lesson-update-description" id="lesson-update-description" value=""></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Difficulty</label>
                            <select class="form-control form-select" name="lesson-update-difficulty" id="lesson-update-difficulty" required>
                                <option value="" disabled selected>Please Select</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Estimated Completion Time</label>

                            <div class="input-group mb-3">

                                <input class="form-control test" name="lesson-update-estimate-time" aria-describedby="basic-addon2" id="lesson-update-estimate-time" required>
                                <select class="input-group-text" name="lesson-update-unit-time" id="lesson-update-unit-time">
                                    <option value="Minutes">Minutes</option>
                                    <option value="Hours">Hours</option>
                                    <option value="Days">Days</option>
                                    <option value="Weeks">Weeks</option>
                                    <option value="Months">Months</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-12">
                            <label for="name">Brief Description</label>
                            <textarea class="form-control" name="lesson-update-paragraph" id="lesson-update-paragraph" placeholder="Enter Brief Topic Description" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Attach Picture</label>
                            <input type="file" class="form-control" name="lesson-update-pic" id="lesson-update-pic">
                        </div>
                        <label for="">Status</label>
                        <div class="col-12 mt-2">
                        <label class="switch">
                                <input class="slider update-status" data-on name="status" type="checkbox" id="update-status" value="Active" autocomplete="off" aria-invalid="false">
                                <div class="slider round"></div>

                                <input class="slider update-status" name="status" type="checkbox" id="institution-add-inactive" value="Inactive" autocomplete="off" checked>
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="update-lesson" name="update-lesson" value="Save" class="btn modal-edit">
            </div>
            </form>
        </div>
    </div>
</div>