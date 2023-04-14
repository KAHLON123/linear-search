<!DOCTYPE html>
<html>

<head>
  <title>Spell Check</title>
</head>

<body>
  <h1>Spell Check Assignment</h1>
  <hr>
<h2>Part A</h2> 
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
$alice = "alice-in-wonderland.txt";
$cont = file_get_contents($alice, FILE_IGNORE_NEW_LINES);
$aliceArr = explode(" ", $cont);
$dictionaryArr = file("dictionary.txt", FILE_IGNORE_NEW_LINES);

if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['selection'];
  switch ($s) {
    case 'word-linear':
      $index = linear($dictionaryArr, $in);
      display($index);
      break;
    case 'word-binary':
      $index = binary($dictionaryArr, $in);
      display($index);
      break;
    case 'alice-linear':
      $index = linear($aliceArr, $in);
      display($index);
      break;
    case 'alice-binary':
      $index = binary($aliceArr, $in);
      display($index);
      break;
  }
}

function linear($arr, $rawItem){
  $start = microtime(true);
  $item = strtolower($rawItem);
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
    $item = strtolower($rawItem);
    $start = microtime(true);
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
    echo "found at index ", $index;
  }
}
?>
<h2>Part B</h2>
<section>
    <form action="spellCheck.php" method="GET">
      <label>How do you want to check Alice In Wonderland</label>
      <select name="select">
        <option value="linear">Linear</option>
        <option value="binary">Binary</option>
      </select>
      <input type="submit" name="submit" value='submit'>
    </form>
</section>
<?php
if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['select'];
  switch ($s) {
    case 'linear':
   
      break;
    case 'binary':
     
      break;
  }
}

function checkAlice(){
  
}
?>


</body>
</html>