$(document).ready(function () {

    jQuery(".view").click(function () {
        var id = $(this).data('id');
console.log(id);


        $.ajax({
            type: 'POST',
            url: 'query/institution-getid-view.php',
            data: {
                institution_id: id
            },
            dataType: 'json',
            success: function (res) {
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

$(document).ready(function () {

    jQuery(".add").click(function () {
        $('#add_institution_modal').modal('show');

        $("#save-institution").click(function () {

            var name = $("#institution-add-name").val();
            var street = $("#institution-add-street").val();
            var barangay = $("#institution-add-barangay").val();
            var municipality_city = $("#institution-add-municipality-city").val();
            var province = $("#institution-add-province").val();
            var status = $(".add-status:checked").val();




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
                    dataType: 'json',
                    success: function (data) {
                        if (data == "Institution Added") {
                            Swal.fire({
                                title: 'Institution Added!',
                                icon: 'success',
                            }).then(function () {
                                window.location.reload();
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                });
            } else {
                alert("please fill up the fields")
                return false;
            }
        });
    });
})





$(document).ready(function () {

    $("body").on('click', '.edit', function (e) {
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
                    url: 'query/institution-getid-view.php',
                    data: {
                        institution_id: id //fieldname in the database : data-id value
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#update_modal').modal('show');
                        $('#institution-id').val(res.institution_id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                        $('#institution-update-name').val(res.name);
                        $('#institution-update-code').val(res.code);
                        $('#institution-update-street').val(res.street_name);
                        $('#institution-update-barangay').val(res.barangay);
                        $('#institution-update-municipality-city').val(res.municipality_city);
                        $('#institution-update-province').val(res.province);
                    }
                });
            }
        });
    });
});



$('#update-institution').submit(function () {
    var id = $("#institution-id").val();
    console.log(id);
    var name = $("#institution-update-name").val();
    var code = $("#institution-update-code").val();
    var street = $("#institution-update-street").val();
    var barangay = $("#institution-update-barangay").val();
    var municipality_city = $("#institution-update-municipality-city").val();
    var province = $("#institution-update-province").val();
    var status = $(".update-status:checked").val();
    
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
                url: "query/institution-update-tbl.php",
                data: {
                    institution_id : id,
                    name: name,
                    code: code,
                    street_name: street,
                    barangay: barangay,
                    municipality_city: municipality_city,
                    province: province,
                    status: status
                }, // get all form field value in 
                dataType: 'json',

                success: function (data) {
                    Swal.fire({
                        title: 'Record Updated!',
                        text: "You have succesfully modified this record",
                        icon: 'success',
                    }).then(function () {
                        window.location.reload();
                    });
                }, error: function (error) {
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

    $("body").on('click', '.delete', function (e) {
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
                    url: 'query/institution-delete-tbl.php',
                    data: {
                        institution_id: id
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
