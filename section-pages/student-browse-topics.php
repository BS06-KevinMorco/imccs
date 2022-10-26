<?php
$selQuestion = "SELECT *
                            FROM lesson_tbl ";
$selQuestionRow = mysqli_query($mysqli, $selQuestion);

?>


<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>IMCCS List of Topics</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="d-flex justify-content-end mt-4 mx-4">
    <form class='searchbox'>
        <input class="form-control searchbar" type="text" placeholder="Search Topics" name="search">
    </form>
</div>
<section class="student-browse-topics">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="d-flex">
                <div class="menu me-2">
                    <div class="filter" class="p-2 ms-md-4 ms-sm-2 ">
                        <div class="box-label text-uppercase text-black fw-bolder d-flex align-items-center">Difficulty <button class="btn ms-auto btn-filter-difficulty" type="button" data-bs-toggle="collapse" data-bs-target="#difficulty" aria-expanded="true" aria-controls="inner-box"> <i name="custom-icon-difficulty" class="custom-icon-difficulty fa-solid"></i>
                            </button> </div>
                        <div id="difficulty" class="collapse show">
                            <?php

                            $query = "SELECT DISTINCT (difficulty) FROM lesson_tbl ORDER BY FIELD(difficulty,'Beginner','Intermediate','Expert') ";
                            $selDifficultRow = mysqli_query($mysqli, $query);
                            mysqli_fetch_all($selDifficultRow, MYSQLI_ASSOC);

                            foreach ($selDifficultRow as $row) {
                            ?>
                                <div class="my-1"> <label class="tick"> <input type="checkbox" name="difficulty" class="check-filter difficulty" value="<?php echo $row['difficulty']; ?>"> <span class="check"></span> <?php echo $row['difficulty']; ?> </label> </div>

                            <?php
                            }

                            ?>
                        </div>
                        <div class="box-label text-uppercase text-black fw-bolder d-flex align-items-center">Completion Time <button class="btn ms-auto btn-filter-time" type="button" data-bs-toggle="collapse" data-bs-target="#time" aria-expanded="true" aria-controls="inner-box"> <i name="custom-icon-time" class="custom-icon-time  fa-solid"></i>
                            </button> </div>
                        <div id="time" class="collapse show">
                            <?php

                            $query = "SELECT DISTINCT (unit_time) FROM lesson_tbl ORDER BY FIELD(unit_time,'Hours','Days','Weeks','Months') ";
                            $selDifficultRow = mysqli_query($mysqli, $query);
                            mysqli_fetch_all($selDifficultRow, MYSQLI_ASSOC);

                            foreach ($selDifficultRow as $row) {
                            ?>
                                <div class="my-1"> <label class="tick"> <input type="checkbox" name="difficulty" class="check-filter time" value="<?php echo $row['unit_time']; ?>"> <span class="check"></span> <?php echo $row['unit_time']; ?> </label> </div>

                            <?php
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="topic-card-container col-sm-12 col-md-8 col-lg-9 d-flex">
            <div class="topic-list row">
                <?php /*
                while ($row = mysqli_fetch_assoc($selQuestionRow)) { ?>

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
                                            <h6><i class="fa-solid fa-clock"></i> <?php echo $row['estimated_time'] ?></h6>
                                        </div>


                                    </div>
                                    <input type="submit" class="btn btn-custom-primary btn-chose-topic mt-4" value="Take Assessment">
                            </form>
                        </div>
                    </div>


            </div>
        <?php } */ ?>
            </div>
        </div>
</section>




<script>
    $(".searchbar").keyup(function() {

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
            count = 0;

        // Loop through the comment list
        $('.topic-card-container .col-lg-6 .topic-card h3').each(function() {


            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).parents().eq(3).fadeOut()

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).parents().eq(3).fadeIn()
                count++;

            }

        });

    });
</script>

<script type="text/javascript">
    /* $(function() {
        $('.check-filter').on('change', function() {
            $('#form').submit();
        });
    });*/
</script>

<script>
    /*  function filter_data() {
        var difficulty = [];
        var time = [];


        $("input:checkbox[name*=difficulty]:checked").each(function() {
            difficulty.push($(this).val());
        });
        $("input:checkbox[name*=time]:checked").each(function() {
            time.push($(this).val());
        });
         var beginner = $('input[name="beginner"]:checked').val()
          var intermediate = $('input[name="intermediate"]:checked').val()
          var expert = $('input[name="expert"]:checked').val()

        $.ajax({
            url: "query/filter.php",
            method: "POST",
            data: {
              
                check: difficulty,
                time: time


            },
            success: function(data) {
                $('.lol').html(data);
                //console.log(beginner)
                console.log(difficulty)
                console.log(time)


            }
        });
    };

    $('.check-filter').click(function() {
        filter_data();
    });*/
</script>

<script>
    /* $(document).ready(function() {

        $('.filter').find('input:checkbox').on('click', function() {
            console.log("cliecked")
            $('.results > li').hide();
            $('.filter').find('input:checked').each(function() {
                $('.results > li.' + $(this).attr('rel')).show();
            });
            if (!$('.filter').find('input:checked').length) {
                $('.results > li').show();
            }
        });
    });*/
</script>

<script>
    $(document).ready(function() {

        filter_data();

        function filter_data() {
            var action = 'fetch_data';
            var difficulty = get_filter('difficulty');
            var time = get_filter('time');

            $.ajax({
                url: "query/filter-topics.php",
                method: "POST",
                data: {
                    action: action,
                    difficulty: difficulty,
                    time:time

                },
                success: function(data) {
                    $('.topic-list').html(data);
                    console.log(difficulty);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.check-filter').click(function() {
            filter_data();
        });

    });
</script>