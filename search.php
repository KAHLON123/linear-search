<?php
$randArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
anArray($randArray, 37);
function anArray($arr, $item){
    $out = -1;
    foreach($arr as &$value) {
        if ($value == $item){
            $out = 
            
        } 
        // else do nothing
    }
    return $out;
}

binarySearch($randArray, 2);
function binarySearch($arr, $item){
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