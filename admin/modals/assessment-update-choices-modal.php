<script>
    function check() {
        document.getElementById("assessment-choice-update-id").value = document.getElementById("assessment-choice-update-title").value;
    }
</script>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="update-assessment-choice-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Update Assessment Choices </h3>
            </div>
            <div class="modal-body">
                <form id="assessment-choice-update" name="assessment-choice-update" method="post">
                    <div class="row datatable">
                        <div class="col-12">
                            <?php
                            $selQuestion = "SELECT *
                            FROM assessment_tbl";
                            $selQuestionRow = mysqli_query($mysqli, $selQuestion);
                            ?>

                            <label for="name">Title of Assessment</label>
                            <select class="form-select" aria-label="Default select example" onChange="check();" name="assessment-choice-update-title" id="assessment-choice-update-title">
                                <?php while ($row = mysqli_fetch_assoc($selQuestionRow)) {
                                ?>
                                    <option value="<?php echo  $row['assessment_id'] . '|' . $row['title']; ?>"><?php echo $row['title'] ?></option>

                                <?php } ?>

                            </select>

                        </div>
                            <input type="hidden" name="assessment_id" id="assessment-choice-update-id" />
                            <input type="hidden" name="question_id" id="assessment-choice-question-id" />

                        <div class="col-12">
                            <label for="name">Assessment Question</label>
                            <textarea class="form-control" name="assessment-choice-update-question" id="assessment-choice-update-question" value=""></textarea>
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 1</label>
                            <input type="text" class="form-control" name="assessment-choice-update-ch1" id="assessment-choice-update-ch1" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 2</label>
                            <input class="form-control" name="assessment-choice-update-ch2" id="assessment-choice-update-ch2" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 3</label>
                            <input type="text" class="form-control" name="assessment-choice-update-ch3" id="assessment-choice-update-ch3" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Choice 4</label>
                            <input class="form-control" name="assessment-choice-update-ch4" id="assessment-choice-update-ch4" value="">
                        </div>
                        <div class="col-12">
                            <label for="name">Correct Answer</label>
                            <input class="form-control" name="assessment-choice-update-answer" id="assessment-choice-update-answer" value="">
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