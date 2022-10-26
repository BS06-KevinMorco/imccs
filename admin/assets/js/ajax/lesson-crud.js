$(document).ready(function () {

    jQuery(".add-lesson").click(function () {
        $('#add-lesson-modal').modal('show');

        $("#lesson-add").on("submit", function (event) {

            event.preventDefault();
            var img = $('input[name=lesson-add-pic]').val();
            var title = $("#lesson-add-title").val();
            var description = $("#lesson-add-description").val();
            var difficulty = $("#lesson-add-difficulty").val();
            var estimated_time = $("#lesson-add-estimate-time").val();
            var unit_time = $("#lesson-add-unit-time").val();
            var lesson_paragraph = $("#lesson-add-paragraph").val();
            var status = $(".add-status:checked").val();


            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('difficulty', difficulty);
            formData.append('estimated_time', estimated_time);
            formData.append('unit_time', unit_time);
            formData.append('lesson_paragraph', lesson_paragraph);
            formData.append('status', status);

            formData.append('img', $('input[name=img]')[0].files[0]);
            for (var key of formData.entries()) {
                console.log(key[0] + ', ' + key[1]);
            }


            $.ajax({
                type: "POST",
                url: 'query/lesson-add-tbl.php',
                data: formData,


                success: function (data) {
                    console.log(data);
                    console.log(formData)
                    Swal.fire({
                        title: 'Topic Added',
                        text: "You have successfully added a topic",
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

                },
                contentType: false,
                processData: false,
                cache: false,
                error: function (xhr, status, error) {
                    //console.error(xhr);
                    console.log(error);

                }

            });
            //}
        });

    });

});

$(document).ready(function () {

    jQuery(".view-lesson").click(function () {
        var id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'query/lesson-getid-view.php',
            data: {
                lesson_id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#view-lesson-modal').modal('show');
                $('#lesson-view-title').val(res.title);
                $('#lesson-view-description').val(res.description);
                $("#lesson-view-difficulty").val(res.difficulty);
                $("#lesson-view-estimate-time").val(res.estimated_time);
                $("#lesson-view-paragraph").val(res.lesson_paragraph);

            }
        });

    });
});

$(document).ready(function () {

    $("body").on('click', '.edit-lesson', function (e) {
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
                    url: 'query/lesson-getid-view.php',
                    data: {
                        lesson_id: id //fieldname in the database : data-id value
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#update-lesson-modal').modal('show');
                        $('#lesson-id').val(res.lesson_id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                        $('#lesson-update-title').val(res.title);
                        $('#lesson-update-description').val(res.description);
                        $("#lesson-update-difficulty").val(res.difficulty);
                        $("#lesson-update-estimate-time").val(res.estimated_time);
                        $("#lesson-update-paragraph").val(res.lesson_paragraph);
                        $('#lesson-update-pic').val(res.lesson_img);

                    }
                });
            }
        });
    });
});

$('#lesson-update').submit(function (event) {
    event.preventDefault();
    var lesson_id = $('#lesson-id').val();
    var title = $('#lesson-update-title').val();
    var description = $('#lesson-update-description').val();
    var difficulty = $("#lesson-update-difficulty").val();
    var estimated_time = $("#lesson-update-estimate-time").val();
    var unit_time = $("#lesson-update-unit-time").val();
    var lesson_paragraph = $("#lesson-update-paragraph").val();
    var status = $(".update-status:checked").val();

    var formData = new FormData();
    formData.append('lesson_id', lesson_id);

    formData.append('title', title);
    formData.append('description', description);
    formData.append('difficulty', difficulty);
    formData.append('estimated_time', estimated_time);
    formData.append('unit_time', unit_time);
    formData.append('lesson_paragraph', lesson_paragraph);
    formData.append('status', status);


    formData.append('lesson-update-pic', $('input[name=lesson-update-pic]')[0].files[0]);
    for (var key of formData.entries()) {
        console.log(key[0] + ', ' + key[1]);
    }

    Swal.fire({
        title: 'Are you sure you want to update this record?',
        text: "This action cannot be reverted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Update!',
        reverseButtons: true,
        allowOutsideClick: false,


    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "query/lesson-update-tbl.php",
                data: formData,

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
                contentType: false,
                processData: false,
                cache: false,
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

    $("body").on('click', '.delete-lesson', function (e) {
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
                    url: 'query/lesson-delete-tbl.php',
                    data: {
                        lesson_id: id
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

    $("body").on('click', '.delete-question', function (e) {
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
                    url: 'query/question-delete-tbl.php',
                    data: {
                        question_id: id
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






