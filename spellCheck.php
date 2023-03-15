<!DOCTYPE html>
<html>

<head>
  <title>Spell Check</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Spell Check Assignment</h1>
  <hr>
  <h2>Single Word Spell Check</h2>
  <p>Enter a Word: <input type="text" id="word"></p>
<section>
    <form method="GET">
      <input type="text" name="word-in">
      <selection>
        <option name="word-linear">Spell Check A Word (linear)</option>
        <option name="word-binary">Spell Check A Word (Binary)</option>
        <option name="alice-linear">Check Alice (Linear)</option>
        <option name="alice-binary">Check Alice (Binary)</option>
      </selection>
    </form>
</section>
  <h2>Alice in Wonderland Spell Check</h2>

<?php
$alice = file("data-files/alice-in-wonderland", NULL);
$dictionary = file("data-files/dictionary", NULL);
$in = $_GET['word-in'];
switch (isset()) {
  case $_GET['word-linear']:
    linear($dictionary, $in);
    break;
  case $_GET['word-binary']:
    binary($dictionary, $in);
    break;
  case $_GET['alice-linear']:
    linear($alice, $in);
    break;
  case $_GET['alice-binary']:
    binary($alice, $in);
    break;
}

function linear($arr, $item) {
  foreach($arr as &$value) {
    if ($value == $item){
        echo "exists in array at index ", $value;
    } 
    // else do nothing
}
}

function binary($arr, $item){
  $lowI = 0;
  $highI = sizeof($arr) - 1;
  while ($lowI<= $highI) {
      $midI = (int)floor(($lowI + $highI) / 2);
      if ($arr[$midI] > $item) {
          $highI = $midI - 1;
      } elseif ($arr[$midI] < $item) {
          $lowI = $midI + 1;
      } else {
          echo $midI;
          break;
      }
  }
}

?>
</html>

</body>