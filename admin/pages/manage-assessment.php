<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <div class="container page-container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">

                                <h1>Assessment Results</h1>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-fill pb-4" id="nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" aria-current="page" href="#pass"><i class="fa-solid fa-user-check"></i>Passed Assessments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#fail"><i class="fa-solid fa-user-xmark"></i>Failed Assessments</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="pass" class="tab-pane fade in active show">
                            <table class="admin table table-striped table-hover table-bordered" id="passTable">
                                <thead>
                                    <tr>
                                        <th>Name <i class="fa fa-sort"></i></th>
                                        <th>Title <i class="fa fa-sort"></i></th>
                                        <th>Score <i class="fa fa-sort"></i></th>
                                        <th>Percentage <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM user_tbl user INNER JOIN assessment_chosen answer  ON user.user_id=answer.user_id INNER JOIN student_faculty_profile_tbl prfl ON user.user_id=prfl.user_id ORDER BY answer.user_id DESC";
                                    $test2 = mysqli_query($mysqli, $sql);

                                    while ($row2 = mysqli_fetch_assoc($test2)) { ?>

                                        <h1> </h1>
                                        <?php
                                        $eid = $row2['user_id'];
                                        $aid = $row2['assessment_id'];

                                        $test3 = "SELECT * FROM assessment_tbl assessment INNER JOIN assessment_chosen answer ON assessment.assessment_id=answer.assessment_id  INNER JOIN user_tbl user  ON user.user_id=answer.user_id WHERE  answer.user_id='$eid' AND assessment.assessment_id='$aid'";
                                        $test4 = mysqli_query($mysqli, $test3);
                                        $row3 = mysqli_fetch_assoc($test4);

                                        ?>
                                        <?php $queryScore = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id AND question.assessment_answer = answer.question_answer INNER JOIN user_tbl user ON user.user_id=answer.user_id  WHERE answer.user_id='$eid' AND answer.assessment_id='$aid'";

                                        $resultScore = mysqli_query($mysqli, $queryScore);
                                        $rowCount = mysqli_num_rows($resultScore);

                                        $selOver = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  WHERE question.assessment_id=answer.assessment_id AND answer.user_id='$eid' AND answer.assessment_id='$aid'";
                                        $resultOver = mysqli_query($mysqli, $selOver);
                                        $rowCountOver = mysqli_num_rows($resultOver); ?>
                                        <tr>
                                            <td><?php echo $row2['username']; ?></td>

                                            <td><?php echo $row3['title']; ?></td>

                                            <td><span class="score">
                                                    <?php echo $rowCount
                                                    ?>

                                                    / <?php echo $rowCountOver
                                                        ?></span></td>
                                            <td>
                                                <span class="percent">
                                                    <?php echo $ans = number_format($rowCount / $rowCountOver * 100, 2); ?>
                                                </span>

                                            </td>
                                        </tr>



                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="tab-content">
                        <div id="fail" class="tab-pane fade in">
                            <table class="admin table table-striped table-hover table-bordered" id="failTable">
                                <thead>
                                    <tr>
                                        <th>Name <i class="fa fa-sort"></i></th>
                                        <th>Title <i class="fa fa-sort"></i></th>
                                        <th>Score <i class="fa fa-sort"></i></th>
                                        <th>Percentage <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM user_tbl user INNER JOIN assessment_chosen answer  ON user.user_id=answer.user_id INNER JOIN student_faculty_profile_tbl prfl ON user.user_id=prfl.user_id ORDER BY answer.user_id DESC";
                                    $test2 = mysqli_query($mysqli, $sql);

                                    while ($row2 = mysqli_fetch_assoc($test2)) { ?>

                                        <h1> </h1>
                                        <?php
                                        $eid = $row2['user_id'];
                                        $aid = $row2['assessment_id'];

                                        $test3 = "SELECT * FROM assessment_tbl assessment INNER JOIN assessment_chosen answer ON assessment.assessment_id=answer.assessment_id  INNER JOIN user_tbl user  ON user.user_id=answer.user_id WHERE  answer.user_id='$eid' AND assessment.assessment_id='$aid'";
                                        $test4 = mysqli_query($mysqli, $test3);
                                        $row3 = mysqli_fetch_assoc($test4);

                                        ?>
                                        <?php $queryScore = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id AND question.assessment_answer = answer.question_answer INNER JOIN user_tbl user ON user.user_id=answer.user_id  WHERE answer.user_id='$eid' AND answer.assessment_id='$aid'";

                                        $resultScore = mysqli_query($mysqli, $queryScore);
                                        $rowCount = mysqli_num_rows($resultScore);

                                        $selOver = "SELECT * FROM assessment_question_tbl question INNER JOIN answer_tbl answer ON question.question_id = answer.question_id  WHERE question.assessment_id=answer.assessment_id AND answer.user_id='$eid' AND answer.assessment_id='$aid'";
                                        $resultOver = mysqli_query($mysqli, $selOver);
                                        $rowCountOver = mysqli_num_rows($resultOver); ?>
                                        <tr>
                                            <td><?php echo $row2['username']; ?></td>

                                            <td><?php echo $row3['title']; ?></td>

                                            <td><span class="score">
                                                    <?php echo $rowCount
                                                    ?>

                                                    / <?php echo $rowCountOver
                                                        ?></span></td>
                                            <td>
                                                <span class="percent">
                                                    <?php echo $ans = number_format($rowCount / $rowCountOver * 100, 2); ?>
                                                </span>

                                            </td>
                                        </tr>



                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>


                    <!-- <div class="text-center">
                        <img src="assets/img/404/website-maintenance.png" width="500px" height="500px" alt="">
                        <h1> <img src="assets/img/404/warning.png" width="100px" height="100px" alt="">Webpage Still On Progress</h1>
                        <h1>Here you can view overall results of assessments and also the average scores of different educatinal institution</h1>
                    </div> -->

                </div>
            </div>

        </section>
</main>

<script>
    $(document).ready(function() {

        $('#passTable tbody tr span.percent').each(function() {
            if ($(this).text() < 75.00) {
                $(this).parent().parent().remove();
            }
        })

        $('#failTable tbody tr span.percent').each(function() {
            if ($(this).text() > 75.00) {
                $(this).parent().parent().remove();
            }
        })

    })



    $(".table tbody tr span.percent").each(function() {
        if ($(this).text() > 75.00) {
            $(this).closest('tr').find('span:eq(0)').addClass('pass');
            $(this).closest('tr').find('span:eq(1)').addClass('pass');
        } else {
            $(this).closest('tr').find('span:eq(0)').addClass('fail');
            $(this).closest('tr').find('span:eq(1)').addClass('fail');
        }
    });
</script>