<script>
    function check() {
        document.getElementById("assessment-choice-id").value = document.getElementById("assessment-choice-add-title").value;
    }
</script>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="view-assessment-choice-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Add Assessment </h3>
            </div>
            <div class="modal-body">
                <form id="assessment-choice-add" name="assessment-choice-add" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <?php
                            $selQuestion = "SELECT *
                            FROM assessment_tbl";
                            $selQuestionRow = mysqli_query($mysqli, $selQuestion);
                            ?>

                            <label for="name">Title of Assessment</label>
                            <input type="text" class="form-control" name="assessment-choice-view-title" id="assessment-choice-view-title">

                           

                        </div>
                            <input type="text" name="assessment_id" id="assessment-choice-id" />
                        <div class="col-12">
                            <label for="name">Assessment Question</label>
                            <textarea class="form-control" name="assessment-choice-view-question" id="assessment-choice-view-question" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 1</label>
                            <input type="text" class="form-control" name="assessment-choice-view-ch1" id="assessment-choice-view-ch1" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 2</label>
                            <input class="form-control" name="assessment-choice-view-ch2" id="assessment-choice-view-ch2" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 3</label>
                            <input type="text" class="form-control" name="assessment-choice-view-ch3" id="assessment-choice-view-ch3" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 4</label>
                            <input class="form-control" name="assessment-choice-view-ch4" id="assessment-choice-view-ch4" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Correct Answer</label>
                            <input class="form-control" name="assessment-choice-view-answer" id="assessment-choice-view-answer" value=""></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="save-assessment" name="save-assessment" value="Save" class="btn modal-edit">

            </div>
            </form>
        </div>
    </div>
</div>
<script>
    // THIS CONSTANT REPRESENTS THE <select> ELEMENT
    const theSelect = document.getElementById('basic-addon2')

    // THIS LINE BINDS THE input EVENT TO THE ABOVE select ELEMENT
    // IT WILL BE EXECUTED EVERYTIME THE USER SELECTS AN OPTION
    theSelect.addEventListener('input', function() {


        sel1 = document.getElementById("basic-addon2");
        var selected = sel1.options[sel1.selectedIndex].value;
        input = document.getElementById("assessment-add-estimate-time");
        input.value = input.value + " " + selected;

    })

    
</script>