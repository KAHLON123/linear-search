<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
// echo anArray($randArray, 2);
// function anArray($randArray, $item){
//     $out = 0;
//     for ($i = 0; $i < count($randArray); $i++) {
//         if ($item == $arr[$i]) {
//         $out = $i;
//         }
//     }
//     return $out;  
// }

echo binarySearch($randArray, 123);
// function binarySearch($arr, $item){
//     $out = -1;
//     $lowI = 0;
//     $highI = sizeof($arr) - 1;
//     while ($lowI<= $highI) {
//         $midI = (int)floor(($lowI + $highI) / 2);
//         if ($arr[$midI] > $item) {
//             $highI = $midI - 1;
//         } elseif ($arr[$midI] < $item) {
//             $lowI = $midI + 1;
//         } else {
//             $out = $midI;
//             break;
//         }
//     }
//     return $out;
// }

function binarySearch($arr, $item){
    $lowI = 0;
    $highI = sizeof($arr) - 1;
    while ($lowI<= $highI) {
        $midI = (int)floor(($lowI + $highI) / 2);
        if ($arr[$midI] == $item) {
            return $midI;
        } elseif ($arr[$midI] > $item) {
            $highI = $midI - 1;
        } else if($arr[$midI+1] < $item){
          $lowI = $midI + 1;
        }
    }
    return -1;
}
?>