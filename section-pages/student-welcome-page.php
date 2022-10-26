<?php
$selQuestion = "SELECT * FROM lesson_tbl as lesson INNER JOIN topic_chosen as chosen ON lesson.lesson_id = chosen.lesson_id AND chosen.user_id = " . $_SESSION['user_id'] . "";
$selQuestionRow = mysqli_query($mysqli, $selQuestion);
?>

<?php
$assessment = "SELECT * FROM assessment_tbl as assessment INNER JOIN assessment_chosen as chosen ON assessment.assessment_id = chosen.assessment_id AND chosen.user_id = " . $_SESSION['user_id'] . "";
$assessmentRow = mysqli_query($mysqli, $assessment);
?>
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>Welcome to IMCCS <?php echo  $_SESSION["username"] ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="get-started">
    <div class="intro">
        <h2> Let's Get Started! </h2>
        <p class="lead mb-4"> IMCCS is an interactive system that provides cybersecurity quiz assessments and top of that, we offer topics that are relevant on todays time </p>
        <a href="home-student.php?page=student-browse-topics" class="btn btn-custom-primary" style="border-radius: 20px;">Browse Topics</a>
    </div>
</section>

<section class="my-chosen-topic">
    <div class="chosen-topic-title mb-4">
        <h2> My Chosen Topics </h2>
        <nav class="topic-chosen-nav" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="#in-progress">In-progress</a></li>
                <li class="breadcrumb-item"><a href="#completed">Completed</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cancelled</li>
            </ol>
        </nav>
    </div>
    <div class="my-chosen-content">
        <div class="row">
        <div class="col-lg-12">

            <?php while ($row = mysqli_fetch_assoc($selQuestionRow)) { ?>
                <a href="home-student.php?page=student-progress-topic&title=<?php echo $row['title'] ?>">

                    <div class="topic-card card-chosen-topic"><img src="admin/assets/img/<?php echo $row['lesson_img'] ?>" class="img img-responsive chosen-topic">
                        <div class="topic-content card-chosen-topic">
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
                                    <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?> <?php echo $row['unit_time']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
            </div>

        </div>
    </div>


</section>

<section class="my-chosen-assessment">
    <div class="chosen-assessment-title mb-4">
        <h2> My Chosen Assessments </h2>
        <nav class="topic-chosen-nav" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="#in-progress">In-progress</a></li>
                <li class="breadcrumb-item"><a href="#completed">Completed</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cancelled</li>
            </ol>
        </nav>
    </div>

    <div class="my-chosen-content">
        <div class="row">
        <div class="col-lg-12">

            <?php while ($row = mysqli_fetch_assoc($assessmentRow)) { ?>
                <a href="home-student.php?page=result&assessment_id=<?php echo $row['assessment_id'] ?>">
                        <div class="topic-card card-chosen-topic"><img src="admin/assets/img/<?php echo $row['question_img'] ?>" class="img img-responsive chosen-topic">
                            <div class="topic-content card-chosen-topic">
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
                                        <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?> <?php echo $row['unit_time']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
            <?php } ?>
            </div>

        </div>
    </div>
</section>
</div>