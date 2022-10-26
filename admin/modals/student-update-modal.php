<div class="modal fade" id="update-student-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">Update Student Information</h3>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="POST" id="update-student">
                    <div class="row datatable">
                        <div class="col-6">
                            <input type="hidden" name="user_id" id="student-id">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control" id="student-update-fname" name="student-update-fname" placeholder="First Name" required />
                            <div class="invalid-feedback">
                                Please enter your first name.
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control" id="student-update-lname" name="student-update-lname" placeholder="Last Name" required />
                            <div class="invalid-feedback">
                                Please enter your last name.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Institution</label>
                            <input type="text" class="form-control" id="student-update-institution" name="student-update-institution" placeholder="Enter Institution Code" required />
                            <div class="invalid-feedback">
                                Please enter your institution code.
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Grade Level</label>
                            <select class="form-control form-select" name="student-update-grade-level" id="student-update-grade-level" required>
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
                            <input type="text" class="form-control" id="student-update-email" name="student-update-email" placeholder="Enter Email" required />
                            <div class="invalid-feedback">
                                Please enter your email.
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control" id="student-update-contact" name="student-update-contact" placeholder="Enter Contact Number " required />
                            <div class="invalid-feedback">
                                Please enter your contact number.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="student-update-username" name="student-update-username" placeholder="Username" required />
                            <div class="invalid-feedback">
                                Please enter your username.
                            </div>
                        </div>
                    
                    </div>

            </div>

            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="update" name="update" value="Update" class="btn modal-edit">
            </div>
            </form>
        </div>
    </div>
</div>