<head>
    <style>
        .form-control {
            margin-bottom: 10px;
        }

        .invalid {
            border-color: red;
        }

        .flash-error {
            color: red;
            display: none;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
            padding: 6px 12px;
            border-style: solid;
            border-width: 1px;
        }

        .btn-toggle-type input {
            display: none;
        }



        .tab p {
            font-size: 20px;
            margin: 0 0 10px 0;
        }

        .step {
            height: 30px;
            width: 30px;
            line-height: 30px;
            margin: 0 2px;
            color: white;
            background: maroon;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.25;
            position: relative;
        }

        .valid-feedback,
        .invalid-feedback {
            margin-bottom: 10px;
        }

        .password-message {
            background-color: #FEE3AA;
            width: 50%;
            border-radius: 20px;
        }

        .password-message p {
            font-size: 12px;
        }

        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            content: "\f058";
            margin-right: 10px;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;


        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            content: "\f057";
            margin-right: 10px;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }



        .cc-selector input {
            margin: 0;
            padding: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .cc-selector-2 input {
            position: absolute;
            z-index: 999;
        }

        .faculty {
            background-image: url("assets/images/form/faculty-button.png");
        }

        .student {
            background-image: url("assets/images/form/student-button.png");
        }

        .cc-selector-2 input:active+.drinkcard-cc,
        .cc-selector input:active+.drinkcard-cc {
            opacity: .9;
        }

        .cc-selector-2 input:checked+.drinkcard-cc,
        .cc-selector input:checked+.drinkcard-cc {
            -webkit-filter: none;
            -moz-filter: none;
            filter: none;
        }

        .drinkcard-cc {
            cursor: pointer;
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 400px;
            height: 400px;
            -webkit-transition: all 100ms ease-in;
            -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
            -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
            -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
        }

        .drinkcard-cc:hover {
            -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
            -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
        }

        .input-password-group {
            position: relative;
        }

        .eye-viewer {
            z-index: 9999;
            position: absolute;
            top: 30%;
            right: 10px;
            cursor: pointer;

        }

        .eye-viewer:hover {
            color: maroon;
        }

        .form-control.myCpwdClass {
            position: relative;
        }
    </style>
</head>
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="add_student_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Create an Account</h3>
            </div>
            <div class="modal-body">
                <form id="form1" name="form1" class="needs-validation" method="post" novalidate>
                    <div class="container">
                        <div class="custom-progress-bar">
                            <div class="mb-4" style="text-align:center;">
                                <span class="step" id="step-1">1</span>
                                <span class="step" id="step-2">2</span>
                                <span class="step" id="step-3">3</span>
                                <span class="step" id="step-4">4</span>
                            </div>
                        </div>

                        <div class="tab" id="tab-1">
                            <h4 class="mb-4">Your Fullname:</h4>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" placeholder="First Name" id="user-add-firstname" name="firstname" required>
                                <div class="invalid-feedback feedback-fname">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Please enter your first name.
                                </div>
                            </div>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" placeholder="Last Name" id="user-add-lastname" name="lastname">
                                <div class="invalid-feedback feedback-lname">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Please enter your last name.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="btn btn-submit" onclick="checkFormValue1();">Next</div>
                            </div>
                        </div>

                        <div class="tab" id="tab-2">
                            <h4 class="mb-4">Education Institution:</h4>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control  myInstitution" id="user-add-institution" name="institution" placeholder="Enter Institution" required />
                                <div id="institution-feedback" class="invalid-feedback">
                                </div>
                            </div>

                            <div class="input-group has-validation">
                                <select class="form-control form-select" name="grade_level" id="user-add-grade-level" required>
                                    <option value="" disabled selected>Please Select Grade Level</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                    <option value="" disabled>Please Select Year Level</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                    <option value="N/A">N/A</option>
                                </select>
                                <div class="invalid-feedback feedback-grade-level" id="feedback-grade-level">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="btn modal-cancel" onclick="run(2, 1);">Previous</div>
                                <div class="btn btn-submit" onclick="checkFormValue2();">Next</div>
                            </div>
                        </div>

                        <div class="tab" id="tab-3">
                            <h4 class="mb-4">Contact Details:</h4>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control myEmail" id="user-add-email" name="email" placeholder="Enter Email" required />
                                <div id="email-feedback" class="invalid-feedback"></div>
                            </div>

                            <div class="input-group has-validation">
                                <input type="text" class="form-control myContact" id="user-add-contact" name="contact" placeholder="Enter Contact Number " required />
                                <div id="contact-feedback" class="invalid-feedback"></div>
                            </div>



                            <div class="modal-footer">
                                <div class="btn modal-cancel" onclick="run(3, 2);">Previous</div>
                                <div class="btn btn-submit" onclick="checkFormValue3();">Next</div>
                            </div>
                        </div>

                        <div class="tab" id="tab-4">
                            <h4 class="mb-4">Setup Account:</h4>
                            <div class="d-flex justify-content-lg-center align-items-center">
                                <div id="message" class="password-message text-center px-4 pt-4 mb-3">
                                    <h6 class="mb-2">Password Validation:</h6>
                                    <p id="password-validation-lowercase" class="invalid">Must contain at least one <b>lowercase</b> letter</p>
                                    <p id="password-validation-uppercase" class="invalid">Must contain at least one <b>uppercase</b> letter</p>
                                    <p id="password-validation-number" class="invalid">Must contain at least one <b>number</b></p>
                                    <p id="password-validation-length" class="invalid">Length must be at least <b>8 characters</b></p>
                                    <p id="password-validation-match" class="invalid">Password must <b>match</b></p>

                                </div>
                            </div>

                            <div class="input-group has-validation">
                                <input type="text" class="form-control myUsername" id="user-add-username" name="username" placeholder="Username" required />
                                <div id="feedback-username" class="invalid-feedback"></div>
                            </div>


                            <div class="input-password-group">
                                <input type="password" class="form-control myCpwdClass" id="user-add-password" name="password" placeholder="Password" required />
                                <div class="eye-viewer">
                                    <i class="fa-solid fa-eye-slash" id="toggle-password"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback password-feedback"></div>


                            <div class="input-password-group">

                                <input type="password" class="form-control myCpwdClass" id="user-add-confirmpassword" placeholder="Confirm your Password" required />
                                <div class="eye-viewer">
                                    <i class="fa-solid fa-eye-slash" id="toggle-confirm-password"></i>
                                </div>
                            </div>

                            <div class="invalid-feedback password-feedback"></div>


                            <!--<label class="form-label">Who are you?</label>
                            <div class="btn-group btn-toggle-type" data-toggle="buttons">
                                <input type="radio" class="type" name="type" id="user-add-faculty" value="Faculty" checked />
                                <label for="user-add-faculty" class="btn btn-default"> I'm a faculty staff </label>
                                <input type="radio" class="type" name="type" id="user-add-student" value="Student" />
                                <label for="user-add-student" class="btn btn-default"> I'm a student </label>
                                <div class="invalid-feedback">
                                    Please choose one.
                                </div>
                            </div>-->


                            <div class="modal-footer">
                                <div class="btn modal-cancel" onclick="run(4, 3);">Previous</div>
                                <div class="btn btn-submit" onclick="checkFormValue4();">Next</div>
                            </div>
                        </div>

                        <div class="tab" id="tab-5">
                            <div class="cc-selector" style="text-align: center;">
                                <h3 class="mb-3">Final Step!</h3>
                                <h4 class="mb-4"> Indicate if you're a faculty or student </h4>
                                <input type="radio" class="type" name="type" id="user-add-faculty" value="Faculty" checked />
                                <label for="user-add-faculty" class="drinkcard-cc faculty" for="user-add-faculty"></label>
                                <input type="radio" class="type" name="type" id="user-add-student" value="Student" />
                                <label for="user-add-student" class="drinkcard-cc student" for="user-add-student"></label>
                            </div>

                            <div class="modal-footer">
                                <div class="btn modal-cancel" onclick="run(5, 4);">Previous</div>
                                <input type="submit" id="submit" name="save" value="Register Account" class="btn btn-submit">
                            </div>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Default tab
    $(".tab").css("display", "none");
    $("#tab-1").css("display", "block");

    function run(hideTab, showTab) {
        if (hideTab < showTab) { // If not press previous button
            // Validation if press next button
            var currentTab = 0;
            var fname = document.getElementById("fname");
            x = $('#tab-' + hideTab);
            y = $(x).find("input")
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    $(y[i]).css("background", "#ffdddd");
                    return false;
                }

            }
        }

        // Progress bar
        for (i = 1; i < showTab; i++) {
            $("#step-" + i).css("opacity", "1");
        }

        // Switch tab
        $("#tab-" + hideTab).css("display", "none");
        $("#tab-" + showTab).css("display", "block");
        $("input").css("background", "#fff");
    }

    function checkFormValue1() {
        if ($('#user-add-firstname').val().length == "" && $('#user-add-lastname').val().length == "") {
            $('#user-add-firstname').addClass('is-invalid');
            $('#user-add-lastname').addClass('is-invalid');
            invalidInput();

        } else if ($('#user-add-firstname').val().length == "") {
            $('.feedback-fname').show();
            $('#user-add-firstname').addClass('is-invalid');
            invalidInput();
        } else if ($('#user-add-lastname').val().length == "") {
            $('.feedback-lname').show();
            $('#user-add-lastname').addClass('is-invalid');
            invalidInput();

        } else {
            run(1, 2);


        }

    }

    function checkFormValue2() {

        if ($('#user-add-institution').val().length == "" && $('#user-add-grade-level')[0].selectedIndex <= 0) {
            $('#user-add-institution').addClass('is-invalid');
            $('#user-add-grade-level').addClass('is-invalid');
            $('.feedback-grade-level').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your grade level');
            $('#institution-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your institution name');
            invalidInput();
        } else if ($('#user-add-grade-level')[0].selectedIndex <= 0) {
            $('.feedback-grade-level').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your grade level');
            $('.feedback-grade-level').show();
            $('#user-add-grade-level').addClass('is-invalid');
            invalidInput();
        } else if ($('#user-add-institution').val().length == "") {
            $('#user-add-institution').addClass('is-invalid');

            invalidInput();

        } else if ($('#user-add-institution').hasClass('is-invalid') || $('#user-add-grade-level').hasClass('is-invalid')) {
            invalidInput();
        } else {
            run(2, 3);
        }

    }

    function checkFormValue3() {
        if ($('#user-add-email').val().length == "" && $('#user-add-contact').val().length == "") {
            $('#user-add-email').addClass('is-invalid');
            $('#user-add-contact').addClass('is-invalid');
            $('#email-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your email');
            $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your contact number');
            invalidInput();

        } else if ($('#user-add-email').hasClass('is-invalid') || $('#user-add-contact').hasClass('is-invalid')) {
            invalidInput();
        } else if ($('#user-add-email').val().length == "") {
            $('#user-add-email').addClass('is-invalid');

            $('#email-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your email');
            invalidInput();

        } else if ($('#user-add-contact').val().length == "") {
            $('#user-add-contact').addClass('is-invalid');

            $('#contact-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your contact number');
            invalidInput();
        } else if (!validatePhoneNumber()) {
            invalidInput();
        } else {
            run(3, 4);
        }
    }

    function checkFormValue4() {
        if ($('#user-add-username').val().length == "" && $('#user-add-password').val().length == "") {
            $('#user-add-username').addClass('is-invalid');
            $('#user-add-password').addClass('is-invalid');
            $('#user-add-confirmpassword').addClass('is-invalid');
            $('#feedback-username').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your username');
            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your password');
            $('.password-feedback').show();

            invalidInput();
        } else if ($('#user-add-username').val().length == "") {
            $('#user-add-username').addClass('is-invalid');
            $('#feedback-username').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your username');
            invalidInput();
        } else if ($('#user-add-password').val().length == "") {
            $('.password-feedback').html('<i class="fa-solid fa-triangle-exclamation"></i> Please enter your password');
            $('#user-add-password').addClass('is-invalid');
            $('#user-add-confirmpassword').addClass('is-invalid');
            $('.password-feedback').show();

            invalidInput();
        } else if ($('#user-add-username').hasClass('is-invalid') || ($('#user-add-password').hasClass('is-invalid'))) {
            invalidInput();
        } else {
            run(4, 5);

        }
    }
</script>

<script>
    $('#user-add-firstname').on('keyup', function() {
        $('#user-add-firstname').addClass('is-valid');
        $('#user-add-firstname').removeClass('is-invalid');
    })

    $('#user-add-lastname').on('keyup', function() {
        $('#user-add-lastname').addClass('is-valid');
        $('#user-add-lastname').removeClass('is-invalid');
    })
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#check').click(function() {
            $(this).is(':checked') ? $('#user-add-password').attr('type', 'text') : $('#user-add-password').attr('type', 'password');
        });
    });

    var togglePassword = document.querySelector("#toggle-password");
    var toggleConfirmPassword = document.querySelector("#toggle-confirm-password");
    var password = document.querySelector("#user-add-password");
    var confirmPassword = document.querySelector("#user-add-confirmpassword");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        var type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye");
    });

    toggleConfirmPassword.addEventListener("click", function() {
        // toggle the type attribute
        var type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
        confirmPassword.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye");
    });
</script>