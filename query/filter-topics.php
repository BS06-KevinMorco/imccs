<?php
include_once('../database/config.php');

if (isset($_POST["action"])) {
    $query = "
    SELECT * FROM lesson_tbl WHERE status IN ('Active', 'Inactive')";

    if (isset($_POST["difficulty"])) {
        $difficulty_filter = implode("','", $_POST["difficulty"]);
        $query .= " AND difficulty IN('" . $difficulty_filter . "')";
    }
    if (isset($_POST["time"])) {
        $time = implode("','", $_POST["time"]);
        $query .= " AND unit_time IN('" . $time . "')";
    }
?>
    <?php
    $selQuestionRow = mysqli_query($mysqli, $query);
    mysqli_fetch_all($selQuestionRow, MYSQLI_ASSOC);
    $rowcount = mysqli_num_rows($selQuestionRow);
    if ($rowcount > 0) {
        foreach ($selQuestionRow as $row) { ?>
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
                                    <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?> <?php echo $row['unit_time'] ?></h6>
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
} ?>