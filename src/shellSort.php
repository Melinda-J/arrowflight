<?php
/**
 * 希尔排序.
 *
 * @param array $arr 待排序的数组
 */
function shellSort(&$arr)
{
    // 将数组所有元素按步长$step进行分组，对每个分组分别排序，步长为1时，排序完成
    for ($size = count($arr), $step = $size >> 1; $step > 0; $step >>= 1) {
        // 对每个分组执行插入排序
        for ($i = $step; $i < $size; ++$i) {
            for ($j = $i - $step; $j >= 0; $j -= $step) {
                if ($arr[$j + $step] > $arr[$j]) {
                    break;
                }
                // 交换位置
                list($arr[$j], $arr[$j + $step]) = [$arr[$j + $step], $arr[$j]];
            }
        }
    }
}
