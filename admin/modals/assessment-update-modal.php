<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="update-assessment-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Update Assessment Description </h3>
            </div>
            <div class="modal-body">
                <form id="assessment-update" name="assessment-update" enctype="multipart/form-data" method="post" novalidate>
                    <div class="row datatable">
                        <div class="col-12">
                            <input type="hidden" name="assessment_id" id="assessment-id">

                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="assessment-update-title" id="assessment-update-title" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="assessment-update-description" id="assessment-update-description" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Difficulty</label>
                            <textarea class="form-control" name="assessment-update-difficulty" id="assessment-update-difficulty" value=""></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Estimated Completion Time</label>

                            <div class="input-group mb-3">

                                <input class="form-control test" name="assessment-update-estimate" aria-describedby="basic-addon2" id="assessment-update-estimate" required>
                                <select class="input-group-text" name="assessment-update-unit-time" id="assessment-update-unit-time">
                                    <option value="Minutes">Minutes</option>
                                    <option value="Hours">Hours</option>
                                    <option value="Days">Days</option>
                                    <option value="Weeks">Weeks</option>
                                    <option value="Months">Months</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-12">
                            <label for="name">Pic</label>
                            <input type="file" class="form-control" name="update_img" id="assessment-update-pic">
                        </div>
                        <label for="">Status</label>
                        <div class="col-12 mt-2">
                            <label class="switch">
                                <input class="slider update-status" data-on name="status" type="checkbox" id="assessment-update-active" value="Active" autocomplete="off" aria-invalid="false">
                                <div class="slider round"></div>

                                <input class="slider update-status" name="status" type="checkbox" id="assessment-update-inactive" value="Inactive" autocomplete="off" checked>
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="update-assessment-question" name="update-assessment-question" value="Save" class="btn modal-edit">

            </div>
            </form>
        </div>
    </div>
</div>