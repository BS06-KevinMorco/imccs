<div class="modal fade" id="update_modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Update Institutional Information</h3>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="update-institution">
                    <div class="row datatable">
                        <div class="col-6">
                            <input type="hidden" name="institution_id" id="institution-id">
                            <label for="name">School Name</label>
                            <input type="text" class="form-control" name="name" id="institution-update-name" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Code</label>
                            <input type="text" class="form-control" name="code" id="institution-update-code" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Street</label>
                            <input type="text" class="form-control" name="street_name" id="institution-update-street" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Barangay</label>
                            <input type="text" class="form-control" name="barangay" id="institution-update-barangay" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Municipality/City</label>
                            <input type="text" class="form-control" name="municipality_city" id="institution-update-municipality-city" value="">
                        </div>
                        <div class="col-6">
                            <label for="name">Province</label>
                            <input type="text" class="form-control" name="province" id="institution-update-province" value="">
                        </div>
                        <label for="">Status</label>
                        <div class="col-12 mt-2">
                            <label class="switch">
                                <input class="slider update-status" data-on name="status" type="checkbox" id="institution-update-active" value="Active" autocomplete="off" aria-invalid="false">
                                <div class="slider round"></div>

                                <input class="slider update-status" name="status" type="checkbox" id="institution-update-inactive" value="Inactive" autocomplete="off" checked>
                            </label>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="update" value="Update" class="btn modal-edit">
            </div>
            </form>
        </div>
    </div>
</div>