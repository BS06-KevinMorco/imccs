<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="view-lesson-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">View Topic </h3>
            </div>
            <div class="modal-body">
                <form id="lesson-view" name="lesson-view" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="lesson-view-title" id="lesson-view-title" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="lesson-view-description" id="lesson-view-description" value=""></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Difficulty</label>
                            <select class="form-control form-select" name="lesson-view-difficulty" id="lesson-view-difficulty" required>
                                <option value="" disabled selected>Please Select</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Estimated Completion Time</label>

                            <div class="input-group mb-3">

                                <input class="form-control test" name="lesson-view-estimate-time" aria-describedby="basic-addon2" id="lesson-view-estimate-time" required>
                                <select class="input-group-text" id="basic-addon2">
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
                            <textarea class="form-control" name="lesson-view-paragraph" id="lesson-view-paragraph" placeholder="Enter Brief Topic Description" value=""></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

