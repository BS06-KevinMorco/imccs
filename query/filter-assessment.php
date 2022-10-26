<?php
include_once('../database/config.php');
session_start();
if (isset($_POST["action"])) {
    $query = "
		SELECT * FROM assessment_tbl WHERE status IN ('Active', 'Inactive')";

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
    $selAssessmentRow = mysqli_query($mysqli, $query);
    mysqli_fetch_all($selAssessmentRow, MYSQLI_ASSOC);
    $rowcount = mysqli_num_rows($selAssessmentRow);
    if ($rowcount > 0) {
        foreach ($selAssessmentRow as $row) { ?>
            <div class="col-lg-6">
                <div class="topic-card"><img src="admin/assets/img/<?php echo $row['question_img'] ?>" class="img img-responsive">
                    <div class="topic-content">
                        <h3><?php echo $row['title'] ?></h3>
                        <p class="topic-description"><?php echo $row['description'] ?> </p>

                    </div>
                    <form id="insert-chosen-assessment" class="insert-chosen-assessment" method="GET">
                        <input type="hidden" name="" id="user-id" value="<?php echo $_SESSION['user_id'] ?>">
                        <input type="hidden" name="assessment-id" id="assessment-id" value="<?php echo $row['assessment_id'] ?>">


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
                            <input type="submit" class="btn btn-custom-primary btn-chose-topic mt-4" value="Take Assessment">
                        </div>
                    </form>
                </div>
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
<script>
    /* STUDENT ASSESSMENT */
$('.insert-chosen-assessment').submit(function (event) {
    event.preventDefault();
    console.log("clicked")

    var user_id = $('#user-id').val();
    var assessment_id = $(this).closest('form').find('input[name=assessment-id]').val();
    console.log(user_id);
    console.log(assessment_id);

    Swal.fire({
        title: 'Do you want to choose this Assessment?',
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
                type: "GET",
                url: "query/student-save-assessment.php",
                data: {
                    user_id: user_id,
                    assessment_id: assessment_id

                },
                dataType: 'json',

                success: function (data) {
                    if (data == 'You have already taken this topic') {
                        Swal.fire({
                            title: 'You have already taken this Assessment!',
                            text: "Please choose another one",
                            icon: 'warning',
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK'
                        })
                    } else if (data == 'Not Active') {
                        Swal.fire({
                            title: 'This Assessment is not active!',
                            text: "Please contact the administrator for further details",
                            icon: 'warning',
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK'
                        })
                    }
                    else {
                        window.location = 'home-student.php?page=student-progress-assessment&assessment_id=' + assessment_id;
                        console.log(data);
                    }

                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(error);
                }
            });
        }
    });

});
</script>