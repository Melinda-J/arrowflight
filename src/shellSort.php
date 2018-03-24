<?php
/**
 * 希尔排序
 * @param  array &$arr 待排序的数组
 * @return
 */
function shellSort(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    // 将数组所有元素按步长$step进行分组，对每个分组分别排序
    $step = floor($size / 2);
    // 步长为1时，排序完成
    while ($step >= 1) {
        // 对每个分组执行插入排序
        for ($i = $step; $i < $size; $i++) {
            for ($j = $i - $step; $j >= 0; $j -= $step) {
                if ($arr[$j + $step] > $arr[$j]) {
                    break;
                }
                $tmp             = $arr[$j];
                $arr[$j]         = $arr[$j + $step];
                $arr[$j + $step] = $tmp;
            }
        }
        $step = floor($step / 2);
    }
    return;
}

$arr = [5, 3, 2, 6, 7, 9, 10, 1, 8, 4];
shellSort($arr);
print_r($arr);
