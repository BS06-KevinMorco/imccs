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
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="test-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header modal-xl">
                <h3 class="modal-title">test</h3>
            </div>
            <div class="modal-body">
                <form id="form1" name="form1" class="needs-validation" method="post" novalidate>
                    <div class="container">
                        <div class="row">
                            <input type="text" name="" id="lesson-id">
                            <div class="col-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="fname" placeholder="First Name" required />
                                <div class="invalid-feedback">
                                    Please enter your first name.
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="lname" placeholder="Last Name" required />
                                <div class="invalid-feedback">
                                    Please enter your last name.
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn modal-cancel" type="button" data-bs-dismiss="modal">Close</button>
                <input type="submit" id="submit" name="save" value="Save" class="btn btn-submit">
            </div>
            </form>
        </div>
    </div>
</div>