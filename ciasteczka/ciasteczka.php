<!-- Stwórz tryb ciemny i tryb jasny na stronie. Zapisz preferencje użytkownika w ciasteczku. -->
<?php
 if(isset($_POST["color-scheme"])){
    $kolor = $_POST["color-scheme"];
    setcookie("kolor", $kolor, time() + (84600 * 30), "/");
 }

 if(isset($_COOKIE["kolor"])) {
  $wybrany_kolor = $_COOKIE["kolor"];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
        background-color: <?php echo $wybrany_kolor; ?>;
        color: <?php if($wybrany_kolor == "black") { echo "white"; } else { echo "black"; } ?>;
    }
    
  </style>
</head>
<body>
    <form method="POST">
      <input type="radio" name="color-scheme" value="black" id="black">
      <label for="dark">Tryb ciemny</label>
      <input type="radio" name="color-scheme" value="white" id="white">
      <label for="light">Tryb jasny</label>
      <input type="submit" value="wybieram">
    </form>


</body>
</html>

<?php
    
  // if (isset($_COOKIE["username"])) {
  //   $ciasteczko = htmlspecialchars($_COOKIE["username"]);
  //   echo "Witaj " . $ciasteczko;
  // } else {
  //   echo "Nie ma takiego ciasteczka!";
  // }
?>
<?php
  // setcookie("username", "gabihan123", time() + (3600 * 6), "/");
  // setcookie("username", "", time() - 3600, "/");
?>