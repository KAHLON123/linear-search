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
$alice = "data/alice-in-wonderland.txt";
$cont = file_get_contents($alice, FILE_IGNORE_NEW_LINES);
$aliceArr = explode(" ", $cont);
$dictionaryArr = file("data/dictionary.txt", FILE_IGNORE_NEW_LINES);

if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['selection'];
  switch ($s) {
    case 'word-linear':
      $start = microtime(true);
      $index = linear($dictionaryArr, strtolower($in));
      $end = microtime(true);
      $total = $end - $start;
      display($index, $total);
      break;
    case 'word-binary':
      $start = microtime(true);
      $index = binary($dictionaryArr, strtolower($in));
      $end = microtime(true);
      $total = $end - $start;
      display($index, $total);
      break;
    case 'alice-linear':
      $start = microtime(true);
      $wordsNotPresent = 0;
      for ($i = 0; $i < count($aliceArr); $i++){
        $index = linear($dictionaryArr, strtolower($aliceArr[$i]));
        if ($index == -1){
          $wordsNotPresent++;
        }
      }
      $end = microtime(true);
      $total = $end - $start;
      echo $wordsNotPresent . " Words not found in Alice and Wonderland. Time taken: " . $total . "seconds.";
      break;
    case 'alice-binary':
      $start = microtime(true);
      $wordsNotPresent = 0;
      for ($i = 0; $i < count($aliceArr); $i++){
        $index = binary($dictionaryArr, strtolower($aliceArr[$i]));
        if ($index == -1){
          $wordsNotPresent++;
        }
      }
      $end = microtime(true);
      $total = $end - $start;
      echo $wordsNotPresent . " Words not found in Alice and Wonderland. Time taken: " . $total . "seconds.";
      break;
  }
}

function linear($arr, $item){
    for ($i = 0; $i < count($arr); $i++) {
        if ($item == $arr[$i]) {
          return $i;
        }
    }
    return -1;
}

function binary($arr, $item){
  $lowI = 0;
  $highI = sizeof($arr) - 1;
  while ($lowI <= $highI) {
      $midI = (int)floor(($lowI + $highI) / 2);
      if ($arr[$midI] == $item) {
        return $midI;
      } elseif ($arr[$midI] > $item) {
        $highI = $midI - 1;
      } else {
        $lowI = $midI + 1;
      }
  }
  return -1;
}

function display($index, $time){
  if ($index == -1) {
    echo "not found";
  } else {
    echo "found at index ". $index . ". Time taken: " . $time . "seconds.";
  }
}
?>

</body>
</html>