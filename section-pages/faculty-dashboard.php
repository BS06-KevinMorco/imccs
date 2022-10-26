<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Welcome Home Faculty</h1>
    <?php echo 'My ID is' . $_SESSION["user_id"] . ". My name is" .$_SESSION["username"]?>
    <a href="../logout.php">Logout</a>
    SAMPLE PAGE 1
    <div>HELLO THERE</div>
</head>

<body>

</body>

</html>