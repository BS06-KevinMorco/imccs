<main id="main" class="main student-personal-info">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <h1 class="text-center mb-2 pt-4">Personal Info</h1>
                <p class="text-center mb-4">Personal information about you across IMCCS</p>
                <div class="user-basic-information col-10">
                    <h4>Basic Information</h4>
                    <div class="change-pass-form mt-4">
                        <form action="javascript:void(0)" id="update-student-personal-info" method="post">
                            <input type="hidden" id="student-id">

                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-fname" class="text-label">First Name</label>
                                    <input type="text" class="form-control student-update" id="student-update-fname" placeholder="First Name">
                                    <label class="tick-update"> <input type="checkbox" class="check-update"> <span class="check-toggle mt-4" style="float: right; display:inline; margin-left:-20px;"></span> </label>
                                </div>
                            </div>
                            <div class="mb-3">

                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-lname" class="text-label">Last Name</label>
                                    <input type="text" class="form-control student-update" id="student-update-lname" placeholder="First Name">
                                    <label class="tick-update"> <input type="checkbox" class="check-update"> <span class="check-toggle  mt-4" style="float: right; display:inline; margin-left:-20px;"></span> </label>
                                </div>
                            </div>


                            <div class="form-footer account-settings mt-4">
                                <input type="submit" name="save" value="Save Changes" class="btn btn-custom-primary update-personal-info">
                            </div>
                    </div>
                    </form>
                </div>

                <div class="user-basic-information col-10 mt-4">
                    <div class="col-sm-8">
                        <h4>Contact Information</h4>
                    </div>
                    <div class="change-pass-form mt-4">
                        <form action="javascript:void(0)" id="update-student-contact-info" method="post">
                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-email" class="text-label">Email</label>
                                    <input type="text" class="form-control student-update" id="student-update-email" placeholder="First Name">
                                    <label class="tick-update"> <input type="checkbox" class="check-update"> <span class="check-toggle mt-4" style="float: right; display:inline; margin-left:-20px;"></span> </label>

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-contact" class="text-label">Contact</label>
                                    <input type="text" class="form-control student-update" id="student-update-contact" placeholder="First Name">
                                    <label class="tick-update"> <input type="checkbox" class="check-update"> <span class="check-toggle mt-4" style="float: right; display:inline; margin-left:-20px;"></span> </label>
                                </div>
                            </div>
                            <div class="form-footer account-settings mt-4">
                                <input type="submit" name="save" value="Save Changes" class="btn btn-custom-primary ">
                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </section>


    </div>

</main>

<script>
    $(document).ready(function() {
        var id = <?php echo $_SESSION['user_id']; ?>

        $.ajax({
            type: 'POST',
            url: 'query/student-getid-view.php',
            data: {
                user_id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#student-id').val(res.user_id);
                $('#student-update-fname').val(res.fname);
                $('#student-update-lname').val(res.lname);
                $('#student-update-email').val(res.email);
                $('#student-update-contact').val(res.contact_no);
            }
        });

    });
</script>

<script>
    $('#update-student-personal-info').submit(function() {
        var user_id = $('#student-id').val();
        var fname = $('#student-update-fname').val();
        var lname = $('#student-update-lname').val();

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
                    url: "query/student-update-personal-info.php",
                    data: {
                        user_id: user_id, //fieldname in the database : data-id value
                        fname: fname,
                        lname: lname,
                    },
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
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        console.log(error);
                    }
                });
            } else {
                Swal.fire({
                    title: "No Changes Were Saved!",
                    text: "Your Information is just same as  the last time!",
                    icon: 'warning',
                })
            }
        });

    });
</script>

<script>
    $('#update-student-contact-info').submit(function() {
        var user_id = $('#student-id').val();
        var email = $('#student-update-email').val();
        var contact = $('#student-update-contact').val();


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
                    url: "query/student-update-contact-info.php",
                    data: {
                        user_id: user_id, //fieldname in the database : data-id value
                        email: email,
                        contact_no: contact,
                    },
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
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        console.log(error);
                    }
                });
            } else {
                Swal.fire({
                    title: "No Changes Were Saved!",
                    text: "Your Information is just same as  the last time!",
                    icon: 'warning',
                })
            }
        });

    });
</script>

<script>
    $(':checkbox').change(function() {
        $('input:text').eq($(':checkbox').index(this)).prop("disabled", !$(this).is(':checked'));
    });
    $(':checkbox').change();
</script>