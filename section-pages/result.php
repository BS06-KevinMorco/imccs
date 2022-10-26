<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<head>
    <style>
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

        .choices-container,
        .user-answer-container,
        .text-answer-container {
            width: 100%;
            padding: 10px 10px 10px 10px;
            display: flex;
            background-color: #fff;
            align-items: center;
            position: relative;
        }
        .text-answer-container{
            color: green;
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

        .text-answer-container i{
            position: absolute;
            right: 0;
            font-size: 40px;
        }

        .answer-container {
            background-color: #EAE6E2;
            padding: 2rem 5rem 2rem 5rem;
            border-radius: 20px;
            margin: 0 0 5rem;

        }

        .answer-container h2 {
            color: #000;
        }

        .question-choices-container {
            width: 100%;
            padding: 5rem 5rem 5rem 5rem;
            overflow: hidden;
        }

        .question-container {
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
            background-color: #fff
        }

        .assessment-result-title {
            display: flex;
            align-items: center;
        }

        .assessment-result-title p {
            color: #800000;
            cursor: pointer;
        }

        .score-container {
            height: 200px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 20px 20px 40px rgba(60, 60, 150, 0.25);

        }

        .animated-container {
            height: calc(100% - 24px);
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 20px 20px 40px rgba(60, 60, 150, 0.25);
            display: grid;
            place-items: center;
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

        .medal-pass{
            color: gold;
        }

        .medal-fail{
            color: brown;
        }

        .rectangle-pass{
            color: green;
        }
        .rectangle-fail{
            color: red;
        }



        @media (min-width:0px) and (max-width:768px) {
            .container {
                padding: 0;
                margin: 0;
            }

            body {
                padding: 0;
            }

            .animated-container {
                height: 100% !important;
                padding: 1rem 1rem 1rem 1rem;
                margin-bottom: 5rem !important;

            }

            .question-number {
                text-align: center;
            }

            .answer-container {
                background-color: #EAE6E2;
                padding: 1rem 1rem 1rem 1rem;
                border-radius: 20px;
                margin: 5rem 0 5rem;
            }

            .question-choices-container {
                width: 100%;
                padding: 0;
                overflow: hidden;
            }

            h5.right-answer {
                font-size: 12px;
            }

            h5.wrong-answer {
                font-size: 12px;
            }

            .user-answer-container {
                font-size: 12px;
            }

            .user-answer-container span {
                margin-right: 100px;
            }


            .choices-container i {
                right: 0;
                font-size: 40px;
            }



            .user-answer-container i {
                right: 0;
                font-size: 40px;
            }

            .question-container {
                width: 100%;
                padding: none !important;
                align-items: none !important;
                background-color: #fff !important;
                text-align: justify;
            }

            .question-container h4 {
                font-size: 18px;

            }

            .choices-container {
                padding-right: 50px;
            }



            .topic-view-nav {
                margin-top: 450px;
            }
        }
    </style>
</head>


<?php
if (isset($_SESSION['user_id'])) {

    $user_id =  mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $assessment_id =  mysqli_real_escape_string($mysqli, $_GET['assessment_id']);

    $queryChosenAssessment = "SELECT * FROM assessment_tbl WHERE assessment_id='$assessment_id' ";


    $selChosenAssessment = mysqli_query($mysqli, $queryChosenAssessment);

    $rowChosenAssessment = mysqli_fetch_assoc($selChosenAssessment);
}
?>




<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>Results: <?php echo $rowChosenAssessment['title']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="overflow: hidden;">

    <?php
    $queryScore = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  AND question.assessment_answer = answer.question_answer  WHERE question.assessment_id='$assessment_id' AND answer.user_id='$user_id'";
    $resultScore = mysqli_query($mysqli, $queryScore);
    $rowCount = mysqli_num_rows($resultScore);
    $selOver = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  WHERE question.assessment_id='$assessment_id' AND answer.user_id='$user_id'";
    $resultOver = mysqli_query($mysqli, $selOver);
    $rowCountOver = mysqli_num_rows($resultOver);

    $ans = number_format($rowCount / $rowCountOver * 100);


    ?>

    <?php
    $checkAssessmentChosen = mysqli_query($mysqli, "select * FROM score WHERE user_id = '$user_id'  AND assessment_id = '$assessment_id' ");
    $rowcount = mysqli_num_rows($checkAssessmentChosen);

    if ($rowcount == 0) {
        $insert3 = mysqli_query($mysqli, "INSERT INTO score(user_id,assessment_id,scores) VALUES ('$user_id','$assessment_id','$rowCount')");
    } else if ($rowcount > 0) {
        mysqli_query($mysqli, "ROLLBACK");
    }
    ?>

    <?php if ($ans >= 75) { ?>

        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="score-container mt-4">
                        <h3 class="pt-4 px-4">Score</h3>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa-solid fa-medal medal-pass fa-5x pt-4 px-4"></i>
                                <h1><?php echo $rowCount ?>/<?php echo $rowCountOver ?> </h1>

                            </div>
                        </div>
                    </div>
                    <div class="score-container mt-4">
                        <h3 class="pt-4 px-4">Remarks</h3>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa-solid fa-rectangle-list rectangle-pass fa-5x pt-4 px-4"></i>
                                <h5><b> Congrats!, You've Passed </b> <br> <span class="mt-2"> You are Certified Cyber Secured </span></br></h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="animated-container mt-4">
                        <h3>Score Percentage</h3>
                        <div class="circular-progress">
                            <div class="value-container">0%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="score-container mt-4">
                        <h3 class="pt-4 px-4">Score</h3>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa-solid fa-medal medal-fail fa-5x pt-4 px-4"></i>
                                <h1><?php echo $rowCount ?>/<?php echo $rowCountOver ?> </h1>

                            </div>
                        </div>
                    </div>
                    <div class="score-container mt-4">
                        <h3 class="pt-4 px-4">Remarks</h3>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa-solid fa-rectangle-list rectangle-fail fa-5x pt-4 px-4"></i>
                                <h5> <b> You Failed, Cheer Up! </b> <br> <span class="mt-2"> You can always take time in reading topics to be better </span></br></h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="animated-container mt-4">
                        <h3>Score Percentage</h3>
                        <div class="circular-progress">
                            <div class="value-container">0%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php } ?>

    <div class="container">
        <?php $count = 1; ?>

        <?php
        $selQuestion = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id WHERE question.assessment_id='$assessment_id' AND answer.user_id='$user_id'";

        $selQuestionRow = mysqli_query($mysqli, $selQuestion);
        while ($row = mysqli_fetch_assoc($selQuestionRow)) { ?>

            <div class="answer-container">
                <?php if ($row['mcq'] == 'Yes') { ?>

                    <?php
                    if ($row['question_answer'] != $row['assessment_answer']) { ?>
                        <h2 class="question-number mb-4"><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>
                        <b>
                            <div class="question-choices-container">
                                <div class="question-container mb-4">
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
                                    <div class="user-answer-container mb-3"><b> Your Answer:</b> <span><?php echo $row['question_answer']; ?></span><i class="fa-solid fa-square-xmark"></i></div>
                                </h5>
                            </div>
                        </b>
                    <?php } else { ?>
                        <h2 class="question-number mb-4"><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>

                        <b>
                            <div class="question-choices-container">
                                <div class="question-container mb-4">
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
                                    <div class="user-answer-container mb-3"><b> Your Answer:</b> <span><?php echo $row['question_answer']; ?></span><i class="fa-solid fa-square-check"></i></div>
                                </h5>
                            </div>

                        </b>
                    <?php }
                    ?>
                <?php } else { ?>
                    <h2><i class="fa-solid fa-circle-question"></i> Question <?php echo $count++ ?></h2>
                    <div class="question-choices-container">

                        <div class="question-container mb-4">
                            <h4 class="mb-2" style="font-weight: bold;">
                                <?php echo $row['assessment_question']; ?></h4>
                        </div>
                        <div class="text-answer-container mb-3"><?php echo $row['assessment_answer']; ?><i class="fa-solid fa-square-check"></i></div>

                        <?php if ($row['question_answer'] != $row['assessment_answer']) { ?>
                            <h5 class="user-wrong-answer">
                                <div class="user-answer-container mb-3"><b> Your Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-xmark"></i></div>
                            </h5>
                        <?php } else { ?>
                            <h5 class="user-right-answer">
                                <div class="user-answer-container mb-3"><b> Your Answer:</b> <?php echo $row['question_answer']; ?><i class="fa-solid fa-square-check"></i></div>
                            </h5>

                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        <?php }
        ?>

    </div>
</section>

<script>
    let progressBar = document.querySelector(".circular-progress");
    let valueContainer = document.querySelector(".value-container");

    let progressValue = 0;
    let progressEndValue = <?php echo $ans ?>;
    let speed = 5;

    let progress = setInterval(() => {
        if (progressEndValue == 0) {
            clearInterval(progress);
            progressBar.style.background = `conic-gradient(
      #F78080 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg
  )`;
        } else {
            <?php if ($ans >= 75) {?>
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