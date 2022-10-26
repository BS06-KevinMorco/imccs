<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="add_institution_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Add Educational Institution </h3>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="fupForm" name="form1" method="post">
                    <div class="row datatable">
                        <div class="col-6">
                            <label for="name">School Name</label>
                            <input type="text" class="form-control" name="institution-add-name" id="institution-add-name" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Street</label>
                            <input type="text" class="form-control" name="institution-add-street" id="institution-add-street" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Barangay</label>
                            <input type="text" class="form-control" name="institution-add-barangay" id="institution-add-barangay" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Municipality/City</label>
                            <input type="text" class="form-control" name="institution-add-municipality-city" id="institution-add-municipality-city" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Province</label>
                            <input type="text" class="form-control" name="institution-add-province" id="institution-add-province" value="">
                        </div>
                        
                        <label for="">Status</label>
                        <div class="col-12 mt-2">
                        <label class="switch">
                                <input class="slider add-status" data-on name="status" type="checkbox" id="institution-add-active" value="Active" autocomplete="off" aria-invalid="false">
                                <div class="slider round"></div>

                                <input class="slider add-status" name="status" type="checkbox" id="institution-add-inactive" value="Inactive" autocomplete="off" checked>
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type = "submit" id="save-institution" name="save" value="Save" class="btn modal-edit">
            </div>
            </form>
        </div>
    </div>
</div>

