<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="add-assessment-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Add Assessment </h3>
            </div>
            <div class="modal-body">
                <form id="assessment-add" name="assessment-add" enctype="multipart/form-data" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="assessment-add-title" id="assessment-add-title" placeholder="Enter Question Title" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="assessment-add-description" id="assessment-add-description" placeholder="Enter Question Description" value=""></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Difficulty</label>
                            <select class="form-control form-select" name="assessment-add-difficulty" id="assessment-add-difficulty" required>
                                <option value="" disabled selected>Please Select</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Estimated Completion Time</label>

                            <div class="input-group mb-3">

                                <input class="form-control test" name="assessment-add-estimate-time" aria-describedby="basic-addon2" id="assessment-add-estimate-time" required>
                                <select class="input-group-text" name="assessment-add-unit-time" id="assessment-add-unit-time">
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
                            <input type="file" class="form-control" name="img" id="assessment-add-title">
                        </div>

                        <label for="">Status</label>

                        <div class="col-12 mt-2">
                            <label class="switch">
                                <input class="slider add-status" data-on name="status" type="checkbox" id="assessment-add-active" value="Active" autocomplete="off" aria-invalid="false">
                                <div class="slider round"></div>

                                <input class="slider add-status" name="status" type="checkbox" id="assessment-add-inactive" value="Inactive" autocomplete="off" checked>
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="save-assessment-question" name="save-assessment-question" value="Save" class="btn modal-edit">

            </div>
            </form>
        </div>
    </div>
</div>
<script>
   /* // THIS CONSTANT REPRESENTS THE <select> ELEMENT
    const theSelect = document.getElementById('basic-addon2')

    // THIS LINE BINDS THE input EVENT TO THE ABOVE select ELEMENT
    // IT WILL BE EXECUTED EVERYTIME THE USER SELECTS AN OPTION
    theSelect.addEventListener('input', function() {


        sel1 = document.getElementById("basic-addon2");
        var selected = sel1.options[sel1.selectedIndex].value;
        input = document.getElementById("assessment-add-estimate-time");
        input.value = input.value + " " + selected;

    })*/
</script>