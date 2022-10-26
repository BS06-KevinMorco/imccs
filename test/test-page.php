<?php
@$page = $_GET['page'];


if ($page != '') {
    if ($page == "test1") {
        include("test1.php");
    }
    else if ($page == "test2") {
        include("test2.php");
    }
} else {
    include("test2.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <a href="test-page.php?page=test1" id="test">
        <i class="bi bi-circle"></i><span>Test1</span>
    </a>
    <a href="test-page.php?page=test2" id="test">
        <i class="bi bi-circle"></i><span>test2</span>
    </a>
</body>

</html>