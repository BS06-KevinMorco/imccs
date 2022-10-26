<?php include('modals/faq-add-modal.php'); ?>
<?php include('modals/faq-update-modal.php'); ?>
<?php include('modals/faq-view-modal.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <div class="container page-container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1>Manage FAQ's</h1>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="btn btn-custom flex-end add-faq" style="width:200px;" title="add" data-toggle="tooltip"><i class="fa-solid fa-circle-plus"></i>Add FAQ's</a>
                            </div>

                        </div>
                    </div>
                    <table class="admin table table-striped table-hover table-bordered" id="myTable">
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
                            FROM faq_tbl";
                            $result = mysqli_query($mysqli, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>


                                    <td>
                                        <a href="javascript:void(0)" class="view-faq btn btn-primary" data-id="<?php echo $row['id']; ?>" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i>View</a>
                                        <a href="javascript:void(0)" class="edit-faq btn btn-warning" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                        <a href="javascript:void(0)" class="delete-faq btn btn-danger" id="delete-id" title="Delete" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                    </td>
                                </tr>
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

<script>
    $(document).ready(function() {

        jQuery(".add-faq").click(function() {
            $('#add-faq-modal').modal('show');

            $("#save-faq").click(function() {

                var overview = $("#faq-add-overview").val();
                var description = $("#faq-add-description").val();

                $.ajax({
                    type: "POST",
                    url: 'query/faq-add-tbl.php',
                    data: {
                        title: overview,
                        description: description
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });

            });
        });
    })
</script>

<script>
    $(document).ready(function() {

        $("body").on('click', '.edit-faq', function(e) {
            var id = $(this).data('id');

            Swal.fire({
                title: 'This section is used for updating current records',
                text: "Are you sure you want to proceed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes!, Proceed',
                reverseButtons: true,
                allowOutsideClick: false,
                customClass: {
                    confirmButton: 'edit-default-button'
                },
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: 'POST',
                        url: 'query/faq-getid-view.php',
                        data: {
                            id: id //fieldname in the database : data-id value
                        },
                        dataType: 'json',
                        success: function(res) {
                            $('#update-faq-modal').modal('show');
                            $('#faq-id').val(res.id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                            var overview = $("#faq-update-overview").val(res.title);
                            var description = $("#faq-update-description").val(res.description);

                        }
                    });
                }
            });
        });
    });
</script>

<script>
    $('#update-faq').submit(function() {
        event.preventDefault();

        var id = $('#faq-id').val();;
        var overview = $("#faq-update-overview").val();
        var description = $("#faq-update-description").val();

        Swal.fire({
            title: 'Are you sure you want to update this record?',
            text: "This action cannot be reverted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update!',
            reverseButtons: true,
            allowOutsideClick: false,
            customClass: {
                confirmButton: 'edit-primary-button'
            },

        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    url: "query/faq-update-tbl.php",
                    data: {
                        id: id,
                        title: overview,
                        description: description


                    }, // get all form field value in 
                    dataType: 'json',

                    success: function(data) {
                        console.log(data)
                        Swal.fire({
                            title: 'Record Updated!',
                            text: "You have succesfully modified this record",
                            icon: 'success',
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                Swal.fire({
                    title: "Record not updated!",
                    text: "Latest record is still in the database",
                    icon: 'warning',
                })
            }
        });

    });
</script>

<script>
    $(document).ready(function() {

        jQuery(".view-faq").click(function() {
            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'query/faq-getid-view.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#view-faq-modal').modal('show');
                    var overview = $("#faq-view-overview").val(res.title);
                    var description = $("#faq-view-description").val(res.description);

                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {

        $("body").on('click', '.delete-faq', function(e) {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: "You won't be able to retrieve this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true,
                allowOutsideClick: false,
                customClass: {
                    confirmButton: 'delete-primary-button'
                },
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: 'POST',
                        url: 'query/faq-delete-tbl.php',
                        data: {
                            id: id
                        },

                        success: function(data) {
                            Swal.fire({
                                title: "Record Deleted",
                                icon: 'success',
                                text: "It is lost forever",
                            }).then(function() {
                                window.location.reload();
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Information not deleted!",
                        text: "Information is still in the database",
                        icon: 'warning',
                    })
                }
            });
        });
    });
</script>