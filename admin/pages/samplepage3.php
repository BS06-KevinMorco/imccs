<?php include('modals/lesson-add-modal.php'); ?>
<?php include('modals/lesson-view-modal.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <div class="container page-container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1>Manage Question</h1>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="btn btn-custom flex-end add-lesson" style="width:200px;" title="add" data-toggle="tooltip"><i class="fa-solid fa-circle-plus"></i>Add Topic</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>ID <i class="fa fa-sort"></i></th>
                                <th>Title <i class="fa fa-sort"></i></th>
                                <th>Description <i class="fa fa-sort"></i></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT *
                            FROM assessment_question_tbl";
                            $result = mysqli_query($mysqli, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['question_id'] ?></td>
                                    <td><?php echo $row['assessment_question'] ?></td>
                                    <td><?php echo $row['assessment_question'] ?></td>


                                    <td>
                                        <a href="javascript:void(0)" class="view-question" data-id="<?php echo $row['question_id']; ?>" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="edit-question" data-id="<?php echo $row['question_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="delete-question" id="delete-id" title="Delete" data-id="<?php echo $row['question_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <?php include('modals/lesson-update-modal.php'); ?>


                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
</main>

<script>
    /*  $(document).ready(function() {

        jQuery(".view-student").click(function() {
            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'query/student-getid-view.php',
                data: {
                    user_id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#view-student-modal').modal('show');
                    $('#student-view-username').val(res.username);
                    $('#student-view-fname').val(res.fname);
                    $('#student-view-lname').val(res.lname);
    
                }
            });

        });
    });*/
</script>
