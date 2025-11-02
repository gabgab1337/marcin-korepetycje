<?php
session_start();
$action = "index.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    $zapamietaj = (isset($_POST['remember']));
    if ($zapamietaj) {
        setcookie("remember_user", $username, time() + (3600 * 24 * 7), "/");
    } else {
        setcookie("remember_user", $username, time() - (3600), "/");
    }
    
    $action = "panel.php";
    header('Location:' . $action);
    exit();
} elseif (isset($_COOKIE["remember_user"]) || !empty($_SESSION['username'])) {
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
    <form method="POST" action="<?php echo $action ?>">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="remember">zapamietaj hasło</label>
        <input type="checkbox" name="remember" id="remember">
        <button type="submit">zaloguj</button>
    </form>
</body>

</html>