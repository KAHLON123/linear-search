<!DOCTYPE html>
<html>
  <head>
    <title>Sort Analyzer</title>
  </head>

  <body>
    <h1>Sort Analyzer</h1>
    <p>
      Explore how long it takes various sort algorithms to sort different sets
      of data.
    </p>
  </body>
</html>
<?php
// break if use === in comparisons
//$intArray = array ();
//$strArray = explode(',', $string);
//foreach ($strArray as $value)
//$intArray [] = intval ($value);

$nearlyArr = file("data/nearlySort.txt");
$randomArr = file("data/randomVal.txt");
$reversedArr = file("data/reversedVal.txt");
$uniqueArr = file("data/unique.txt");

// SORT FUNCTIONS
$start = microtime(true);
insertionSort($reversedArr);
$end =  microtime(true);
$total = $end - $start;
echo $total;

function bubbleSort($arr){
    for ($i = 1; $i < count($arr); $i++ ) {
        for ($n = 0; $n < count($arr) - 1; $n++) {
            if ($arr[$n] > $arr[$n + 1]) {
                $hold = $arr[$n];
                $arr[$n] = $arr[$n + 1];
                $arr[$n + 1] = $hold;
            }
        }
    }
}
function selectionSort($arr){
    $count = count($arr);
    for ($i = 0; $i < $count - 1; $i++) {
        $mid = $i;
        for ($n = $i + 1; $n < $count; $n++) {
            if ($arr[$n] < $arr[$mid]) {
                $mid = $n;
            }
        }
        $hold = $arr[$mid];
        $arr[$mid] = $arr[$i];
        $arr[$i] = $hold;
    }
}
function insertionSort($arr){
    $count = count($arr);
    for ($i = 1; $i < $count; $i++) {
        $insert = $arr[$i];
        $position = $i - 1;
        while ($insert < $arr[$position] && $position >= 0) {
            $arr[$position + 1] = $arr[$position];
            $arr[$position] = $insert;
            $position--;
        }
    }
}
?>