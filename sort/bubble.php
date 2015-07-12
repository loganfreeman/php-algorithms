<?php
function bubbing(Array $arr) {
    $i = 0;
    $length = count($arr);
    for (; $i < $length; $i++) {
        $j = $i + 1;
        for (; $j<$length; $j++) {
            if ($arr[$j] > $arr[$i]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
    }
    return $arr;
}
$unsorted = array (12,45,28,30,88,67);
echo "Before sort:";
print_r($unsorted);
echo '<br/>';
echo 'After bubbing:';
print_r(bubbing($unsorted));
?>