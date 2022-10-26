$(document).ready(function () {

    jQuery(".add-assessment").click(function () {
        $('#add-assessment-modal').modal('show');

        $("#assessment-add").on("submit", function (event) {

            event.preventDefault();
            var img = $('input[name=assessment-add-pic]').val();
            var title = $("#assessment-add-title").val();
            var description = $("#assessment-add-description").val();
            var difficulty = $("#assessment-add-difficulty").val();
            var estimated_time = $("#assessment-add-estimate-time").val();
            var unit_time = $("#assessment-add-unit-time").val();
            var status = $(".add-status:checked").val();


            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('difficulty', difficulty);
            formData.append('estimated_time', estimated_time);
            formData.append('unit_time', unit_time);
            formData.append('status', status);

            formData.append('img', $('input[name=img]')[0].files[0]);
            for (var key of formData.entries()) {
                console.log(key[0] + ', ' + key[1]);
            }


            $.ajax({
                type: "POST",
                url: 'query/assessment-add-tbl.php',
                data: formData,


                success: function (data) {
                    console.log(data);
                    console.log(formData)
                    Swal.fire({
                        title: 'Assessment Added',
                        text: "You have successfully added an assessment",
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

    jQuery(".view-assessment").click(function () {
        var id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'query/assessment-getid-view.php',
            data: {
                assessment_id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#view-assessment-modal').modal('show');
                $('#assessment-view-title').val(res.title);
                $('#assessment-view-description').val(res.description);
                $('#assessment-view-difficulty').val(res.difficulty);
                $('#assessment-view-estimate').val(res.estimated_time);

            }
        });

    });
});

$(document).ready(function () {

    $("body").on('click', '.edit-assessment', function (e) {
        var id = $(this).data('id');

        console.log(id)

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
                    url: 'query/assessment-getid-view.php',
                    data: {
                        assessment_id: id,
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log(res)
                        $('#update-assessment-modal').modal('show');
                        $('#assessment-id').val(res.assessment_id); //ID IN INPUT BOX AND RES IS FIELD NAME IN DATABASE 
                        $('#assessment-update-title').val(res.title);
                        $('#assessment-update-description').val(res.description);
                        $('#assessment-update-difficulty').val(res.difficulty);
                        $('#assessment-update-estimate').val(res.estimated_time);
                    }
                });
            }
        });
    });
});

$('#assessment-update').submit(function (event) {
    event.preventDefault();
    var assessment_id = $('#assessment-id').val();

    var update_img = $('input[name=assessment-update-pic]').val();
    var title = $('#assessment-update-title').val();
    var description = $('#assessment-update-description').val();
    var difficulty = $('#assessment-update-difficulty').val();
    var estimate = $('#assessment-update-estimate').val();
    var unit_time = $('#assessment-update-unit-time').val();
    var status = $(".update-status:checked").val();


    var formData = new FormData();
    formData.append('assessment_id', assessment_id);

    formData.append('title', title);
    formData.append('description', description);
    formData.append('difficulty', difficulty);
    formData.append('estimated_time', estimate);
    formData.append('unit_time', unit_time);
    formData.append('status', status);

    formData.append('update_img', $('input[name=update_img]')[0].files[0]);
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
                url: "query/assessment-update-tbl.php",
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

    $("body").on('click', '.delete-assessment', function (e) {
        var id = $(this).data('id');
        console.log(id);

        Swal.fire({
            title: 'Are you sure you want to delete this record?',
            text: "All questions and answers to this assessment would be deleted, You won't be able to retrieve this!",
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
                    url: 'query/assessment-delete-tbl.php',
                    data: {
                        assessment_id: id
                    },

                    success: function (data) {
                        console.log(data);
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

    jQuery(".add-choice").click(function () {
        $('#add-assessment-choice-modal').modal('show');
        $("#assessment-choice-add").on("submit", function (event) {

            event.preventDefault();
            var forms = document.querySelectorAll('.needs-validation')
            var assessment_id = $("#assessment-choice-id").val();
            var title = $("#assessment-choice-add-title").val();
            var assessment_question = $("#assessment-choice-question").val();
            var ch1 = $("#assessment-choice-add-ch1").val();
            var ch2 = $("#assessment-choice-add-ch2").val();
            var ch3 = $("#assessment-choice-add-ch3").val();
            var ch4 = $("#assessment-choice-add-ch4").val();
            var answer = $("#assessment-choice-add-answer").val();




            $.ajax({
                type: "POST",
                url: 'query/assessment-question-choices-add-tbl.php',
                data: {
                    title: title,
                    assessment_question: assessment_question,
                    assessment_choice1: ch1,
                    assessment_choice2: ch2,
                    assessment_choice3: ch3,
                    assessment_choice4: ch4,
                    assessment_answer: answer,
                },
                dataType: "json",

                success: function (data) {

                    console.log(data);
                    Swal.fire({
                        title: 'Question Choices Added',
                        text: "You have successfully added a choices for the question",
                        icon: 'success',
                        confirmButtonColor: '#800000',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result) {
                            $("#assessment-choice-add")[0].reset();

                            //window.location.reload();
                        } else {
                            // something other stuff
                        }

                    })

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

$(document).ready(function () {

    jQuery(".view-question").click(function () {
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            type: 'POST',
            url: 'query/assessment-question-choices-getid-view.php',
            data: {
                question_id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#view-assessment-choice-modal').modal('show');
                $("#assessment-choice-view-title").val(res.assessment_title);
                $("#assessment-choice-view-question").val(res.assessment_question);
                $("#assessment-choice-view-ch1").val(res.assessment_choice1);
                $("#assessment-choice-view-ch2").val(res.assessment_choice2);
                $("#assessment-choice-view-ch3").val(res.assessment_choice3);
                $("#assessment-choice-view-ch4").val(res.assessment_choice4);
                $("#assessment-choice-view-answer").val(res.assessment_answer);

            }
        });



    });


});

$(document).ready(function () {

    $("body").on('click', '.edit-question', function (e) {
        var id = $(this).data('id');
        console.log(id)
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
                    url: 'query/assessment-question-choices-getid-view.php',
                    data: {
                        question_id: id //fieldname in the database : data-id value
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#update-assessment-choice-modal').modal('show');
                        $("#assessment-choice-update-id").val(res.assessment_id);
                        $("#assessment-choice-question-id").val(res.question_id);

                        $("#assessment-choice-update-title option:selected").find(':selected').val(res.assessment_title);
                        $("#assessment-choice-update-question").val(res.assessment_question);
                        $("#assessment-choice-update-ch1").val(res.assessment_choice1);
                        $("#assessment-choice-update-ch2").val(res.assessment_choice2);
                        $("#assessment-choice-update-ch3").val(res.assessment_choice3);
                        $("#assessment-choice-update-ch4").val(res.assessment_choice4);
                        $("#assessment-choice-update-answer").val(res.assessment_answer);
                    }
                });
            }
        });
    });
});



$('#assessment-choice-update').submit(function (event) {
    event.preventDefault();
    var question_id =  $("#assessment-choice-question-id").val();
    var assessment_id = $("#assessment-choice-update-id").val();
    var title = $("#assessment-choice-update-title").val();
    var question = $("#assessment-choice-update-question").val();
    var ch1 = $("#assessment-choice-update-ch1").val();
    var ch2 = $("#assessment-choice-update-ch2").val();
    var ch3 = $("#assessment-choice-update-ch3").val();
    var ch4 = $("#assessment-choice-update-ch4").val();
    var answer = $("#assessment-choice-update-answer").val();
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
                url: "query/assessment-question-choices-update-tbl.php",
                data: {
                    assessment_id:assessment_id,
                    question_id: question_id,
                    assessment_title: title,
                    assessment_question: question,
                    assessment_choice1: ch1,
                    assessment_choice2: ch2,
                    assessment_choice3: ch3,
                    assessment_choice4: ch4,
                    assessment_answer: answer
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

    $("body").on('click', '.delete-question', function (e) {
        var id = $(this).data('id');
        console.log(id);

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
                    url: 'query/assessment-question-choices-delete-tbl.php',
                    data: {
                        question_id: id
                    },

                    success: function (data) {
                        console.log(data);
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


/* REFRESHER */

$('#add-assessment-choice-modal').on('hidden.bs.modal', function () { 
    window.location.reload();
});










