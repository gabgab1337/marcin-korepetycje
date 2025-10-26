<?php

// 1. Definicje gry i wartosci
define('COOKIE_NAME', 'clicker_data');
define('COOKIE_EXPIRY', time() + (86400 * 30));
// domyślne wartości
$cookies = 0;
$click_power = 1;

// 2. Ulepszenia

$upgrades = [
  // KLUCZ_NAZWA => [koszt, moc, nazwa do wyświetlenia]
  'klik1' => [10, 1, 'Myszka (+1 ciasteczka/klik)'],
  'klik2' => [50,5,'mocny click (+5 ciasteczka/klik'],
  'klik3' => [200,30,'jo cie dupia ale kliklo (+30 ciasteczka/klik)']
];

// 3. Odczytywanie danych z cookies
if (isset($_COOKIE[COOKIE_NAME])) {
  $data = json_decode(base64_decode($_COOKIE[COOKIE_NAME]), true);

  $cookies = (int)($data['cookies'] ?? $cookies);
  $click_power = (int)($data['click_power'] ?? $click_power);
}
// 4. Przetwarzanie żądań
// A. Logika kliknięcia
if (isset($_GET['action']) && $_GET['action'] == 'click') {
  $cookies += $click_power;
}

// B. Logika kupienia ulepszenia
if (isset($_GET['buy']) && array_key_exists($_GET['buy'], $upgrades)) {
  $upgrade_key = $_GET['buy']; // klik1
  $upgrade = $upgrades[$upgrade_key];  // [10, 1, 'Myszka (+1 ciasteczka/klik)']

  $cost = $upgrade[0];
  $power_increase = $upgrade[1];

  if ($cookies >= $cost) {
    $cookies -= $cost;
    $click_power += $power_increase;
  }
}

// C. Logika zapisywania danych do ciasteczka
$data_to_save = [
  'cookies' => $cookies,
  'click_power' => $click_power
];

// Serializacja Base64
$serialized_data = base64_encode(json_encode($data_to_save));

// Ustawiamy ciasteczko z nowymi danymi
setcookie(COOKIE_NAME, $serialized_data, COOKIE_EXPIRY, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="game-area">
    <!-- KLIKNIĘCIE 
    $_GET = [
      'action' => 'click'
      ]; 
    -->
    <p>Ciasteczka: <?php echo $cookies; ?></p>
    <p>Moc kliknięcia: <?php echo $click_power; ?></p>

    <a href="?action=click">
    <!-- KLIKNIĘCIE 
    OBRAZEK!!!
    -->
    <p>Kliknij mnie!</p>
    </a>

    <!-- ULEPSZENIA 
    $upgrades = [
      // KLUCZ_NAZWA => [koszt, moc, nazwa do wyświetlenia]
      'klik1' => [10, 1, 'Myszka (+1 ciasteczka/klik)'],
      'klik2' => [50,5,'mocny click (+5 ciasteczka/klik'],
      'klik3' => [200,30,'jo cie dupia ale kliklo (+30 ciasteczka/klik)']
    ]; 
    -->
    <h2>Ulepszenia:</h2>
    <?php foreach ($upgrades as $key => $details):
    $cost = $details[0];
    $name = $details[2];
    ?>
      <div class="upgrade">
        <strong><?php echo $name; ?></strong>
        <p>Koszt: <?php echo $cost; ?> ciasteczek</p>
        <a href="?buy=<?php echo $key; ?>">
          <p>Kup</p>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>