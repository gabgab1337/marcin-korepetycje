<?php

$db = mysqli_connect("localhost","root","","test");
// $conn = new mysqli("localhost","root","","test");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
 if($_SERVER['REQUEST_METHOD'] == 'POST' && $db){
    $kolumna=$_POST['kolumna'];
    $sql="SELECT ".$kolumna." FROM randomtesttable LIMIT 50;";
    $result=$db->query($sql);

    ob_start();

    if ($result && $result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
        // if  ($kolumna == "kolumna")
        //     echo "$row->kolumna" . "<br>";
        echo $row[$kolumna] . "<br>"; // można zapisać do tablicy
    }
    }
    else {
      echo "error";
    }

    $do_zapisania = ob_get_clean();

    setcookie("wynik",$do_zapisania,time() + 3600,"/"); // potem wrzucasz tablice do cookie
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
  <form method="post">
    <label for="kolumna">nazwa kolumny</label>
    <input type="text" name="kolumna" id="kolumna">
    <button type="submit">wyszukaj</button>
</form>

<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo $do_zapisania; // foreach do wypisania tablicy
 } 
 else if (isset($_COOKIE["wynik"])) {
    echo $_COOKIE["wynik"];
 }
?>

</body>
</html>