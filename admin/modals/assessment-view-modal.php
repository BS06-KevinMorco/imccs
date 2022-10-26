<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="view-assessment-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">View Assessment Question </h3>
            </div>
            <div class="modal-body">
                <form id="assessment-question-add" name="assessment-view" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="assessment-view-title" id="assessment-view-title" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="assessment-view-description" id="assessment-view-description" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Difficulty</label>
                            <textarea class="form-control" name="assessment-view-difficulty" id="assessment-view-difficulty" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Time Estimate</label>
                            <textarea class="form-control" name="assessment-view-estimate" id="assessment-view-estimate" value=""></textarea>
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

