<?php
session_start();

if (isset($_SESSION['licznik'])) {
  $_SESSION['licznik']++;
} else {
  $_SESSION['licznik'] = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>witaj</h1>
  <?php
    echo "<p>Odwiedziełs strone " . $_SESSION['licznik'] . "razy w trakcie tej sesji.</p>";
  ?>
</body>
</html>