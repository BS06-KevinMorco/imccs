<?php include('modals/institution-add-modal.php'); ?>
<?php include('modals/institution-update-modal.php'); ?>
<?php include('modals/institution-view-modal.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <div class="container page-container">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1>Manage Educational Institution</h1>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="btn btn-custom flex-end add" style="width:170px;" title="add" data-toggle="tooltip"><i class="fa-solid fa-circle-plus"></i>Add Institution</a>
                            </div>

                        </div>
                    </div>
                    <table class="admin table table-striped table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Institution Name <i class="fa fa-sort"></i></th>
                                <th>Institution Code <i class="fa fa-sort"></i></th>
                                <th>Municipality <i class="fa fa-sort"></i></th>
                                <th>Province <i class="fa fa-sort"></i></th>
                                <th>Status <i class="fa fa-sort"></i></th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "select * from institution_tbl";
                            $result = mysqli_query($mysqli, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['code'] ?></td>
                                    <td><?php echo $row['municipality_city'] ?></td>
                                    <td><?php echo $row['province'] ?></td>

                                    <td> <span class="status"><?php echo $row['status'] ?><span></td>

                                    <td>
                                        <a href="javascript:void(0)" class="view btn btn-primary" data-id="<?php echo $row['institution_id']; ?>" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i>View</a>
                                        <a href="javascript:void(0)" class="edit btn btn-warning" data-id="<?php echo $row['institution_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                        <a href="javascript:void(0)" class="delete btn btn-danger" id="delete-id" title="Delete" data-id="<?php echo $row['institution_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php include('modals/institution-add-modal.php'); ?>
                                <?php include('modals/institution-update-modal.php'); ?>
                                <?php include('modals/institution-view-modal.php'); ?>

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
</main>

<script>
    $(document).ready(function() {

        var status = $(".status");
        $.each(status, function(i) {

            if ($(status[i]).text() == 'Active') {
                $(status[i]).addClass("active-status");
            } else {
                $(status[i]).addClass("inactive-status");
            }
        });
    });
</script>