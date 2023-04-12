<?php
$randArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
// echo anArray($randArray, 2);
// function anArray($arr, $item){
//     $out = 0;
//     for ($i = 0; $i < count($arr); $i++) {
//         if ($item == $arr[$i]) {
//         $out = $i;
//         }
//     }
//     return $out;  
// }

echo binarySearch($randArray, 11);
function binarySearch($arr, $item){
    $out = -1;
    $lowI = 0;
    $highI = sizeof($arr) - 1;
    while ($lowI<= $highI) {
        $midI = (int)floor(($lowI + $highI) / 2);
        if ($arr[$midI] > $item) {
            $highI = $midI - 1;
        } elseif ($arr[$midI] < $item) {
            $lowI = $midI + 1;
        } else {
            $out = $midI;
            break;
        }
    }
    return $out;
}
?>