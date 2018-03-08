<?php
/**
 * 二分查找(非递归)
 * @param  mixed   $search 查找目标值
 * @param  array   $arr    待检索的数组
 * @param  integer $start  起始查找位置
 * @param  integer $end    终止查找位置
 * @return integer         目标值在待检索数组中的位置
 */
function divideSearch($search, $arr, $start = null, $end = null)
{
    $size = count($arr);
    if ($size == 0) {
        return -1;
    }
    // 起始查找位置
    if (!isset($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (!isset($end)) {
        $end = $size - 1;
    }
    while ($end >= $start) {
        // 取数组中间元素索引
        $middle = floor(($start + $end) / 2);
        if ($search > $arr[$middle]) {
            // 若目标值大于中间元素，向后查找
            $start = $middle + 1;
        } else if ($search < $arr[$middle]) {
            // 若目标值小于中间元素，向前查找
            $end = $middle - 1;
        } else {
            // 若目标值等于中间元素，返回中间元素索引
            return $middle;
        }
    }
    return -1;
}

/**
 * 二分查找(递归)
 * @param  mixed $search  查找的目标值
 * @param  array $arr     待检索的数组
 * @param  integer $start 起始查找位置
 * @param  integer $end   终止查找位置
 * @return integer        目标值在待检所数组中的位置
 */
function halfSearch($search, $arr, $start = null, $end = null)
{
    $size = count($arr);
    if ($size == 0) {
        return -1;
    }
    // 起始查找位置
    if (!isset($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (!isset($end)) {
        $end = $size - 1;
    }
    if ($end < $start) {
        return -1;
    }
    // 中间元素索引
    $middle = floor(($start + $end) / 2);
    $func   = __FUNCTION__;
    if ($search > $arr[$middle]) {
        // 若目标值大于中间元素，向后查找
        $start = $middle + 1;
        return $func($search, $arr, $start, $end);
    } else if ($search < $arr[$middle]) {
        // 若目标值小于中间元素，向前查找
        $end = $middle - 1;
        return $func($search, $arr, $start, $end);
    } else {
        // 若目标值等于中间元素，返回中间元素索引
        return $middle;
    }
    return -1;
}
