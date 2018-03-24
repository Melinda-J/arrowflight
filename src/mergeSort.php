<?php
/**
 * 归并排序
 * @param  array &$arr 待排序的数组
 * @return
 */
function mergeSort(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    // 将数组平均拆分成两组
    $middle   = floor($size / 2);
    $leftArr  = array_slice($arr, 0, $middle);
    $rightArr = array_slice($arr, $middle);
    $func     = __FUNCTION__;
    $func($leftArr);
    $func($rightArr);
    // 若$leftArr末位元素小于$rightArr首位元素，直接合并两数组
    if (end($leftArr) < $rightArr[0]) {
        $arr = array_merge($leftArr, $rightArr);
        return;
    }
    // 从两数组首位开始比较数组元素大小，较小元素存入$arr
    $i   = $j   = 0;
    $arr = array();
    while ($i < count($leftArr) && $j < count($rightArr)) {
        if ($leftArr[$i] < $rightArr[$j]) {
            $arr[] = $leftArr[$i];
            $i++;
        } else {
            $arr[] = $rightArr[$j];
            $j++;
        }
    }
    // 剩余元素直接存入$arr
    while ($i < count($leftArr)) {
        $arr[] = $leftArr[$i];
        $i++;
    }
    while ($j < count($rightArr)) {
        $arr[] = $rightArr[$j];
        $j++;
    }
    return;
}

$arr = [10, 5, 6, 2, 7, 3, 9, 8, 4, 1];
mergeSort($arr);
print_r($arr);
