<?php
$action = "index.php";
if (isset($_SESSION['username'])) {
    $action = "panel.php";
    header('Location:' . $action);
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $username = $_SESSION["username"];
    echo "użytkownik: " . $username . " zalogował sie na stronę <br>";
    ?>
    <form method="POST" action="logout.php">
        <button type="submit">wyloguj</button>
    </form>
</body>

</html>