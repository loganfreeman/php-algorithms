<?php
function selection($arr) {
    $i = 0;
    $length = count($arr);
    for (; $i < $length; $i++) {
       $j = $i + 1;
       $tmpIndex = $i;
        for (; $j < $length; $j++) {
            if ($arr[$j] < $arr[$tmpIndex]) {
                $tmpIndex = $j;
            }
        }
        if($tmpIndex != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$tmpIndex];
            $arr[$tmpIndex] = $tmp;
        }
    }
    return $arr;
}
$unsorted = array (12,45,28,30,88,67);
echo "Before sort:";
print_r($unsorted);
echo '<br/>';
echo 'After selection sort:';
print_r(selection($unsorted));
