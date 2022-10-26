<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.all.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        :root {
            --font: "Roboto", sans-serif;
            --body-color: #637381;
            --title-color: #212b36;
            --title-color2: #F7D569;
            --primary-color: #800000;
            --primary-button-color: #EA640C;
            --white: #ffffff;
            scroll-behavior: smooth;

        }

        .page-banner {
            padding-top: 130px;
            padding-bottom: 80px;
            background: var(--primary-color);
            background-image: url("../images/banner/banner-bg.svg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-transform: uppercase;
        }

        .btn-custom-primary {
            display: inline-block;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            font-weight: 500;
            font-size: 16px;
            border-radius: 5px;
            padding: 15px 25px;
            border: 1px solid transparent;
            color: var(--white);
            cursor: pointer;
            z-index: 5;
            -webkit-transition: all 0.4s ease-out 0s;
            transition: all 0.4s ease-out 0s;
            background-color: var(--primary-color);
        }

        .btn-custom-primary:hover {
            background-color: var(--primary-button-color);
            color: var(--white);
        }

        input.password:focus {
            text-decoration: none !important;
            outline: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border-color: #800000;


        }
    </style>
</head>

<body>

    <section class="page-banner mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content text-center text-white">
                        <h1>Reset Password</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-started">
        <div class="container">

            <div class="intro">
                <form action="" method="post">
                    <h4>Reset Password</h4>
                    <p class="lead mb-4 mt-4"> Enter your new password below: </p>
                    <input class="form-control mb-4 password" type="email" id="email" name="email" placeholder="Enter Email" required>
                    <input class="form-control mb-4 password" type="password" id="password" name="newpassword" placeholder="Enter New Password" required>
                    <input class="form-control mb-4 password" type="password" name="confirmpassword" placeholder="Confirm Password" required>

                    <div class="text-end">
                        <input type="submit" class="btn btn-custom-primary" name="reset_pass" style="border-radius: 20px;" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>

    </section>

    <script type="text/javascript">
        function passChange() {
            Swal.fire({
                title: 'Password Changed!',
                text: "You can login now",
                icon: 'success',
                confirmButtonColor: '#800000',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'http://localhost/capstone/index.php'
            });
        }
    </script>

    <?php include '../query/change-password.php' ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>