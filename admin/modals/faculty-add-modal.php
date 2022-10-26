<?php $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$code = substr(str_shuffle($chars), 0, 8); ?>
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

        input:checked+label {
            color: #fff;
            background-color: #941612;
            border-color: #dc3545;
        }
    </style>
</head>
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="add-faculty-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header modal-lg">
                <h3 class="modal-title">Register Faculty Account</h3>
            </div>
            <div class="modal-body">
                <form id="form-add-faculty" name="form1" class="needs-validation" method="post" novalidate>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control" id="faculty-add-firstname" name="fname" placeholder="First Name" required />
                                <div class="invalid-feedback">
                                    Please enter your first name.
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" id="faculty-add-lastname" name="lname" placeholder="Last Name" required />
                                <div class="invalid-feedback">
                                    Please enter your last name.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Institution</label>
                                <input type="text" class="form-control  myInstitution" id="faculty-add-institution" name="institution" placeholder="Enter Institution" required />
                                <div class="invalid-feedback" id="empty-field-institution">
                                    Please enter your institution code.
                                </div>


                                <div id="not-available-institution" class="invalid-feedback">Institution Not Available</div>
                                <div id="available-institution" class="valid-feedback">Institution Available</div>


                            </div>
                            <div class="col-12">
                                <label class="form-label">Grade Level</label>
                                <select class="form-control form-select" name="grade_level" id="faculty-add-grade-level" required>
                                <option value="" disabled selected>Please Select</option>
                                    <option value="" disabled>Please Select Grade Level</option>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" id="faculty-add-email" name="email" placeholder="Enter Email" required />
                                <div class="invalid-feedback">
                                    Please enter your email.
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Contact</label>
                                <input type="text" class="form-control myContact" id="faculty-add-contact" name="contact" placeholder="Enter Contact Number " required />
                                <div class="invalid-feedback" id="empty-field-contact">
                                    Please enter your contact number.
                                </div>

                                <div id="not-available-contact" class="invalid-feedback"></div>
                                <div id="available-contact" class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control myUsername" id="faculty-add-username" name="username" placeholder="Username" required />
                                <div class="invalid-feedback" id="empty-field-username">
                                    Please enter your username.
                                </div>

                                <div id="not-available-username" class="invalid-feedback">Username Already Taken</div>
                                <div id="available-username" class="valid-feedback">Username Available</div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="faculty-add-password" name="password" value="<?php echo $code ?>" placeholder="Password" required disabled/>
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>
                    
                            <div class="col-12 mt-3">
                                <input type="hidden" class="type" name="type" id="faculty-faculty" value="Faculty" />
                            </div>

                        </div>

            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
            <input type="submit" id="submit" name="save" value="Save" class="btn modal-edit">
        </div>
        </form>
    </div>
</div>
</div>