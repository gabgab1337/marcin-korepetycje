<?php
  session_start();
  $username = $_SESSION['username'];
  setcookie("remember_user", $username, time() - (3600), "/");
  echo "Wylogowano cię ze strony;"
  // Wersja typu redirect, czyli od razu przekierowanie
  // header('Location: index.php');
  // exit();
?>
<form action="index.php" method="GET">
  <input type="submit" value="powrot na strone logowania">
</form>
<?php 
session_destroy();
?>