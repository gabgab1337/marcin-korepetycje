<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- <form action="index.php" method="GET">
    <label for="imie">Podaj imię: </label>
    <input type="text" name="imie" id="imie">
    <input type="submit" value="Wyślij">
  </form>
  <?php
    // if (isset($_GET["imie"])) {
    //   $imie = $_GET["imie"];
    //   echo "Witaj " . $imie;
    // }
  ?> -->
  <form action="index.php" method="POST">
    <label for="imie">Podaj imię: </label>
    <input type="text" name="imie" id="imie">
    <label for="haslo">Podaj hasło: </label>
    <input type="password" name="haslo" id="haslo">
    <input type="submit" value="Wyślij">
  </form>
  <?php
    if (isset($_POST["imie"]) && isset($_POST["haslo"])) {
      $imie = $_POST["imie"];
      $haslo = $_POST["haslo"];
      echo "Otrzymalem haslo: " . $haslo . " od " . $imie;
    }
  ?>
</body>
</html>