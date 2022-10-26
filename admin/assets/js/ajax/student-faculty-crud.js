$("#user-add-institution").keyup(function () {

    var institution = $(this).val().trim();

    if (institution != '') {

        $.ajax({
            url: 'query/validate-check-institution.php',
            type: 'post',
            data: {
                institution: institution
            },
            dataType: "json",

            success: function (response) {
                console.log(response)
                if (response == 'Institution Exist') {
                    $('#available-institution').show();
                    $('#not-available-institution').hide();
                    $('#empty-field-institution').hide();
                    $('.myInstitution').addClass('is-valid');
                    $('.myInstitution').removeClass('is-invalid');
                } else {
                    $('#not-available-institution').show();
                    $('#available-institution').hide();
                    $('#empty-field-institution').hide();
                    $('.myInstitution').addClass('is-invalid');
                    $('.myInstitution').removeClass('is-valid');
                }


            }
        });
    } else {
        //standby
    }

});

$("#faculty-add-institution").keyup(function () {

    var institution = $(this).val().trim();

    if (institution != '') {

        $.ajax({
            url: 'query/validate-check-institution.php',
            type: 'post',
            data: {
                institution: institution
            },
            dataType: "json",

            success: function (response) {
                console.log(response)
                if (response == 'Institution Exist') {
                    $('#available-institution').show();
                    $('#not-available-institution').hide();
                    $('#empty-field-institution').hide();
                    $('.myInstitution').addClass('is-valid');
                    $('.myInstitution').removeClass('is-invalid');
                } else {
                    $('#not-available-institution').show();
                    $('#available-institution').hide();
                    $('#empty-field-institution').hide();
                    $('.myInstitution').addClass('is-invalid');
                    $('.myInstitution').removeClass('is-valid');
                }


            }
        });
    } else {
        //standby
    }

});

$("#user-add-username").keyup(function () {

    var username = $(this).val().trim();

    if (username != '') {

        $.ajax({
            url: 'query/validate-check-username.php',
            type: 'post',
            data: {
                username: username
            },
            dataType: "json",

            success: function (response) {
                console.log(response)
                if (response == 'Username Exist') {
                    $('#not-available-username').show();
                    $('#not-available-username').html('Username is Already Taken');
                    $('#available-username').hide();
                    $('#empty-field-username').hide();
                    $('.myUsername').addClass('is-invalid');
                    $('.myUsername').removeClass('is-valid');
                } else if (username.length < 5) {
                    $('#not-available-username').html('Username must be atleast 5 characters');
                    $('#not-available-username').show();
                    $('#empty-field-username').hide();
                    $('.myUsername').addClass('is-invalid');
                    $('.myUsername').removeClass('is-valid');
                } else {
                    $('#available-username').show();
                    $('#not-available-username').hide();
                    $('#empty-field-username').hide();
                    $('.myUsername').addClass('is-valid');
                    $('.myUsername').removeClass('is-invalid');
                }
            }
        });
    } else {
        //standby
    }

});

$("#user-add-contact").keyup(function () {

    var contact = $(this).val().trim();

    if (contact != '') {

        $.ajax({
            url: 'query/validate-check-contact-no.php',
            type: 'post',
            data: {
                contact: contact
            },
            dataType: "json",

            success: function (response) {
                console.log(response)
                if (response == 'This Number is Already Registered') {
                    $('#not-available-contact').show();
                    $('#not-available-contact').html('Contact Number is Already Taken');
                    $('#available-contact').hide();
                    $('#empty-field-contact').hide();
                    $('.myContact').addClass('is-invalid');
                    $('.myContact').removeClass('is-valid');
                } else if (contact.length != 11) {
                    $('#not-available-contact').html('Contact Number must be 11 characters');
                    $('#not-available-contact').show();
                    $('#empty-field-contact').hide();
                    $('.myContact').addClass('is-invalid');
                    $('.myContact').removeClass('is-valid');
                } else {
                    $('#available-contact').show();
                    $('#not-available-contact').hide();
                    $('#empty-field-contact').hide();
                    $('.myContact').addClass('is-valid');
                    $('.myContact').removeClass('is-invalid');
                }
            }
        });
    } else {
        //standby
    }

});




// CRUD STUDENTS ADMIN DASHBOARD 
$(document).ready(function () {

    jQuery(".view-student").click(function () {
        var id = $(this).data('id');

        $('#view-student-modal').modal('show');

        $.ajax({
            type: 'POST',
            url: 'query/student-getid-view.php',
            data: {
                user_id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#view-student-modal').modal('show');
                $('#student-view-fname').val(res.fname);
                $('#student-view-lname').val(res.lname);
                $('#student-view-institution').val(res.institution);
                $('#student-view-grade-level').val(res.grade_level);
                $('#student-view-email').val(res.email);
                $('#student-view-contact').val(res.contact_no);
                $('#student-view-username').val(res.username);

            }
        });
    });
});

$(document).ready(function () {

    $("body").on('click', '.edit-student', function (e) {
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
                    url: 'query/student-getid-view.php',
                    data: {
                        user_id: id //fieldname in the database : data-id value
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#update-student-modal').modal('show');
                        $('#student-id').val(res.user_id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                        $('#student-update-fname').val(res.fname);
                        $('#student-update-lname').val(res.lname);
                        $('#student-update-institution').val(res.institution);
                        $('#student-update-grade-level').val(res.grade_level);
                        $('#student-update-email').val(res.email);
                        $('#student-update-contact').val(res.contact_no);
                        $('#student-update-username').val(res.username);

                    }
                });
            }
        });
    });
});



$('#update-student').submit(function () {
    var user_id = $('#student-id').val();
    var fname = $('#student-update-fname').val();
    var lname = $('#student-update-lname').val();
    var institution = $('#student-update-institution').val();
    var grade_level = $('#student-update-grade-level').val();
    var email = $('#student-update-email').val();
    var contact = $('#student-update-contact').val();
    var username = $('#student-update-username').val();
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
                url: "query/student-update-tbl.php",
                data: {
                    user_id: user_id, //fieldname in the database : data-id value
                    fname: fname,
                    lname: lname,
                    institution: institution,
                    grade_level: grade_level,
                    email: email,
                    contact: contact,
                    username: username
                },
                dataType: 'json',

                success: function (data) {
                    Swal.fire({
                        title: 'Record Updated!',
                        text: "You have succesfully modified this record",
                        icon: 'success',
                    }).then(function () {
                        window.location.reload();
                    });
                },
                error: function (error) {
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



$(document).ready(function () {

    $("body").on('click', '.delete-student', function (e) {
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
                    url: 'query/student-delete-tbl.php',
                    data: {
                        user_id: id
                    },

                    success: function (data) {
                        Swal.fire({
                            title: "Record Deleted",
                            icon: 'success',
                            text: "It is lost forever",
                        }).then(function () {
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

$(document).ready(function () {

    jQuery(".add-student").click(function () {
        $('#add-student-modal').modal('show');

        $("#form-add-student").on("submit", function (event) {

            event.preventDefault();
            var forms = document.querySelectorAll('.needs-validation')
            var username = $("#student-add-username").val();
            var password = $("#student-add-password").val();
            var firstname = $("#student-add-firstname").val();
            var lastname = $("#student-add-lastname").val();
            var institution = $("#student-add-institution").val();
            var grade_level = $("#student-add-grade-level").val();
            var email = $("#student-add-email").val();
            var contact = $("#student-add-contact").val();
            var type = $("#student-student").val();
            console.log(institution);
            console.log(username);


            if ($('#form-add-student')[0].checkValidity() === false) {
                event.stopPropagation();
            } else {
                $.ajax({
                    type: "POST",
                    url: 'query/student-add-tbl.php',
                    data: {
                        username: username,
                        password: password,
                        usertype: type,
                        fname: firstname,
                        lname: lastname,
                        institution: institution,
                        grade_level: grade_level,
                        email: email,
                        contact: contact,


                    },
                    dataType: "json",

                    success: function (data) {
                        console.log(data);

                        if (data == 'Existing Code') {
                            Swal.fire({
                                title: 'Registration Complete!',
                                text: "You have successfully registered",
                                icon: 'success',
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result) {
                                    window.location.reload();

                                } else {
                                    // something other stuff
                                }

                            })
                        } else if (data == 'Email Exists Already') {
                            Swal.fire({
                                title: 'Registration Failed!',
                                text: "Email Already Exists, try another one",
                                icon: 'error',
                                showCancelButton: true,
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK',
                                reverseButtons: true,
                                allowOutsideClick: false,


                            })
                        } else if (data == 'Username Length is Invalid') {
                            Swal.fire({
                                title: 'Registration Failed!',
                                text: "Invalid Username, try another one",
                                icon: 'error',
                                showCancelButton: true,
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK',
                                reverseButtons: true,
                                allowOutsideClick: false,

                            })

                        } else if (data == 'Contact Number Length is Invalid') {
                            Swal.fire({
                                title: 'Registration Failed!',
                                text: "Invalid Contact Number, Must be 11 characters",
                                icon: 'error',
                                showCancelButton: true,
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK',
                                reverseButtons: true,
                                allowOutsideClick: false,

                            })
                        } else {
                            Swal.fire({
                                title: 'Registration Failed!',
                                text: "Your institution doesn't exist on our database, try again next time",
                                icon: 'error',
                                showCancelButton: true,
                                confirmButtonColor: '#800000',
                                confirmButtonText: 'OK',
                                reverseButtons: true,
                                allowOutsideClick: false,

                            })
                        }
                    },
                    error: function (xhr, status, error) {
                        //console.error(xhr);
                        console.log(error);

                    }

                });
            }
            $('#form-add-student').addClass('was-validated');
        });

    });

});



// END CRUD STUDENTS ADMIN DASHBOARD 

// CRUD FACULTY ADMIN DASHBOARD 

$(document).ready(function () {

    jQuery(".view-faculty").click(function () {
        var id = $(this).data('id');

        $('#view-faculty-modal').modal('show');

        $.ajax({
            type: 'POST',
            url: 'query/faculty-getid-view.php',
            data: {
                user_id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#view-faculty-modal').modal('show');
                $('#faculty-view-fname').val(res.fname);
                $('#faculty-view-lname').val(res.lname);
                $('#faculty-view-institution').val(res.institution);
                $('#faculty-view-grade-level').val(res.grade_level);
                $('#faculty-view-email').val(res.email);
                $('#faculty-view-contact').val(res.contact_no);
                $('#faculty-view-username').val(res.username);

            }
        });
    });
});



$(document).ready(function () {

    $("body").on('click', '.edit-faculty', function (e) {
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
                    url: 'query/faculty-getid-view.php',
                    data: {
                        user_id: id //fieldname in the database : data-id value
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#update-faculty-modal').modal('show');
                        $('#faculty-id').val(res.user_id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                        $('#faculty-update-fname').val(res.fname);
                        $('#faculty-update-lname').val(res.lname);
                        $('#faculty-update-institution').val(res.institution);
                        $('#faculty-update-grade-level').val(res.grade_level);
                        $('#faculty-update-email').val(res.email);
                        $('#faculty-update-contact').val(res.contact_no);
                        $('#faculty-update-username').val(res.username);

                    }
                });
            }
        });
    });
});



$('#update-faculty').submit(function () {
    var user_id = $('#faculty-id').val();
    var fname = $('#faculty-update-fname').val();
    var lname = $('#faculty-update-lname').val();
    var institution = $('#faculty-update-institution').val();
    var grade_level = $('#faculty-update-grade-level').val();
    var email = $('#faculty-update-email').val();
    var contact = $('#faculty-update-contact').val();
    var username = $('#faculty-update-username').val();
    console.log(username)

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
                url: "query/faculty-update-tbl.php",

                data: {
                    'user_id': user_id, //fieldname in the database : data-id value
                    'fname': fname,
                    'lname': lname,
                    'institution': institution,
                    'grade_level': grade_level,
                    'email': email,
                    'contact': contact,
                    'username': username
                },

                success: function (data) {
                    console.log(data)
                    Swal.fire({
                        title: 'Record Updated!',
                        text: "You have succesfully modified this record",
                        icon: 'success',
                    }).then(function () {
                        window.location.reload();
                    });
                },
                error: function (error) {
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



$(document).ready(function () {

    $("body").on('click', '.delete-faculty', function (e) {
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
                    url: 'query/faculty-delete-tbl.php',
                    data: {
                        user_id: id
                    },

                    success: function (data) {
                        Swal.fire({
                            title: "Record Deleted",
                            icon: 'success',
                            text: "It is lost forever",
                        }).then(function () {
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



$(document).ready(function () {

    jQuery(".add-faculty").click(function () {
        $('#add-faculty-modal').modal('show');

        $("#form-add-faculty").on("submit", function (event) {

            event.preventDefault();
            var forms = document.querySelectorAll('.needs-validation')
            var username = $("#faculty-add-username").val();
            var password = $("#faculty-add-password").val();
            var firstname = $("#faculty-add-firstname").val();
            var lastname = $("#faculty-add-lastname").val();
            var institution = $("#faculty-add-institution").val();
            var grade_level = $("#faculty-add-grade-level").val();
            var email = $("#faculty-add-email").val();
            var contact = $("#faculty-add-contact").val();
            var type = $("#faculty-faculty").val();


            $.ajax({
                type: "POST",
                url: 'query/faculty-add-tbl.php',
                data: {
                    username: username,
                    password: password,
                    usertype: type,
                    fname: firstname,
                    lname: lastname,
                    institution: institution,
                    grade_level: grade_level,
                    email: email,
                    contact: contact,


                },
                dataType: "json",

                success: function (data) {
                    console.log(data);

                    if (data == 'Existing Code') {
                        Swal.fire({
                            title: 'Registration Complete!',
                            text: "You have successfully registered",
                            icon: 'success',
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result) {
                                window.location.reload();

                            } else {
                                // something other stuff
                            }

                        })
                    } else if (data == 'Email Exists Already') {
                        Swal.fire({
                            title: 'Registration Failed!',
                            text: "Email Already Exists, try another one",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK',
                            reverseButtons: true,
                            allowOutsideClick: false,


                        })
                    } else if (data == 'Username Length is Invalid') {
                        Swal.fire({
                            title: 'Registration Failed!',
                            text: "Invalid Username, try another one",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK',
                            reverseButtons: true,
                            allowOutsideClick: false,

                        })

                    } else if (data == 'Contact Number Length is Invalid') {
                        Swal.fire({
                            title: 'Registration Failed!',
                            text: "Invalid Contact Number, Must be 11 characters",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK',
                            reverseButtons: true,
                            allowOutsideClick: false,

                        })
                    } else {
                        Swal.fire({
                            title: 'Registration Failed!',
                            text: "Your institution doesn't exist on our database, try again next time",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK',
                            reverseButtons: true,
                            allowOutsideClick: false,

                        })
                    }
                },
                error: function (xhr, status, error) {
                    //console.error(xhr);
                    console.log(error);

                }

            });
            //}
        });

    });

});



    // END FACULTY ADMIN DASHBOARD 