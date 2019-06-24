<?php
/**
 * 堆排序
 *
 * @param array $arr 待排序的数组
 */
function heapSort(&$arr)
{
    $size = count($arr);
    for ($i = $size - 1; $i > 0; $i--) {
        // 堆中最后一个父元素的索引
        $lastParent = intval($size / 2) - 1;
        for ($j = $lastParent; $j >= 0; $j--) {
            // 左侧子元素索引
            $leftChild = 2 * $j + 1;
            // 右侧子元素索引
            $rightChild = 2 * $j + 2;
            // 若左侧子元素大于父元素，交换两元素位置
            if ($arr[$leftChild] > $arr[$j]) {
                list($arr[$leftChild], $arr[$j]) = [$arr[$j], $arr[$leftChild]];
            }
            // 若右侧子元素存在，且大于父元素，交换两元素位置
            if ($rightChild < $size && $arr[$rightChild] > $arr[$j]) {
                list($arr[$rightChild], $arr[$j]) = [$arr[$j], $arr[$rightChild]];
            }
        }
        // 循环结束后，最大元素位于数组首位，手动将最大元素移至末位，继续对剩余元素进行排序
        list($arr[0], $arr[$i]) = [$arr[$i], $arr[0]];
        --$size;
    }
}
