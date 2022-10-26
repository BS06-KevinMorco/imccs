<main id="main" class="main">
    <div class="pagetitle">
        </nav>
        <section class="main-section">
            <div class="main-content">
                <h1 class="text-center mb-2 pt-4">Account Security</h1>
                <p class="text-center mb-4">You can manage your password here</p>
                <div class="user-basic-information  col-10">
                    <div class="col-sm-8">
                        <h4>Change Your Password</h4>
                    </div>
                    <div class="change-pass-form mt-4">
                        <input type="hidden" id="student-id">

                        <form action="javascript:void(0)" id="update-student-password" method="post">
                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-oldpassword" class="text-label">Current Password</label>
                                    <input type="password" class="form-control student-update mt-4" id="student-oldpassword" placeholder="Enter Old Password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-password" class="text-label">New Password</label>
                                    <input type="password" class="form-control student-update myCpwdClass" id="student-update-password" name="password" placeholder="Password" required />

                                </div>
                                <div id="PwdInvalid" style="margin-left:120px" class="invalid-feedback">Password Does Not Match</div>
                                <div id="PwdValid" style="margin-left:120px" class="valid-feedback">Password Matched</div>
                            </div>

                            <div class="mb-3">
                                <div class="text-input d-inline-flex align-items-center">
                                    <label for="student-update-confirmpassword" class="text-label">Confirm Password</label>
                                    <input type="password" class="form-control student-update myCpwdClass" id="student-update-confirmpassword" placeholder="Confirm your Password" required />

                                </div>
                                <div id="cPwdInvalid" style="margin-left:120px" class="invalid-feedback">Password Does Not Match</div>
                                <div id="cPwdValid" style="margin-left:120px" class="valid-feedback">Password Matched</div>
                            </div>


                            <div class="form-footer account-settings mt-4">
                                <input type="submit" id="save-institution" name="save" value="Save Changes" class="btn btn-custom-primary">
                            </div>
                    </div>
                    </form>
                </div>

            </div>

    </div>

    </section>
</main>

<script>
    $('#student-update-password, #student-update-confirmpassword').on('keyup', function() {
        if ($('#student-update-password').val() != $('#student-update-confirmpassword').val() || $('#student-update-password').val().length == 0 && $('#student-update-confirmpassword').val().length == 0) {
            $('#cPwdValid').hide();
            $('#PwdValid').hide();

            $('#PwdInvalid').show();
            $('#cPwdInvalid').show();

            $('.myCpwdClass').addClass('is-invalid');
            $('.myCpwdClass').removeClass('is-valid');
        } else {
            $('#PwdValid').show();
            $('#cPwdValid').show();

            $('#PwdInvalid').hide();
            $('#cPwdInvalid').hide();

            $('.myCpwdClass').addClass('is-valid');
            $('.myCpwdClass').removeClass('is-invalid');
        }
    });
</script>

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
                $('#student-password').val(res.password);
                $('#student-update-lname').val(res.lname);
                $('#student-update-email').val(res.email);
                $('#student-update-contact').val(res.contact_no);
            }
        });

    });
</script>

<script>
    $('#update-student-password').submit(function() {
        var user_id = $('#student-id').val();
        var old_password = $('#student-oldpassword').val();

        var password = $('#student-update-password').val();

        Swal.fire({
            title: 'Are you sure you want to change your password?',
            text: "This action cannot be reverted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Save Changes',
            reverseButtons: true,
            allowOutsideClick: false,
            customClass: {
                confirmButton: 'edit-primary-button'
            },

        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "query/student-update-password.php",
                    data: {
                        user_id: user_id, //fieldname in the database : data-id value
                        old_password: old_password,
                        password: password
                    },
                    dataType: 'json',

                    success: function(data) {
                        if (data == 'Password Matched') {
                            Swal.fire({
                                title: 'Password Changed!',
                                text: "You have succesfully change your password",
                                icon: 'success',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else if (data == 'WRONG') {
                            Swal.fire({
                                title: 'Wrong Password Credentials!',
                                html: "Your current password does not match to our database.<br> We cannot update your password, Please try again!",
                                icon: 'error',
                            }).then(function() {
                                window.location.reload();
                            });
                        }
                        console.log(data)

                    },
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        console.log(error);
                    }
                });
            } else {
                Swal.fire({
                    title: "No Changes Were Saved!",
                    text: "Your password is just same as the last time!",
                    icon: 'warning',
                })
            }
        });

    });
</script>