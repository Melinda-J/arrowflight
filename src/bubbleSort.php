<?php
/**
 * 冒泡排序.
 *
 * @param array $arr 待排序的数组
 */
function bubbleSort(&$arr)
{
    // 外层循环，将剩余未排序数组元素中值最大的元素移至末位
    for ($size = count($arr), $i = 0; $i < $size - 1; ++$i) {
        // 内层循环，若当前元素的值比下一位元素值大，交换两元素位置
        for ($j = 0; $j < $size - $i - 1; ++$j) {
            if ($arr[$j] > $arr[$j + 1]) {
                list($arr[$j + 1], $arr[$j]) = [$arr[$j], $arr[$j + 1]];
            }
        }
    }
}
