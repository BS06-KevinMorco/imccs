<?php
$assessment_id =  mysqli_real_escape_string($mysqli, $_GET['assessment_id']);
$title =  mysqli_real_escape_string($mysqli, $_GET['title']);
?>
<?php
$countSummaryAssessment = "
SELECT count_takers.status, IF(choice1.total_choice_1 IS NULL, 0, choice1.total_choice_1) AS total_choice_1,IF(choice2.total_choice_2 IS NULL, 0, choice2.total_choice_2) AS total_choice_2,IF(choice3.total_choice_3 IS NULL, 0, choice3.total_choice_3) AS total_choice_3, IF(choice4.total_choice_4 IS NULL, 0, choice4.total_choice_4) AS total_choice_4,IF(count_right.total_right IS NULL, 0, count_right.total_right) AS total_right,count_takers.total_taker,IF(count_wrong.total_wrong IS NULL, 0, count_wrong.total_wrong) AS total_wrong,count_takers.question_id,count_takers.assessment_question,count_takers.assessment_choice1,count_takers.assessment_choice2,count_takers.assessment_choice3,count_takers.assessment_choice4, count_takers.assessment_answer, count_takers.mcq,count_takers.question_answer FROM ( SELECT COUNT(*) as total_taker, answer.question_id,assessment_question,assessment_choice1,assessment_choice2,assessment_choice3,assessment_choice4,question_answer,assessment_answer,status,mcq FROM assessment_chosen assessment INNER JOIN answer_tbl answer ON assessment.user_id=answer.user_id INNER JOIN assessment_question_tbl question INNER JOIN assessment_tbl as lists ON lists.assessment_id ='$assessment_id'  WHERE question.question_id = answer.question_id  AND assessment.assessment_id ='$assessment_id'  AND answer.assessment_id ='$assessment_id'  GROUP BY answer.question_id ) as count_takers
            
LEFT JOIN ( SELECT COUNT(*) as total_right, answer.question_id,assessment_question,question_answer,assessment_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  WHERE question.assessment_answer = answer.question_answer GROUP BY answer.question_id ) as count_right ON count_takers.question_id = count_right.question_id

LEFT JOIN ( SELECT COUNT(answer.user_id) as total_choice_1,answer.question_id,question.assessment_question,question.assessment_choice1,question.assessment_choice2,question.assessment_choice3,question.assessment_choice4, question_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer INNER JOIN assessment_chosen assessment WHERE question.assessment_choice1 = answer.question_answer AND assessment.user_id = answer.user_id AND assessment.assessment_id ='$assessment_id'  AND answer.assessment_id ='$assessment_id'  GROUP BY answer.question_answer ) as choice1 ON count_takers.question_id = choice1.question_id

 LEFT JOIN ( SELECT COUNT(answer.user_id) as total_choice_2,answer.question_id,question.assessment_question,question.assessment_choice1,question.assessment_choice2,question.assessment_choice3,question.assessment_choice4, question_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer INNER JOIN assessment_chosen assessment WHERE question.assessment_choice2 = answer.question_answer AND assessment.user_id = answer.user_id AND assessment.assessment_id ='$assessment_id'  AND answer.assessment_id ='$assessment_id'  GROUP BY answer.question_answer ) as choice2 ON count_takers.question_id = choice2.question_id
 
 LEFT JOIN ( SELECT COUNT(answer.user_id) as total_choice_3,answer.question_id,question.assessment_question,question.assessment_choice1,question.assessment_choice2,question.assessment_choice3,question.assessment_choice4, question_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer INNER JOIN assessment_chosen assessment WHERE question.assessment_choice3 = answer.question_answer AND assessment.user_id = answer.user_id AND assessment.assessment_id ='$assessment_id'  AND answer.assessment_id ='$assessment_id'  GROUP BY answer.question_answer ) as choice3 ON count_takers.question_id = choice3.question_id
 
 LEFT JOIN ( SELECT COUNT(answer.user_id) as total_choice_4,answer.question_id,question.assessment_question,question.assessment_choice1,question.assessment_choice2,question.assessment_choice3,question.assessment_choice4, question_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer INNER JOIN assessment_chosen assessment WHERE question.assessment_choice4 = answer.question_answer AND assessment.user_id = answer.user_id AND assessment.assessment_id ='$assessment_id'  AND answer.assessment_id ='$assessment_id'  GROUP BY answer.question_answer ) as choice4 ON count_takers.question_id = choice4.question_id

LEFT JOIN ( SELECT COUNT(*) as total_wrong, answer.question_id,assessment_question,question_answer,assessment_answer FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id WHERE question.assessment_answer != answer.question_answer GROUP BY answer.question_id ) as count_wrong ON count_takers.question_id = count_wrong.question_id
";

$countSummaryAssessmentRow = mysqli_query($mysqli, $countSummaryAssessment);

//COUNTS THE TOTAL OF ASSESSMENT TAKERS 
$countOneRow = mysqli_query($mysqli, $countSummaryAssessment);
$countOneRows = mysqli_fetch_assoc($countOneRow);
//END

//COUNTS THE TOTAL NUMBER OF QUESIONS PER ASSESSMENT 
$questionItem = "SELECT Count(question_id) as total_question
from assessment_question_tbl WHERE assessment_id = '$assessment_id'";
$countQuestionItem = mysqli_query($mysqli, $questionItem);
$returnQuestionItem = mysqli_fetch_assoc($countQuestionItem);
//END


//COUNTS THE TOTAL OF SUM OF SCORES OF THE ASSESSMENT TAKERS 
$overallScore = " SELECT SUM(scores) as total_answer FROM (SELECT answer.user_id, COUNT(answer.user_id) as scores FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  AND question.assessment_answer = answer.question_answer INNER JOIN assessment_chosen assessment ON assessment.user_id =  answer.user_id  WHERE answer.assessment_id= '$assessment_id' AND assessment.assessment_id = '$assessment_id' GROUP BY answer.user_id  ) as A";
$resultScore = mysqli_query($mysqli, $overallScore);
$overallSumScore = mysqli_fetch_assoc($resultScore);
//END

//COUNTS THE TOTAL NUMBER OF QUESTIONS PER ASSESSMENT TAKEN BY ALL ASSESSMENT TAKERS
$countPercentageAverage = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id INNER JOIN assessment_chosen chosen ON chosen.assessment_id = answer.assessment_id WHERE question.assessment_id='$assessment_id' AND answer.user_id=chosen.user_id";
$percentageAverage = mysqli_query($mysqli, $countPercentageAverage);
$returnPercentageAverage = mysqli_num_rows($percentageAverage);
//END


$assessment_rate = number_format($overallSumScore['total_answer'] / $returnPercentageAverage * 100);
$averageScore = number_format($overallSumScore['total_answer'] / $countOneRows['total_taker']);


?>

<?php
$data = array();
$countTextAnswer = "SELECT * FROM assessment_question_tbl question  JOIN answer_tbl answer ON question.question_id = answer.question_id AND question.assessment_id = answer.assessment_id WHERE question.mcq = 'No' ";
$textAnswer = mysqli_query($mysqli, $countTextAnswer);

while ($returnTextAnswerRow = mysqli_fetch_assoc($textAnswer)) {

    $data[] = array(
        'answer' => $returnTextAnswerRow['question_answer'],
    );
} ?>



<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

    <style>
        #header {
            display: none !important;
        }

        .sidebar {
            display: none !important;
        }

        .assessment-statistics h1,
        h4 {
            font-weight: bolder;
        }

        .assessment-statistics-title {
            display: flex;
            align-items: center;
        }

        .assessment-statistics-title p {
            color: #800000;
            cursor: pointer;
        }


        .assessment-container {
            background-color: #FFF5E4;
            padding: 60px 15px 70px 40px;
            border-radius: 10px;
        }

        .assessment-container h4 {
            color: #000;
        }

        .statistics-container {
            background-color: #fff;
            padding: 40px 15px 40px 20px;
            border-radius: 20px;
            text-align: center;
        }

        .statistics-container h1 {
            font-weight: bolder;
            color: #800000;
        }

        .choice-container {
            display: flex;
            align-items: center;
        }

        .dot-indentifier {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: block;
            float: left;
        }

        .dot-indentifier.choice1 {
            background-color: #990099;
        }

        .dot-indentifier.choice2 {
            background-color: #109618;
        }

        .dot-indentifier.choice3 {
            background-color: #FF9900;
        }

        .dot-indentifier.choice4 {
            background-color: #DC3912;
        }

        svg>g>g.google-visualization-tooltip {
            pointer-events: none
        }

        .admin-piechart {
            width: 500px;
            height: 200px;
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

        .right-answer {
            color: green;
            font-weight: bolder;
            font-size: 14px;

        }

        .wrong-answer {
            color: gray;
            font-weight: bolder;
            font-size: 13px;

        }
    </style>
</head>

<div class="assessment-statistics jumbotron pt-5 pb-5" style="background-color: #F4F6F7;">

    <div class="container mt-5 mb-3">
        <div class="assessment-statistics-title">
            <p onclick="history.back()"><i class="fa-solid fa-arrow-left fa-2x"></i></p>

            <h1 class="title mb-3"><?php echo $title ?> Statistics</h1>
        </div>
        <div class="statistics-container d-flex justify-content-around mb-5">
            <div class="statistics-item">
                <h1><?php echo $countOneRows['total_taker'] ?></h1>
                <h4>Assessment Takers</h4>
            </div>

            <div class="statistics-item">
                <h1><?php echo $returnQuestionItem['total_question']  ?></h1>
                <h4>Total Question</h4>
            </div>

            <div class="statistics-item">
                <h1><?php echo $averageScore  ?></h1>
                <h4>Average Score</h4>
            </div>

            <div class="statistics-item">
                <h1><?php echo $countOneRows['status'] ?></h1>
                <h4>Assessment Status</h4>
            </div>

        </div>
        <div class="animated-container mb-5">
            <h4>Assessment Average Percentage</h4>
            <div class="circular-progress">
                <div class="value-container">0%</div>
            </div>
        </div>


        <?php $count = 1; ?>

        <?php
        while ($displayChoiceRow = mysqli_fetch_assoc($countSummaryAssessmentRow)) { ?>
            <?php $ans = number_format($displayChoiceRow['total_right'] / $displayChoiceRow['total_taker'] * 100);

            ?>
            <?php $pass = number_format($displayChoiceRow['total_right'] / $displayChoiceRow['total_taker'] * 100); ?>

            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Question1', 'Number1'],
                        <?php
                        if ($displayChoiceRow['mcq'] == 'Yes') {
                            echo "['" . $displayChoiceRow["assessment_choice1"] . "', " . $displayChoiceRow["total_choice_1"] . "],", "['" . $displayChoiceRow["assessment_choice2"] . "', " . $displayChoiceRow["total_choice_2"] . "],", "['" . $displayChoiceRow["assessment_choice3"] . "', " . $displayChoiceRow["total_choice_3"] . "],", "['" . $displayChoiceRow["assessment_choice4"] . "', " . $displayChoiceRow["total_choice_4"] . "],";
                        } else {
                            foreach ($data as $item) {
                                echo "['" . $item['answer'] . "', " . $displayChoiceRow["total_right"] . "],";
                            }
                        }
                        ?>

                    ]);
                    var options = {
                        title: 'Assessment Average Percentage',
                        sliceVisibilityThreshold: 0,
                        //is3D:true,  
                        pieHole: 0.3,
                        animation: {
                            duration: 1000,
                            easing: 'out',
                        },
                        colors: ['#990099', '#109618', '#FF9900', '#DC3912', getRandomColor()],

                        'backgroundColor': 'white',
                        'is3D': true

                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_question<?php echo $displayChoiceRow['question_id']; ?>'));
                    chart.draw(data, options);

                }
            </script>

            <div class="assessment-container mb-2">
                <div class="row">
                    <h6>Question <?php echo $count++ ?></h6>

                    <div class="col-6">

                        <?php if ($displayChoiceRow['mcq'] == 'Yes') { ?>

                            <h4><?php echo $displayChoiceRow['assessment_question']; ?></h4>
                            <p><b><?php echo $ans ?>%</b> of the respondents ( <b><?php echo $displayChoiceRow['total_right']; ?> of <?php echo $displayChoiceRow['total_taker']; ?> </b>) answered this question correctly.</p>
                            <div class="choice-container"><span class="dot-indentifier choice1 mx-3"></span>
                                <?php if ($displayChoiceRow['assessment_choice1'] != $displayChoiceRow['assessment_answer']) { ?>
                                    <span class="wrong-answer"> <?php echo $displayChoiceRow['assessment_choice1']; ?></span>
                                <?php } else { ?>
                                    <span class="right-answer"><?php echo $displayChoiceRow['assessment_choice1']; ?></span>
                                <?php } ?>
                            </div>

                            <div class="choice-container"><span class="dot-indentifier choice2 mx-3"></span>
                                <?php if ($displayChoiceRow['assessment_choice2'] != $displayChoiceRow['assessment_answer']) { ?>
                                    <span class="wrong-answer"> <?php echo $displayChoiceRow['assessment_choice2']; ?></span>
                                <?php } else { ?>
                                    <span class="right-answer"><?php echo $displayChoiceRow['assessment_choice2']; ?></span>
                                <?php } ?>
                            </div>

                            <div class="choice-container"><span class="dot-indentifier choice3 mx-3"></span>
                                <?php if ($displayChoiceRow['assessment_choice3'] != $displayChoiceRow['assessment_answer']) { ?>
                                    <span class="wrong-answer"> <?php echo $displayChoiceRow['assessment_choice3']; ?></span>
                                <?php } else { ?>
                                    <span class="right-answer"><?php echo $displayChoiceRow['assessment_choice3']; ?></span>
                                <?php } ?>
                            </div>

                            <div class="choice-container"><span class="dot-indentifier choice4 mx-3"></span>
                                <?php if ($displayChoiceRow['assessment_choice4'] != $displayChoiceRow['assessment_answer']) { ?>
                                    <span class="wrong-answer"> <?php echo $displayChoiceRow['assessment_choice4']; ?></span>
                                <?php } else { ?>
                                    <span class="right-answer"><?php echo $displayChoiceRow['assessment_choice4']; ?></span>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <h4><?php echo $displayChoiceRow['assessment_question']; ?></h4>
                            <p><b><?php echo $ans ?>%</b> of the respondents ( <b><?php echo $displayChoiceRow['total_right']; ?> of <?php echo $displayChoiceRow['total_taker']; ?> </b>) answered this question correctly.</p>
                            <div class="choice-container"><span class="dot-indentifier choice1 mx-3"></span>
                                <?php if ($displayChoiceRow['question_answer'] != $displayChoiceRow['assessment_answer']) { ?>
                                    <span class="wrong-answer"> <?php echo $displayChoiceRow['assessment_answer']; ?></span>
                                <?php } else { ?>
                                    <span class="right-answer"><?php echo $displayChoiceRow['assessment_answer']; ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-6">
                        <div id="piechart_question<?php echo $displayChoiceRow['question_id']; ?>" class="admin-piechart"></div>
                    </div>
                </div>
            </div>

        <?php } ?>


        <script>
            let progressBar = document.querySelector(".circular-progress");
            let valueContainer = document.querySelector(".value-container");

            let progressValue = 0;
            let progressEndValue = <?php echo $assessment_rate ?>;
            let speed = 5;

            let progress = setInterval(() => {
                if (progressEndValue == 0) {
                    clearInterval(progress);
                    progressBar.style.background = `conic-gradient(
      #F78080 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg
  )`;
                } else {
                    progressValue++;
                    valueContainer.textContent = `${progressValue}%`;
                    progressBar.style.background = `conic-gradient(
      #36F213 ${progressValue * 3.6}deg,
      #443E3E ${progressValue * 3.6}deg
  )`;
                }
                if (progressValue == progressEndValue) {
                    clearInterval(progress);
                }
            }, speed);
        </script>

    </div>
</div>