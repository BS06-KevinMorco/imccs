<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>Account Recovery</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="get-started">
    <div class="intro">
        <form action="javascript:void(0)" id="forgot-pass" method="post">
            <h4>Forgot your password?</h4>
            <p class="lead mb-4 mt-4"> To reset your password, please enter your email below: </p>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email here">
            <div class="text-end">
                <input type="submit" class="btn btn-custom-primary" name="reset" style="border-radius: 20px;" value="Send">
            </div>
        </form>
    </div>
</section>
<script>
    $('#forgot-pass').submit(function(event) {
        event.preventDefault();

        var email = $('#email').val();
        console.log(email);

        $.ajax({
            type: "POST",
            url: "query/mailer.php",
            data: {
                email: email

            },
            success: function(data) {
                if (data) {
                    Swal.fire({
                        title: 'Password reset link sent!',
                        text: "Please check your email",
                        icon: 'success',
                        confirmButtonColor: '#800000',
                        confirmButtonText: 'OK'
                    })
                }else{
                    Swal.fire({
                        title: 'Something Went Wrong!',
                        icon: 'error',
                        confirmButtonColor: '#800000',
                        confirmButtonText: 'OK'
                    })
                }

            },
            error: function(xhr, status, error) {
                console.log(xhr)
                console.log(error);
            }
        });

    });
</script>