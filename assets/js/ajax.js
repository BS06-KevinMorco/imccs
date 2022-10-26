
/* STUDENT ASSESSMENT */
/*$('.insert-chosen-assessment').submit(function (event) {
    event.preventDefault();
    console.log("clicked")

    var user_id = $('#user-id').val();
    var assessment_id = $(this).closest('form').find('input[name=assessment-id]').val();
    console.log(user_id);
    console.log(assessment_id);

    Swal.fire({
        title: 'Do you want to choose this Assessment?',
        text: "Press CONFIRM to proceed!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'CONFIRM',
        reverseButtons: true,
        allowOutsideClick: false,
        customClass: {
            confirmButton: 'edit-primary-button'
        },

    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: "query/student-save-assessment.php",
                data: {
                    user_id: user_id,
                    assessment_id: assessment_id

                },
                dataType: 'json',

                success: function (data) {
                    if (data == 'You have already taken this topic') {
                        Swal.fire({
                            title: 'You have already taken this Assessment!',
                            text: "Please choose another one",
                            icon: 'warning',
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK'
                        })
                    } else if (data == 'Not Active') {
                        Swal.fire({
                            title: 'This Assessment is not active!',
                            text: "Please contact the administrator for further details",
                            icon: 'warning',
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'OK'
                        })
                    }
                    else {
                        window.location = 'home-student.php?page=student-progress-assessment&assessment_id=' + assessment_id;
                        console.log(data);
                    }

                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(error);
                }
            });
        }
    });

});*/

/* END STUDENT ASSESSMENT */



/* VIEW TOPIC */

$('.btn-view-lesson').click(function (t) {
    var id = $(this).data('id');

    console.log(id);
    Swal.fire({
        title: 'Do you want to choose this topic?',
        text: "Press CONFIRM to proceed!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'CONFIRM',
        reverseButtons: true,
        allowOutsideClick: false,
        customClass: {
            confirmButton: 'edit-primary-button'
        },

    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "section-pages/test2.php",
                data: {
                    lesson_id: id,

                },

                success: function (data) {
                    console.log(data)

                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(error);
                }
            });
        }
    });

});


$.get("query/validate-topic.php", function (data) {
    if (data == 'taken') {
        $('.btn-chose-topic').val('Resume')
    }
    else {
        $('.btn-chose-topic').val('Get Started')
    }
});



$('#insert-chosen').submit(function () {
    var myVariable;

    event.preventDefault();

    var user_id = $('#user-id').val();
    var lesson_id = $('#lesson-id').val();
    var title = $('#title').val();

    console.log(user_id);
    console.log(lesson_id);

    Swal.fire({
        title: 'Do you want to choose this topic?',
        text: "Press CONFIRM to proceed!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'CONFIRM',
        reverseButtons: true,
        allowOutsideClick: false,
        customClass: {
            confirmButton: 'edit-primary-button'
        },

    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "query/student-save-topic.php",
                data: {
                    user_id: user_id,
                    lesson_id: lesson_id,
                    title: title

                },
                dataType: 'json',

                success: function (data) {
                    console.log(data);
                    if (data == 'You have already taken this topic') {
                        Swal.fire({
                            title: 'You have already chosen this topic',
                            text: "Continue your progress on this topic?",
                            icon: 'warning',
                            showCancelButton: true,
                            reverseButtons: true,
                            closeOnCancel: true,
                            confirmButtonColor: '#800000',
                            confirmButtonText: 'Yes, Continue',


                        }).then((result) => {
                            if (result.value) {
                                window.location = 'home-student.php?page=student-progress-topic&title=' + title;

                            } else {
                                // something other stuff
                            }

                        })
                    } else {
                        window.location = 'home-student.php?page=student-progress-topic&title=' + title;
                        console.log(data)
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(error);
                }
            });
        }
    });

});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

/* END VIEW TOPIC */






