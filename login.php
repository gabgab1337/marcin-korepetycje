<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="login">Podaj Login</label>
        <input type="text" name="login"></input>
        <label for="haslo">Podaj haslo</label>
        <input type="password" name="haslo"></input>
        <input type="submit" value="zaloguj">
    </form>


    <?php
        $poprawny_login = 'admin';
        $poprawne_haslo = '1234';


        if (isset($_POST['login'])){
            $login = $_POST["login"];
            $haslo = $_POST["haslo"];
           if($login == $poprawny_login && $haslo == $poprawne_haslo){
            echo "Zalogowano pomyślnie!";
           }else{
            echo "Błędny login lub hasło.";
           }

        }
    ?>




</body>
</html>