<?php
/**
 * 堆排序
 * @param  array &$arr 待排序的数组
 * @return
 */
function heapSort(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    for ($i = $size - 1; $i > 0; $i--) {
        // 堆中最后一个父元素的索引
        $lastParent = floor($size / 2) - 1;
        for ($j = $lastParent; $j >= 0; $j--) {
            // 左侧子元素索引
            $leftChild = 2 * $j + 1;
            // 右侧子元素索引
            $rightChild = 2 * $j + 2;
            // 若左侧子元素大于父元素，交换两元素位置
            if ($arr[$leftChild] > $arr[$j]) {
                swap($arr, $leftChild, $j);
            }
            // 若右侧子元素存在，且大于父元素，交换两元素位置
            if ($rightChild < $size && $arr[$rightChild] > $arr[$j]) {
                swap($arr, $rightChild, $j);
            }
        }
        // 循环结束后，最大元素位于数组首位，手动将最大元素移至末位，继续对剩余元素进行排序
        swap($arr, 0, $i);
        $size--;
    }
    return;
}

/**
 * 交换数组中两元素位置
 * @param  array   &$arr   待交换元素的数组
 * @param  integer $index1 元素一在数组中的位置
 * @param  integer $index2 元素二在数组中的位置
 * @return
 */
function swap(&$arr, $index1, $index2)
{
    $tmp          = $arr[$index1];
    $arr[$index1] = $arr[$index2];
    $arr[$index2] = $tmp;
}

$arr = [7, 10, 4, 1, 2, 9, 6, 3, 5, 8];
heapSort($arr);
print_r($arr);
