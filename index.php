<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.all.min.js"></script>
<?php include_once('database/config.php'); ?>
<?php session_start() ?>
<?php
include_once('query/login-query.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMCCS</title>
    <!-- ====== Header Elements ====== -->
    <?php
    include_once('templates/header.php');
    ?>
    <!-- ====== Header Header Elements End ====== -->
</head>

<body>
    <!-- ====== Header Navigation Bar ====== -->
    <?php
    include_once('templates/navbar.php');
    ?>
    <?php
    include_once('modal/register-student.php');
    ?>

    <!-- PHP CODE USED FOR LOADING DYNAMICALLY PAGES WITHOUT RELOADING THE WHOLE ROUTE-->

    <?php
    @$page = $_GET['page'];

    if ($page != '') {
        if ($page == "login") {
            include("section-pages/login.php");
        } else if ($page == "forgot-password") {
            include("section-pages/forgot-password.php");
        } else if ($page == "forgot-password-change") {
            include("section-pages/forgot-password.php");
        }
    } else {
        include("section-pages/start-page.php");
        include('templates/footer.php');
    }
    ?>

    <?php include("templates/footer-elements.php"); ?>

    <script>
        function validatePhoneNumber() {
            // get value of input email
            var contact = $("#user-add-contact").val();
            // use reular expression
            var reg = new RegExp("(09)\\d{9}");
            if (reg.test(contact)) {
                return true;
            } else {
                return false;
            }

        }

        function validInteger() {
            // return theNumber.match(/^\d+$/) && parseInt(theNumber) > 0;

            var contact = $("#user-add-contact").val();
            var regex = /^[0-9]+$/;
            if (contact.match(regex)) {
                return true;
            }
        }

        function validateEmail() {
            // get value of input email
            var email = $("#user-add-email").val();
            // use reular expression
            var reg = new RegExp("^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@(gmail|yahoo|hotmail)+\.(com|org)$");
            if (reg.test(email)) {
                return true;
            } else {
                return false;
            }

        }

        function validatePassword() {
            // get value of input email
            var password = $("#user-add-password").val();
            // use reular expression
            var reg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$");
            if (reg.test(password)) {
                return true;
            } else {
                return false;
            }

        }

        function invalidInput() {
            Swal.fire({
                title: 'Cannot proceed to next step!',
                text: "Please check your inputs if they're valid.",
                icon: 'error',
                confirmButtonColor: '#800000',
                confirmButtonText: 'OK',
                allowOutsideClick: false,

            })

        }


        $(document).ready(function() {

            jQuery(".sign-in").click(function() {
                $('#add_student_modal').modal('show');
                $("#submit").attr("disabled", true);
                $('#form1 input').blur(function() {
                    if (!this.value) {
                        $("#submit").attr("disabled", true);
                    }
                });


                $('#user-add-password, #user-add-confirmpassword').on('keyup', function() {
                    var password = $('#user-add-password').val().trim();

                    if (password != '') {

                        var lowerCaseLetters = /[a-z]/g;
                        if ($('#user-add-password').val() == $('#user-add-confirmpassword').val()) {
                            $("#submit").attr("disabled", false);
                            $('.password-feedback').show();
                            $('.password-feedback').html('<i class="fa-solid fa-check"></i> Password matched');
                            $('.myCpwdClass').addClass('is-valid');
                            $('.password-feedback').addClass('valid-feedback');
                            $('#password-validation-match').addClass('valid');
                            $('.myCpwdClass').removeClass('is-invalid');
                            $('.password-feedback').removeClass('invalid-feedback');
                            $('#password-validation-match').removeClass('invalid');


                        } else {
                            $("#submit").attr("disabled", true);
                            $('.password-feedback').show();
                            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Password does not match');
                            $('.myCpwdClass').addClass('is-invalid');
                            $('.password-feedback').addClass('invalid-feedback');
                            $('#password-validation-match').addClass('invalid');
                            $('.myCpwdClass').removeClass('is-valid');
                            $('.password-feedback').removeClass('valid-feedback');
                            $('#password-validation-match').removeClass('valid');

                        }

                        var lowerCaseLetters = /[a-z]/g;
                        if ($('#user-add-password').val().match(lowerCaseLetters)) {
                            $('#password-validation-lowercase').addClass('valid');
                            $('#password-validation-lowercase').removeClass('invalid');
                        } else {
                            $('#password-validation-lowercase').addClass('invalid');
                            $('#password-validation-lowercase').removeClass('valid');
                            $('.myCpwdClass').addClass('is-invalid');
                            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Password validation is not met');
                            $('.password-feedback').addClass('invalid-feedback');

                        }

                        // Validate capital letters
                        var upperCaseLetters = /[A-Z]/g;
                        if ($('#user-add-password').val().match(upperCaseLetters)) {
                            $('#password-validation-uppercase').addClass('valid');
                            $('#password-validation-uppercase').removeClass('invalid');
                        } else {
                            $('#password-validation-uppercase').addClass('invalid');
                            $('#password-validation-uppercase').removeClass('valid');
                            $('.myCpwdClass').addClass('is-invalid');
                            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Password validation is not met');
                            $('.password-feedback').addClass('invalid-feedback');
                        }

                        // Validate numbers
                        var numbers = /[0-9]/g;
                        if ($('#user-add-password').val().match(numbers)) {
                            $('#password-validation-number').addClass('valid');
                            $('#password-validation-number').removeClass('invalid');
                        } else {
                            $('#password-validation-number').addClass('invalid');
                            $('#password-validation-number').removeClass('valid');
                            $('.myCpwdClass').addClass('is-invalid');
                            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Password validation is not met');
                            $('.password-feedback').addClass('invalid-feedback');
                        }

                        // Validate length
                        if ($('#user-add-password').val().length >= 8) {
                            $('#password-validation-length').addClass('valid');
                            $('#password-validation-length').removeClass('invalid');
                        } else {
                            $('#password-validation-length').addClass('invalid');
                            $('#password-validation-length').removeClass('valid');
                            $('.myCpwdClass').addClass('is-invalid');
                            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Password validation is not met');
                            $('.password-feedback').addClass('invalid-feedback');
                        }
                    } else {
                        $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your password');
                        $('.myCpwdClass').addClass('is-invalid');
                        $('.password-feedback').addClass('invalid-feedback');
                        $('.password-feedback').show();
                        $('#password-validation-lowercase').addClass('invalid');
                        $('#password-validation-capital').addClass('invalid');
                        $('#password-validation-number').addClass('invalid');
                        $('#password-validation-length').addClass('invalid');

                    }
                });



                $('#user-add-firstname').on('keyup', function() {
                    $('.feedback-fname').hide();
                    if ($('#user-add-firstname').val().length == "") {
                        $('#user-add-firstname').addClass('is-invalid');
                        $('.feedback-fname').show();

                    }
                });

                $('#user-add-lastname').on('keyup', function() {
                    $('.feedback-lname').hide();
                    if ($('#user-add-lastname').val().length == "") {
                        $('#user-add-lastname').addClass('is-invalid');
                        $('.feedback-lname').show();

                    }
                });

                $('#user-add-grade-level').on('change', function() {
                    $('#feedback-grade-level').hide();
                    if ($('#user-add-grade-level').val().length != "") {
                        $('#user-add-grade-level').addClass('is-valid');
                        $('#user-add-grade-level').removeClass('is-invalid');

                    } else {
                        $('#feedback-grade-level').show();
                        $('#feedback-grade-level').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your grade level');
                    }
                });


                $("#user-add-institution").keyup(function() {

                    var institution = $(this).val().trim();

                    if (institution != '') {

                        $.ajax({
                            url: 'query/validate-check-institution.php',
                            type: 'post',
                            data: {
                                institution: institution
                            },
                            dataType: "json",

                            success: function(response) {
                                console.log(response)
                                if (response == 'Institution Exists') {
                                    $('#institution-feedback').html('<i class="fa-solid fa-check"></i> Institution available');
                                    $('.myInstitution').addClass('is-valid');
                                    $('.myInstitution').removeClass('is-invalid');
                                    $('#institution-feedback').addClass('valid-feedback');
                                    $('#institution-feedback').removeClass('invalid-feedback');
                                } else if (response == 'Institution Doesnt Exist') {
                                    $('#institution-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Institution not available');
                                    $('.myInstitution').removeClass('is-valid');
                                    $('.myInstitution').addClass('is-invalid');
                                    $('#institution-feedback').removeClass('valid-feedback');
                                    $('#institution-feedback').addClass('invalid-feedback');
                                }


                            }
                        });
                    } else {
                        $('#institution-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your institution name');
                    }

                });

                $("#user-add-email").keyup(function() {

                    var email = $(this).val().trim();

                    if (email != '') {

                        $.ajax({
                            url: 'query/validate-check-email.php',
                            type: 'post',
                            data: {
                                email: email
                            },
                            dataType: "json",

                            success: function(response) {
                                console.log(response)
                                if (response == 'Email Exists') {
                                    $('#email-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Email is already taken');
                                    $('#empty-field-email').hide();
                                    $('.myEmail').removeClass('is-valid');
                                    $('.myEmail').addClass('is-invalid');
                                    $('#email-feedback').removeClass('valid-feedback');
                                    $('#email-feedback').addClass('invalid-feedback');
                                } else if (!validateEmail()) {
                                    $('.myEmail').removeClass('is-valid');
                                    $('.myEmail').addClass('is-invalid');
                                    $('#email-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Email is invalid format');
                                    $('#email-feedback').removeClass('valid-feedback');
                                    $('#email-feedback').addClass('invalid-feedback');
                                    $('#empty-field-email').hide();
                                } else {
                                    $('.myEmail').addClass('is-valid');
                                    $('.myEmail').removeClass('is-invalid');
                                    $('#empty-field-email').hide();

                                    $('#email-feedback').html('<i class="fa-solid fa-check"></i> Email is valid');
                                    $('#email-feedback').addClass('valid-feedback');
                                    $('#email-feedback').removeClass('invalid-feedback');

                                }


                            }
                        });
                    } else {
                        $('.myEmail').addClass('is-invalid');
                        $('#email-feedback').addClass('invalid-feedback');
                        $('#empty-field-email').show();
                        $('#email-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your email');


                    }

                });



                /* $("#user-add-email").keyup(function() {
                     if (validateEmail()) {


                         $('.myEmail').addClass('is-valid');
                         $('.myEmail').removeClass('is-invalid');
                         $('#empty-field-email').hide();

                         $("#user-add-email").css("border", "2px solid green");
                         $('#email-feedback').html('Email is valid');
                         $('#email-feedback').addClass('valid-feedback');
                         $('#email-feedback').removeClass('invalid-feedback');

                         console.log("valid")
                     } else if (!validateEmail()) {

                         $('.myEmail').removeClass('is-valid');
                         $('.myEmail').addClass('is-invalid');
                         $("#user-add-email").css("border", "2px solid red");
                         $('#email-feedback').html('Email is invalid format');
                         $('#email-feedback').removeClass('valid-feedback');
                         $('#email-feedback').addClass('invalid-feedback');
                         $('#empty-field-email').hide();

                         console.log("invalid")

                     }
                 });

                 function validateEmail() {
                     // get value of input email
                     var email = $("#user-add-email").val();
                     // use reular expression
                     var reg = new RegExp("^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@(gmail|yahoo|hotmail)+\.(com|org)$");
                     if (reg.test(email)) {
                         return true;
                     } else {
                         return false;
                     }

                 }*/

                $("#user-add-username").keyup(function() {

                    var username = $(this).val().trim();

                    if (username != '') {

                        $.ajax({
                            url: 'query/validate-check-username.php',
                            type: 'post',
                            data: {
                                username: username
                            },
                            dataType: "json",

                            success: function(response) {
                                console.log(response)
                                if (response == 'Username Exist') {
                                    $('#feedback-username').show();
                                    $('#feedback-username').html('<i class="fa-solid fa-triangle-exclamation"></i> Username is already taken');
                                    $('.myUsername').addClass('is-invalid');
                                    $('.myUsername').removeClass('is-valid');
                                    $('#feedback-username').addClass('invalid-feedback');
                                    $('#feedback-username').removeClass('valid-feedback');
                                } else if (username.length < 5) {
                                    $('#feedback-username').html('<i class="fa-solid fa-triangle-exclamation"></i> Username must be atleast 5 characters');
                                    $('#feedback-username').show();
                                    $('.myUsername').addClass('is-invalid');
                                    $('.myUsername').removeClass('is-valid');
                                    $('#feedback-username').addClass('invalid-feedback');
                                    $('#feedback-username').removeClass('valid-feedback');
                                } else {
                                    $('#feedback-username').html('<i class="fa-solid fa-check"></i> Username is available');
                                    $('#feedback-username').show();
                                    $('.myUsername').addClass('is-valid');
                                    $('.myUsername').removeClass('is-invalid');
                                    $('#feedback-username').addClass('valid-feedback');
                                    $('#feedback-username').removeClass('invalid-feedback');
                                    
                                }
                            }
                        });
                    } else {
                        $('#feedback-username').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your username');
                        $('.myUsername').addClass('is-invalid');
                        $('#feedback-username').addClass('invalid-feedback');

                    }

                });

                $("#user-add-contact").keyup(function() {

                    var contact = $(this).val().trim();

                    if (contact != '') {

                        $.ajax({
                            url: 'query/validate-check-contact-no.php',
                            type: 'post',
                            data: {
                                contact: contact
                            },
                            dataType: "json",

                            success: function(response) {
                                console.log(response)
                                if (response == 'This Number is Already Registered') {
                                    $('#contact-feedback').show();
                                    $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Contact number is already taken');
                                    $('#empty-field-contact').hide();
                                    $('.myContact').addClass('is-invalid');
                                    $('.myContact').removeClass('is-valid');
                                    $('#contact-feedback').removeClass('valid-feedback');
                                    $('#contact-feedback').addClass('invalid-feedback');
                                } else if (!validInteger()) {
                                    $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Wrong format  only include numbers');
                                    $('#contact-feedback').show();
                                    $('#empty-field-contact').hide();
                                    $('.myContact').addClass('is-invalid');
                                    $('.myContact').removeClass('is-valid');
                                    $('#contact-feedback').removeClass('valid-feedback');
                                    $('#contact-feedback').addClass('invalid-feedback');
                                } else if (contact.length != 11) {
                                    $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Contact number must be 11 numbers');
                                    $('#contact-feedback').show();
                                    $('#empty-field-contact').hide();
                                    $('.myContact').addClass('is-invalid');
                                    $('.myContact').removeClass('is-valid');
                                    $('#contact-feedback').removeClass('valid-feedback');
                                    $('#contact-feedback').addClass('invalid-feedback');
                                } else if (!validatePhoneNumber()) {
                                    $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Wrong format must include <b> 09 </b> at the beginning of contact number');
                                    $('#contact-feedback').show();
                                    $('#empty-field-contact').hide();
                                    $('.myContact').addClass('is-invalid');
                                    $('.myContact').removeClass('is-valid');
                                    $('#contact-feedback').removeClass('valid-feedback');
                                    $('#contact-feedback').addClass('invalid-feedback');
                                } else {
                                    $('#contact-feedback').show();
                                    $('#empty-field-contact').hide();
                                    $('#contact-feedback').html('<i class="fa-solid fa-check"></i> Contact number is valid');
                                    $('#contact-feedback').addClass('valid-feedback');
                                    $('#contact-feedback').removeClass('invalid-feedback');
                                    $('.myContact').addClass('is-valid');
                                    $('.myContact').removeClass('is-invalid');
                                }
                            }
                        });
                    } else {
                        $('.myContact').addClass('is-invalid');
                        $('#contact-feedback').addClass('invalid-feedback');

                        $('#empty-field-contact').show();
                        $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your contact number');

                    }

                });
            });
        });
    </script>

    <script>
        $("#form1").on("submit", function(e) {
            event.preventDefault();
            var forms = document.querySelectorAll('.needs-validation')
            var username = $("#user-add-username").val();
            var password = $("#user-add-password").val();
            var firstname = $("#user-add-firstname").val();
            var lastname = $("#user-add-lastname").val();
            var institution = $("#user-add-institution").val();
            var grade_level = $("#user-add-grade-level").val();
            var email = $("#user-add-email").val();
            var contact = $("#user-add-contact").val();
            var type = $(".type:checked").val();


            if ($('#form1')[0].checkValidity() === false) {
                event.stopPropagation();
            } else {
                $.ajax({
                    type: "POST",
                    url: 'query/registration.php',
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

                    success: function(data) {
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
                                    // Do Stuff here for success
                                    window.location = "index.php?page=login";
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
                    error: function(xhr, status, error) {
                        //console.error(xhr);
                        console.log(error);

                    }
                });
            }
            //$('#form1').addClass('was-validated');
        });
    </script>



    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script>
        var url = window.location.href;
        var index = url.lastIndexOf("/") + 1;
        var filename = url.substr(index);
        if (filename == "index.php?page=login") {
            $("nav").hide();
        };
    </script>
</body>

</html>