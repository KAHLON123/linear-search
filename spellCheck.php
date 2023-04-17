<!DOCTYPE html>
<html>

<head>
  <title>Spell Check</title>
</head>

<body>
  <h1>Spell Check Assignment</h1>
  <hr>
<section>
    <form action="spellCheck.php" method="GET">
      <label>Enter A Word:</label>
      <input type="text" name="word-in"><br><br>
      <select name="selection">
        <option value="word-linear">Spell Check A Word (linear)</option>
        <option value="word-binary">Spell Check A Word (Binary)</option>
        <option value="alice-linear">Spell Check Alice (linear)</option>
        <option value="alice-binary">Spell Check Alice (Binary)</option>
      </select>
      <input type="submit" name="submit" value='submit'>
    </form>
</section>

<?php
// load files into array (separated by whitespace)
$alice = "alice-in-wonderland.txt";
$cont = file_get_contents($alice, FILE_IGNORE_NEW_LINES);
$aliceArr = explode(" ", $cont);
$dictionaryArr = file("dictionary.txt", FILE_IGNORE_NEW_LINES);

$wordsPresent = 0;

if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['selection'];
  switch ($s) {
    case 'word-linear':
      $start = microtime(true);
      $index = linear($dictionaryArr, strtolower($in));
      $end = microtime(true);
      display($index);
      break;
    case 'word-binary':
      $index = binary($dictionaryArr, strtolower($in));
      display($index);
      break;
    case 'alice-linear':
      for ($i = 0; $i < count($aliceArr); $i++){
        $index = linear($dictionaryArr, $aliceArr[$i]);
        if ($index != -1){
          $wordsPresent++;
        }
      }
      echo $wordsPresent . "Words found in Alice and Wonderland";
      break;
    case 'alice-binary':
       
      break;
  }
}

function linear($arr, $item){
  $start = microtime(true);
  $item = strtolower($rtem);
    for ($i = 0; $i < count($arr); $i++) {
        if ($item == $arr[$i]) {
          $end = microtime(true);
          $total = $end - $start;
          return $i . " Time taken: " . $total;
        }
    }
    return -1;
}

function binary($arr, $rawItem){
  $start = microtime(true);

  $item = strtolower($rawItem);
  $lowI = 0;
  $highI = sizeof($arr) - 1;
  while ($lowI <= $highI) {
      $midI = (int)floor(($lowI + $highI) / 2);
      if ($arr[$midI] == $item) {
        $end = microtime(true);
        $total = $end - $start;
        return $midI . " Time taken: " . $total;
      } elseif ($arr[$midI] > $item) {
        $highI = $midI - 1;
      } else {
        $lowI = $midI + 1;
      }
  }
  $end = microtime(true);
  $total = $end - $start;
  return -1;
}

function display($index){
  if ($index == -1) {
    echo "not found";
  } else {
    echo "found at index ". $index . ". Time taken: " . $time . "seconds.";
  }
}
?>

</body>
</html>