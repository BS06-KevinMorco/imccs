<?php
if (isset($_GET['assessment_id'])) {

    $user_id =  mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $assessment_id =  mysqli_real_escape_string($mysqli, $_GET['assessment_id']);

    $selQuestion = "SELECT *
                            FROM assessment_question_tbl WHERE assessment_id = '$assessment_id' ";
    $selQuestionRow = mysqli_query($mysqli, $selQuestion);
}

?>

<style>
 
</style>

<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>Take your Assessment</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container page-container mt-4">

        <form id="assessment-exam" action="javascript:void(0)" class="submit-answer" method="post">
            <?php $count = 0; ?>

            <?php while ($row = mysqli_fetch_assoc($selQuestionRow)) { ?>
                <?php $questId = $row['question_id']; ?>
                <?php $count++ ?>

                <div class="assessment-form mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4" style="border-color:maroon ;">

                                <div class="d-flex justify-content-between align-items-center card-header text-white px-4 py-4" style="background-color:maroon ;">
                                    <span>Question <?php echo $count ?></span>
                                </div>
                                <h4 class="px-4 py-4"><?php echo $row['assessment_question']; ?></h4>
                                <div>
                                    <?php if($row['mcq'] == "Yes") { ?>
                                    <input type="radio" class="one" name="answer[<?php echo $questId; ?>] [correct]" id="<?php echo $row['assessment_choice1']; ?> <?php echo $row['question_id']; ?>" value="<?php echo $row['assessment_choice1']; ?>">
                                    <label for="<?php echo $row['assessment_choice1']; ?> <?php echo $row['question_id']; ?>" class="answer first">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> <?php echo $row['assessment_choice1']; ?> </span> </div>
                                    </label>

                                    <input type="radio" class="two" name="answer[<?php echo $questId; ?>] [correct]" id="<?php echo $row['assessment_choice2']; ?> <?php echo $row['question_id']; ?>" value="<?php echo $row['assessment_choice2']; ?>">
                                    <label for="<?php echo $row['assessment_choice2']; ?> <?php echo $row['question_id']; ?>" class="answer second">
                                        <div class="course"> <span class="circle"></span>
                                            <span class="subject"> <?php echo $row['assessment_choice2']; ?> </span>
                                        </div>
                                    </label>

                                    <input type="radio" class="three" name="answer[<?php echo $questId; ?>] [correct]" id="<?php echo $row['assessment_choice3']; ?> <?php echo $row['question_id']; ?>" value="<?php echo $row['assessment_choice3']; ?>">
                                    <label for="<?php echo $row['assessment_choice3']; ?> <?php echo $row['question_id']; ?>" class="answer third">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> <?php echo $row['assessment_choice3']; ?> </span>
                                        </div>
                                    </label>

                                    <input type="radio" class="four" name="answer[<?php echo $questId; ?>] [correct]" id="<?php echo $row['assessment_choice4']; ?> <?php echo $row['question_id']; ?>" value="<?php echo $row['assessment_choice4']; ?>">
                                    <label for="<?php echo $row['assessment_choice4']; ?> <?php echo $row['question_id']; ?>" class="answer forth">
                                        <div class="course"> <span class="circle"></span> <span class="subject"> <?php echo $row['assessment_choice4']; ?> </span>
                                        </div>
                                    </label>
                                    <?php }else{?>
                                        <label for="">Test</label>
                                        <input type="text" name="text_answer[<?php echo $questId; ?>] [correct]" class="form-control">
                                        <?php }?>
                                    <input type="hidden" name="user_id" id="user-id" value="<?php echo $user_id ?>">
                                    <input type="hidden" name="assessment_id" id="assessment-id" value="<?php echo $row['assessment_id']; ?>">
                                    <input type="hidden" name="question_id" id="question-id" value="<?php echo $row['question_id']; ?>">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            <?php }
            ?>
            <div class="col-12">
                <div class="d-flex justify-content-center"> <input type="submit" class="btn btn-custom-primary px-4 py-2 fw-bold" value="Submit"> </div>
            </div>
        </form>
    </div>

</section>

<script>
    /* STUDENT PROGRESS ASSESSMENT */

    $('.submit-answer').submit(function() {
        event.preventDefault();

        var user_id = $('#user-id').val();
        var assessment_id = $('#assessment-id').val();
        var answer = [];
        var text_answer = [];
        var question_id = [];


        $('input[name^="answer"]:checked').each(function() {
            answer.push(this.value);
        });
        $('input[name^="text_answer"]').each(function() {
            text_answer.push(this.value);
        });
        $('input[name^="question_id"]').each(function() {
            question_id.push(this.value);
        });

        var question_answer = $.merge($.merge([], answer), text_answer);

        console.log(user_id);
        console.log(assessment_id);
        console.log(question_id);
        console.log(answer);


        Swal.fire({
            title: 'Are you sure you want to submit?',
            text: "Press CONFIRM to proceed!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'CONFIRM',
            reverseButtons: true,
            allowOutsideClick: false,
            customClass: {
                confirmButton: 'edit-primary-button'
            },

        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "query/submit-answer.php",
                    data: {
                        user_id: user_id,
                        assessment_id: assessment_id,
                        question_id: question_id,
                        answer: question_answer

                    },
                    dataType: 'json',

                    success: function(data) {
                        console.log(data)
                        console.log(data, typeof data)
                        if (data == 'Taken') {
                            Swal.fire({
                                title: 'Quiz Already Taken',
                                text: "You can only take this once",
                                icon: 'error',
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK'
                            })
                        } else if (data == 'NotTaken') {

                            Swal.fire({
                                title: 'Quiz Assessment is Finished',
                                text: "Click ok to check the result",
                                icon: 'success',
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                window.location = 'home-student.php?page=result&assessment_id=' + assessment_id;
                            })
                        }
                    },
                    error: function(xhr, status, error, data) {
                        console.log(xhr)
                        console.log(error);
                        console.log(data);

                    }
                });
            }
        });

    });
    /* END STUDENT PROGRESS ASSESSMENT */
</script>