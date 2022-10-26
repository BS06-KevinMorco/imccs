<?php include_once('../database/config.php'); ?>

<?php
$selQuestion = "SELECT * FROM lesson_tbl ";
$selQuestionRow = mysqli_query($mysqli, $selQuestion);
?>

<?php
if (isset($_POST['check'])) {

    $a = array_flip($_POST['check']);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($a['beginner'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'beginner' ");
        }
        if (isset($a['intermediate'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'intermediate'");
        }
        if (isset($a['expert'])) {
            // $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty IN ('intermediate','expert')");
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'expert'");
        }
        if (isset($a['beginner']) && isset($a['intermediate'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty IN ('beginner','intermediate')");
        }
        if (isset($a['beginner']) && isset($a['expert'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty IN ('beginner','expert')");
        }
        if (isset($a['intermediate']) && isset($a['expert'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty IN ('intermediate','expert')");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) && isset($a['expert'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty IN ('beginner','intermediate','expert')");
        }
        if (isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time LIKE '%Hours%'");
        }
        if (isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time LIKE '%Days%'");
        }
        if (isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time LIKE '%Weeks%'");
        }
        if (isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time LIKE '%Months%'");
        }
        if (isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Hours%' OR estimated_time LIKE '%Days%'");
        }
        if (isset($a['hours']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Hours%' OR estimated_time LIKE '%Weeks%'");
        }
        if (isset($a['hours']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Hours%' OR estimated_time LIKE '%Months%'");
        }
        if (isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Days%' OR estimated_time LIKE '%Weeks%'");
        }
        if (isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Days%' OR estimated_time LIKE '%Months%'");
        }
        if (isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Weeks%' OR estimated_time LIKE '%Months%'");
        }
        if (isset($a['hours']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Hours%' OR estimated_time  LIKE '%Days%' OR estimated_time LIKE '%Weeks%'");
        }
        if (isset($a['hours']) && isset($a['days']) && isset($a['weeks']) && isset($a['Months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE estimated_time  LIKE '%Hours%' OR estimated_time  LIKE '%Days%' OR estimated_time LIKE '%Weeks%' OR estimated_time LIKE '%Months%'");
        }
        if (isset($a['beginner']) && isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'beginner' AND estimated_time  LIKE '%Hours%' ");
        }
        if (isset($a['beginner']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'beginner' AND estimated_time  LIKE '%Days%' ");
        }
        if (isset($a['beginner']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'beginner' AND estimated_time  LIKE '%Weeks%' ");
        }
        if (isset($a['beginner']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'beginner' AND estimated_time  LIKE '%Months%' ");
        }


        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'intermediate')  AND estimated_time  LIKE '%Hours%'");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'intermediate')  AND estimated_time  LIKE '%Days%'");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'intermediate')  AND estimated_time  LIKE '%Weeks%'");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'intermediate')  AND estimated_time  LIKE '%Months%'");
        }

        if (isset($a['beginner']) && isset($a['expert']) &&  isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'expert')  AND estimated_time  LIKE '%Hours%'");
        }
        if (isset($a['beginner']) && isset($a['expert']) &&  isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'expert')  AND estimated_time  LIKE '%Days%'");
        }
        if (isset($a['beginner']) && isset($a['expert']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'expert')  AND estimated_time  LIKE '%Weeks%'");
        }
        if (isset($a['beginner']) && isset($a['expert']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'beginner' OR difficulty = 'expert')  AND estimated_time  LIKE '%Months%'");
        }

        if (isset($a['intermediate']) && isset($a['expert']) &&  isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'intermediate' OR difficulty = 'expert')  AND estimated_time  LIKE '%Hours%'");
        }
        if (isset($a['intermediate']) && isset($a['expert']) &&  isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'intermediate' OR difficulty = 'expert')  AND estimated_time  LIKE '%Days%'");
        }
        if (isset($a['intermediate']) && isset($a['expert']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'intermediate' OR difficulty = 'expert')  AND estimated_time  LIKE '%Weeks%'");
        }
        if (isset($a['intermediate']) && isset($a['expert']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl  WHERE  (difficulty = 'intermediate' OR difficulty = 'expert')  AND estimated_time  LIKE '%Months%'");
        }

        /*NOT ISSET TO STOP OVERRIDING*/

        if (!isset($a['beginner'])  && isset($a['intermediate']) && isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'intermediate' AND estimated_time  LIKE '%Hours%' ");
        }
        if (!isset($a['beginner'])  && isset($a['intermediate']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'intermediate' AND estimated_time  LIKE '%Days%' ");
        }
        if (!isset($a['beginner'])  && isset($a['intermediate']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'intermediate' AND estimated_time  LIKE '%Weeks%' ");
        }
        if (!isset($a['beginner'])  && isset($a['intermediate']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'intermediate' AND estimated_time  LIKE '%Months%' ");
        }
        if (!isset($a['beginner'])  && isset($a['expert']) && isset($a['hours'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'expert' AND estimated_time  LIKE '%Hours%' ");
        }


        if (isset($a['expert']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'expert' AND estimated_time  LIKE '%Days%' ");
        }
        if (isset($a['expert']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'expert' AND estimated_time  LIKE '%Weeks%' ");
        }
        if (isset($a['expert']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * FROM lesson_tbl WHERE difficulty = 'expert' AND estimated_time  LIKE '%Months%' ");
        }
        if (isset($a['beginner']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty = 'beginner'");
        }
        if (isset($a['beginner']) && isset($a['hours']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Weeks' AND difficulty = 'beginner' ");
        }
        if (isset($a['beginner']) && isset($a['hours']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Months' AND difficulty = 'beginner'");
        }
        if (isset($a['beginner']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks' AND difficulty = 'beginner'");
        }
        if (isset($a['beginner']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Months' AND difficulty = 'beginner'");
        }
        if (isset($a['beginner']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty = 'beginner'");
        }

        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Weeks' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Months' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Months' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty = 'intermediate' ");
        }

        if (isset($a['expert']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['hours']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Weeks' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['hours']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Months' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Months' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty = 'expert' ");
        }

        /*UP TO THIS SECTION WORKING FILTER*/


        if (isset($a['beginner']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks' AND difficulty = 'beginner' ");
        }
        if (isset($a['beginner']) && isset($a['hours']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'beginner' ");
        }
        if (isset($a['beginner']) && isset($a['hours']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'beginner' ");
        }
        if (isset($a['beginner']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks|Months' AND difficulty = 'beginner' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'intermediate' ");
        }
        if (isset($a['intermediate']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks|Months' AND difficulty = 'intermediate' ");
        }

        if (isset($a['expert']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['hours']) && isset($a['days']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['hours']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Months' AND difficulty = 'expert' ");
        }
        if (isset($a['expert']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days|Weeks|Months' AND difficulty = 'expert' ");
        }

        if (isset($a['beginner']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks|Months' AND difficulty = 'beginner' ");
        }
        if (isset($a['intermediate']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks|Months' AND difficulty = 'intermediate' ");
        }
        if (isset($a['expert']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days|Weeks|Months' AND difficulty = 'expert' ");
        }
       
        if (isset($a['beginner']) && isset($a['intermediate']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty REGEXP 'beginner|intermediate' ");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty REGEXP 'beginner|intermediate' ");
        }

        if (isset($a['beginner']) && isset($a['expert']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty REGEXP 'beginner|expert' ");
        }
        if (isset($a['beginner']) && isset($a['expert']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty REGEXP 'beginner|expert' ");
        }
        if (isset($a['intermediate']) && isset($a['expert']) && isset($a['hours']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours|Days' AND difficulty REGEXP 'intermediate|expert' ");
        }
        if (isset($a['intermediate']) && isset($a['expert']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks|Months' AND difficulty REGEXP 'intermediate|expert' ");
        }

        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['expert']) && isset($a['hours'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Hours' AND difficulty REGEXP 'beginner|intermediate|expert' ");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['expert']) && isset($a['days'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Days' AND difficulty REGEXP 'beginner|intermediate|expert' ");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['expert']) && isset($a['weeks'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Weeks' AND difficulty REGEXP 'beginner|intermediate|expert' ");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['expert']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl WHERE estimated_time REGEXP 'Months' AND difficulty REGEXP 'beginner|intermediate|expert' ");
        }
        if (isset($a['beginner']) && isset($a['intermediate']) &&  isset($a['expert']) && isset($a['hours']) && isset($a['days']) && isset($a['weeks']) && isset($a['months'])) {
            $query = $mysqli->query("SELECT * from lesson_tbl  ");
        }

        
        




        //SELECT * FROM lesson_tbl WHERE estimated_time LIKE '%Days%';

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) { ?>


                <div class="col-lg-6">
                    <a href="home-student.php?page=student-test-view&topic=<?php echo $row['title'] ?>" data-id="<?php echo $row['lesson_id']; ?>">
                        <div class="topic-card"><img src="admin/assets/img/<?php echo $row['lesson_img'] ?>" class="img img-responsive">
                            <div class="topic-content">
                                <h3><?php echo $row['title'] ?></h3>
                                <p class="topic-description"><?php echo $row['description'] ?> </p>

                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="topic-overview">
                                        <p>Difficulty</p>
                                        <h6><i class="fa-solid fa-star"></i> <?php echo $row['difficulty'] ?></h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="topic-overview">
                                        <p>Estimated Time</p>
                                        <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class=" d-flex justify-content-center align-items-center" style="height:100vh; overflow:hidden;">

                <!-- Inner row, half the width and height, centered, blue border -->
                <div class="row text-center d-flex align-items-center">

                    <!-- Innermost text, wraps automatically, automatically centered -->
                    <div class="img-container" style="margin-left: 30px">
                        <img src="https://marketplace.canva.com/IjWgg/MAFGI6IjWgg/1/tl/canva-sad-face-emoji-MAFGI6IjWgg.png" width="100px" height="100px">
                    </div>
                    <h2>Sorry, no topics were found. Please try again</h2>

                </div> <!-- Inner row -->
            </div> <!-- Outer container -->
    <?php  }
    }
} else { ?>
    <?php
    while ($row = $selQuestionRow->fetch_assoc()) { ?>
        <div class="col-lg-6">
            <a href="home-student.php?page=student-test-view&topic=<?php echo $row['title'] ?>" data-id="<?php echo $row['lesson_id']; ?>">
                <div class="topic-card"><img src="admin/assets/img/<?php echo $row['lesson_img'] ?>" class="img img-responsive">
                    <div class="topic-content">
                        <h3><?php echo $row['title'] ?></h3>
                        <p class="topic-description"><?php echo $row['description'] ?> </p>

                    </div>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="topic-overview">
                                <p>Difficulty</p>
                                <h6><i class="fa-solid fa-star"></i> <?php echo $row['difficulty'] ?></h6>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="topic-overview">
                                <p>Estimated Time</p>
                                <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
<?php
}
?>