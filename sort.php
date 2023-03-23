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

$nums = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$selectionNums = [6, 9, 2, 3, 5];
$words = ["dog","at", "good", "eye", "cat", "ball", "fish"];
bubblesort($nums);
bubblesort($words);
function bubblesort($arr){ // problem: only iterates for index 0...
    for ($n = 0; $n < count($arr) - 1; $n++) {
        if ($arr[$n] > $arr[$n + 1]) {
            $hold = $arr[$n];
            $arr[$n] = $arr[$n + 1];
            $arr[$n + 1] = $hold;
        }
    
    }
    printArr($arr);
}
?>


<h1>selection srod</h1>
<?php
function selectionSort($arr){
    for ($n = 0; $n < count($arr) - 1; $n++) {
        $fill = $arr[$n];
        for ($n = 1; $n < count($arr) - 1; $n++) {
            if ()
        }
    }
}
?>
</body>
</html>