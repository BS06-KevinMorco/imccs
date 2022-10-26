<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        #header {
            display: none !important;
        }

        .sidebar {
            display: none !important;
        }

        .answer-container {
            background-color: #EAE6E2;
            padding: 2rem 5rem 2rem 5rem;
            border-radius: 20px;
        }

        .answer-container h2 {
            color: #000;
        }


        .animated-container {
            height: 400px;
            width: 100%;
            background-color: #ffffff;

            border-radius: 8px;
            box-shadow: 20px 20px 40px rgba(60, 60, 150, 0.25);
            display: grid;
            place-items: center;
        }

        .choices-container,
        .user-answer-container {
            width: 100%;
            padding: 10px 10px 10px 10px;
            display: flex;
            background-color: #fff;
            align-items: center;
            position: relative;
        }

        .user-wrong-answer {
            color: red;
        }

        .user-right-answer {
            color: green;
        }

        .user-right-answer,
        .user-wrong-answer {
            margin-top: 3rem;
        }


        .choices-container i {
            position: absolute;
            right: 0;
            font-size: 40px;
        }

        .user-answer-container i {
            position: absolute;
            right: 0;
            font-size: 40px;
        }

        .circular-progress {
            position: relative;
            height: 250px;
            width: 250px;
            border-radius: 50%;
            display: grid;
            place-items: center;
        }

        .circular-progress:before {
            content: "";
            position: absolute;
            height: 84%;
            width: 84%;
            background-color: #ffffff;
            border-radius: 50%;
        }

        .value-container {
            position: relative;
            font-family: "Poppins", sans-serif;
            font-size: 50px;
            color: #231c3d;
        }

        h5.right-answer {
            color: green;
            font-weight: bolder;
        }

        h5.wrong-answer {
            color: gray;
            font-weight: bolder;
        }

        h5.wrong-answer i {
            color: #BAD8C6;
            font-weight: bolder;
        }

        .assessment-result-title {
            display: flex;
            align-items: center;
        }

        .assessment-result-title p {
            color: #800000;
            cursor: pointer;
        }
    </style>
</head>

<?php
$user_id =  mysqli_real_escape_string($mysqli, $_GET['user_id']);
$assessment_id =  mysqli_real_escape_string($mysqli, $_GET['assessment_id']);
$rate =  mysqli_real_escape_string($mysqli, $_GET['rate']);
$assessment_title =  mysqli_real_escape_string($mysqli, $_GET['assessment_title']);


?>

<div class="container">
    <div class="assessment-result-title mt-5 mb-3">
        <p onclick="history.back()"><i class="fa-solid fa-arrow-left fa-2x"></i></p>
        <h1 class="title mb-3"><?php echo $assessment_title ?> Result</h1>
    </div>
    <div class="animated-container mb-5">
        <h4>Assessment Percentage</h4>
        <div class="circular-progress">
            <div class="value-container">0%</div>
        </div>
    </div>
</div>
<table class="align-middle mb-0 table table-borderless table-striped table-hover" style="background-color:#FFF5E4;" id="tableList">
    <?php $count = 1; ?>

    <?php


    $countRight = "
            SELECT count_takers.total_taker,count_right.total_right,count_wrong.total_wrong, count_takers.question_id,count_takers.assessment_question FROM ( SELECT COUNT(*) as total_taker, answer.question_id,assessment_question,question_answer,assessment_answer FROM assessment_chosen assessment INNER JOIN answer_tbl answer ON assessment.user_id=answer.user_id INNER JOIN assessment_question_tbl question WHERE question.question_id = answer.question_id AND assessment.assessment_id = answer.assessment_id GROUP BY answer.question_id ) as count_takers
            
            INNER JOIN ( SELECT COUNT(*) as total_right, answer.question_id,assessment_question,question_answer,assessment_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id WHERE question.assessment_answer = answer.question_answer GROUP BY answer.question_id ) as count_right ON count_takers.question_id = count_right.question_id
            
            LEFT JOIN ( SELECT COUNT(*) as total_wrong, answer.question_id,assessment_question,question_answer,assessment_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id WHERE question.assessment_answer != answer.question_answer GROUP BY answer.question_id ) as count_wrong ON count_takers.question_id = count_wrong.question_id";
    $countRightRow = mysqli_query($mysqli, $countRight);

    $selQuestion = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id WHERE question.assessment_id='$assessment_id' AND answer.user_id='$user_id'";

    $selQuestionRow = mysqli_query($mysqli, $selQuestion);
    while ($row = mysqli_fetch_assoc($selQuestionRow)) { ?>

        <div class="container">
            <div class="answer-container mb-4">
                <?php if ($row['mcq'] == 'Yes') { ?>

                    <?php
                    if ($row['question_answer'] != $row['assessment_answer']) { ?>
                        <h2><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>
                        <b>
                            <div class="question-choices-contaier" style="width:100%; padding: 5rem 5rem 5rem 5rem; overflow:hidden;">
                                <div class="question-container mb-4" style="width: 100%; padding:1rem 1rem 1rem 1rem; background-color:#fff">
                                    <h4 class="mb-2" style="font-weight: bold;">
                                        <?php echo $row['assessment_question']; ?></h4>
                                </div>

                                <?php if ($row['assessment_choice1'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">A. <?php echo $row['assessment_choice1']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">A. <?php echo $row['assessment_choice1']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>
                                <?php if ($row['assessment_choice2'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">B. <?php echo $row['assessment_choice2']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">B. <?php echo $row['assessment_choice2']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>


                                <?php if ($row['assessment_choice3'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">C. <?php echo $row['assessment_choice3']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">C. <?php echo $row['assessment_choice3']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>

                                <?php if ($row['assessment_choice4'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">D. <?php echo $row['assessment_choice4']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">D. <?php echo $row['assessment_choice4']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>
                                <h5 class="user-wrong-answer">
                                    <div class="user-answer-container mb-3"><b> Chosen Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-xmark"></i></div>
                                </h5>
                            </div>
                        </b>
                    <?php } else { ?>
                        <h2><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>

                        <b>
                            <div class="question-choices-contaier" style="width:100%; padding: 5rem 5rem 5rem 5rem; overflow:hidden;">
                                <div class="question-container mb-4" style="width: 100%; padding:1rem 1rem 1rem 1rem; background-color:#fff">
                                    <h4 class="mb-2" style="font-weight: bold;">
                                        <?php echo $row['assessment_question']; ?></h4>
                                </div>

                                <?php if ($row['assessment_choice1'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">A. <?php echo $row['assessment_choice1']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">A. <?php echo $row['assessment_choice1']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>
                                <?php if ($row['assessment_choice2'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">B. <?php echo $row['assessment_choice2']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">B. <?php echo $row['assessment_choice2']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>


                                <?php if ($row['assessment_choice3'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">C. <?php echo $row['assessment_choice3']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">C. <?php echo $row['assessment_choice3']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>

                                <?php if ($row['assessment_choice4'] != $row['assessment_answer']) { ?>
                                    <h5 class="wrong-answer">
                                        <div class="choices-container mb-3">D. <?php echo $row['assessment_choice4']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } else { ?>
                                    <h5 class="right-answer">
                                        <div class="choices-container mb-3">D. <?php echo $row['assessment_choice4']; ?><i class="fa-solid fa-square-check"></i></div>
                                    </h5>
                                <?php } ?>
                                <h5 class="user-right-answer">
                                    <div class="user-answer-container mb-3"><b> Chosen Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-check"></i></div>
                                </h5>
                            </div>

                        </b>
                    <?php }
                    ?>
                <?php } else { ?>
                    <h2><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>
                    <div class="question-choices-contaier" style="width:100%; padding: 5rem 5rem 5rem 5rem; overflow:hidden;">

                        <div class="question-container mb-4" style="width: 100%; padding:1rem 1rem 1rem 1rem; background-color:#fff">
                            <h4 class="mb-2" style="font-weight: bold;">
                                <?php echo $row['assessment_question']; ?></h4>
                        </div>
                        <?php if ($row['question_answer'] != $row['assessment_answer']) { ?>
                            <h5 class="user-wrong-answer">
                                <div class="user-answer-container mb-3"><b> Chosen Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-xmark"></i></div>
                            </h5>
                        <?php } else { ?>
                            <h5 class="user-right-answer">
                                <div class="user-answer-container mb-3"><b> Chosen Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-check"></i></div>
                            </h5>

                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
    ?>
</table>




<script>
    let progressBar = document.querySelector(".circular-progress");
    let valueContainer = document.querySelector(".value-container");

    let progressValue = 0;
    let progressEndValue = <?php echo $rate ?>;
    let speed = 5;

    let progress = setInterval(() => {
        if (progressEndValue == 0) {
            clearInterval(progress);
            progressBar.style.background = `conic-gradient(
      #F78080 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg
  )`;
        } else {
            <?php if ($rate >= 75) { ?>
                progressValue++;
                valueContainer.textContent = `${progressValue}%`;
                progressBar.style.background = `conic-gradient(
      #36F213 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg
  )`;
            <?php  } else { ?>
                progressValue++;
                valueContainer.textContent = `${progressValue}%`;
                progressBar.style.background = `conic-gradient(
      #F70000 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg )`;
            <?php } ?>
        }
        if (progressValue == progressEndValue) {
            clearInterval(progress);
        }
    }, speed);
</script>

<script>
    $('td.lol').each(function(i) {
        var column2cell = $($(this));
        if (column2cell.text() == "") {
            column2cell.text('0');

        }
    })
</script>