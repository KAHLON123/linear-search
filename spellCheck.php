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
        <option value="alice-linear">Check Alice (Linear)</option>
        <option value="alice-binary">Check Alice (Binary)</option>
      </select>
      <input type="submit" name="submit" value='submit'>
    </form>
</section>

<?php
// load files into array (separated by whitespace)
$alice = "data-files/alice-in-wonderland.txt";
$cont = file_get_contents($alice, FILE_IGNORE_NEW_LINES);
$aliceArr = explode(" ", $cont);
var_dump($aliceArr);
// load files into array (separated by line)
$dictionaryArr = file("data-files/dictionary.txt");

if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['selection'];

  switch ($s) {
  case 'word-linear':
    linear($dictionaryArr, $in);
    break;
  case 'word-binary':
    binary($dictionaryArr, $in);
    break;
  case 'alice-linear':
    linear($aliceArr, $in);
    break;
  case 'alice-binary':
    binary($aliceArr, $in);
    break;
}
}

function linear($arr, $item) {
  foreach($arr as &$value) {
    if ($value == $item){
        echo "exists in array at index ", $value;
    } 
    echo "does not exist in array";
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

</body>
</html>