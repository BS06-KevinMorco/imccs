<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <div class="container" style="border-radius:20px; overflow:auto; background-color:white; padding:40px;">
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
                    <table class="table table-striped table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>No. <i class="fa fa-sort"></i></th>
                                <th>Name <i class="fa fa-sort"></i></th>
                                <th>Institution Code <i class="fa fa-sort"></i></th>
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
                                    <td><?php echo $row['institution_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['code'] ?></td>
                                    <td><?php echo $row['status'] ?></td>

                                    <td>
                                        <a href="javascript:void(0)" class="view" data-id="<?php echo $row['institution_id']; ?>" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="edit" data-id="<?php echo $row['institution_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="delete" id="delete-id" title="Delete" data-id="<?php echo $row['institution_id']; ?>" data-toggle="tooltip"><i class="fa-solid fa-trash-can"></i></a>
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

        jQuery(".view").click(function() {
            var id = $(this).data('id');



            $.ajax({
                type: 'POST',
                url: 'query/institution-getid-view.php',
                data: {
                    institution_id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#view_modal').modal('show');
                    $('#institution-view-name').val(res.name);
                    $('#institution-view-street').val(res.street_name);
                    $('#institution-view-barangay').val(res.barangay);
                    $('#institution-view-municipality-city').val(res.municipality_city);
                    $('#institution-view-province').val(res.province);
                    $('#institution-view-status').val(res.status);
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {

                jQuery(".add").click(function() {
                        $('#add_institution_modal').modal('show');

                        $("#save-institution").click(function() {

                                var name = $("#institution-add-name").val();
                                var street = $("#institution-add-street").val();
                                var barangay = $("#institution-add-barangay").val();
                                var municipality_city = $("#institution-add-municipality-city").val();
                                var province = $("#institution-add-province").val();
                                var status = $("#institution-add-status").val();


                            

                                if (name != '' && street != '') {

                                        $.ajax({
                                            type: "POST",
                                            url: 'query/institution-create-tbl.php',
                                            data: {
                                                name: name,
                                                street_name: street,
                                                barangay: barangay,
                                                municipality_city: municipality_city,
                                                province: province,
                                                status: status
                                            },
                                            cache: false,
                                            success: function(data) {
                                                alert(data);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr);
                                            }
                                        });
                                    }else{
                                        alert("please fill up the fields")
                                        return false;
                                    }
                                });
                        });
                })
</script>