<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: index.php');
}
?>

<?php include_once('database/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" />

    <title>IMCCS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.all.min.js"></script>


    <style>
        #loader {

            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('assets/front-page-assets/loader/loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
        }

        :root {
            scroll-behavior: smooth;

        }

        body::-webkit-scrollbar {
            width: 5px;
        }

        body::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        body::-webkit-scrollbar-thumb {
            background-color: #800000;
            outline: 1px solid var(--sidebar--header-color);
        }



        .swal2-cancel {
            border-radius: 10px !important;
            background-color: #fff !important;
            border: 2px solid #CCCCCC !important;
            color: black !important;
        }

        .swal2-cancel:hover {
            background-color: #e7e7e7 !important;
        }

        .swal2-confirm {
            border-radius: 10px !important;
            border: 2px solid #800000 !important;
            background-color: #800000 !important;
            color: #fff !important;
            box-shadow: none !important;

        }


        .navbar-nav a:after {
            display: block;
            content: '';
            border-bottom: solid 3px #fff;
            transform: scaleX(0);
            transition: transform 250ms ease-in-out;
            color: #fff;

        }

        .navbar-nav a:hover:not(.active):not(.collapse-profile-icon):after {
            transform: scaleX(1);
        }

        .navbar-nav a.active {
            display: block;
            content: '';
            border-bottom: solid 3px #fff;
        }
    </style>

    <?php include('templates/header.php') ?>

</head>

<body id="body">
    <?php
    //include('student-sidebar.php') 

    $arrNew = include('templates/navbar.php')

    ?>


    <?php
    @$page = $_GET['page'];
    if ($page != '') {
        if ($page == "student-welcome-page") {
            include("section-pages/student-welcome-page.php");
        } else if ($page == "student-browse-topics") {
            include("section-pages/student-browse-topics.php");
        } else if ($page == "student-assessment") {
            include("section-pages/student-assessment.php");
        } else if ($page == "student-update-profile-password") {
            include("section-pages/student-update-profile-password.php");
        } else if ($page == "student-test-view") {
            include("section-pages/student-test-view.php");
        } else if ($page == "student-progress-topic") {
            include("section-pages/student-progress-topic.php");
        } else if ($page == "student-progress-assessment") {
            include("section-pages/student-progress-assessment.php");
        } else if ($page == "result") {
            include("section-pages/result.php");
        } else {
            include("assets/404/404.html");
        }
    }
    ?>

    <?php
    @$subpage = $_GET['subpage'];
    if ($subpage != '') {
        if ($subpage == "change-password") {
            include("section-pages/change-password.php");
        } else if ($subpage == "personal-info") {
            include("section-pages/student-personal-info.php");
        } else if ($subpage == "student-assessment") {
            include("section-pages/student-assessment.php");
        } else if ($subpage == "student-update-profile-password") {
            include("section-pages/student-update-profile-password.php");
        } else if ($subpage == "student-test-view") {
            include("section-pages/student-test-view.php");
        } else {
            include("assets/404/404.html");
        }
    }
    ?>

    <?php
    @$lesson_id = $_GET['title'];
    if ($lesson_id != '') {
        if ($lesson_id == "Phishing Attacks") {
            include("section-pages/topic-pages/phishing-attacks.php");
        } else {
            include("assets/404/404.html");
        }
    }
    ?>


    <?php include('templates/footer-elements.php') ?>

    <script>
        $(document).ready(function() {

            document.onreadystatechange = function() {
                // page fully load
                if (document.readyState == "complete") {
                    // hide loader after 2 seconds
                    $("#loader").fadeOut(1000, function() {});
                }
            }
        });
    </script>

    <script>
        $(function($) {
            let url = window.location.href;
            $('ul > li a').each(function() {
                if (this.href === url) {
                    $(this).closest('a').addClass('active');
                }
            });
        });
    </script>

    <script>
        $(function($) {
            let url = window.location.href;
            $('ul.navbar-nav > li.nav-item a.ud-menu').each(function() {
                if (this.href === url) {
                    $(this).closest('a.ud-menu').addClass('active');
                }
            });
        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>