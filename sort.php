<!DOCTYPE html>
<html>
<head>
    <title>Sort Algorithims</title>
</head>
<body>

<h1>bubblesorddd</h1>
<?php
function printArr($arr){
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i], "<br/>";
    }
}

$nums = [10, 70, 30, 100, 40, 45, 90, 80, 85];
$words = ["dog","at", "good", "eye", "cat", "ball", "fish"];
bubblesort($nums);
bubblesort($words);
function bubblesort($arr){
    for ($i = 1; $i < count($arr);$i++ ) {
        for ($n = 0; $n < count($arr) - 1; $n++) {
            if ($arr[$n] > $arr[$n + 1]) {
                $hold = $arr[$n];
                $arr[$n] = $arr[$n + 1];
                $arr[$n + 1] = $hold;
            }
        }
    }
}
?>

<h1>selection srod</h1>
<?php
selectionSort($nums, count($nums));
selectionSort($words, count($words));
function selectionSort($arr, $count){
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
?>

<h1>Insertion Sort</h1>
<?php
insertionSort($words);
insertionSort($nums);
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
</body>
</html>