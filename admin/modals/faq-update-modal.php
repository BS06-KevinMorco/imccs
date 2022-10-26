<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="update-faq-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Add FAQ's </h3>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="update-faq" name="form1" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <input type="hidden" id="faq-id">
                            <label for="name">Overview</label>
                            <input type="text" class="form-control" name="faq-update-overview" id="faq-update-overview" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" name="faq-update-description" id="faq-update-description" value="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="save-faq" name="save" value="Save" class="btn modal-edit">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close
            </div>
            </form>
        </div>
    </div>
</div>