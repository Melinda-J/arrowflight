<?php

/**
 * 冒泡排序
 * @param  array   $arr  将要排序的数组
 * @param  boolean $desc 是否倒序
 * @return array         排序后的数组
 */
function bubbleSort($arr, $desc = false)
{
    if (!is_array($arr) || count($arr) == 0) {
        return $arr;
    }
    // 外层循环，将剩余未排序数组元素中值最大的元素移至末位
    for ($i = 0, $size = count($arr); $i < $size - 1; $i++) {
        // 内层循环，若当前元素的值比下一位元素值大，交换两元素位置
        for ($j = 0; $j < $size - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp         = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j]     = $tmp;
            }
        }
    }
    if ($desc) {
        return array_reverse($arr);
    }
    return $arr;
}

/**
 * 选择排序
 * @param  array   $arr  将要排序的数组
 * @param  boolean $desc 是否倒序
 * @return array         排序后的数组
 */
function selectSort($arr, $desc = false)
{
    if (!is_array($arr) || count($arr) == 0) {
        return $arr;
    }
    // 外层循环，假定元素$arr[$i]为最小元素
    for ($i = 0, $size = count($arr); $i < $size - 1; $i++) {
        // 保存最小元素索引到$p
        $p = $i;
        // 内层循环，将元素$arr[$j]与最小元素进行比较
        for ($j = $i + 1; $j < $size; $j++) {
            // 若元素$arr[$j]小于最小元素，继续假定$arr[$j]为最小元素，保存索引到$p
            if ($arr[$j] < $arr[$p]) {
                $p = $j;
            }
        }
        // 若假定最小元素索引不等于实际最小元素索引，交换两元素位置
        if ($p == $i) {
            continue;
        }
        $tmp     = $arr[$i];
        $arr[$i] = $arr[$p];
        $arr[$p] = $tmp;
    }
    if ($desc) {
        return array_reverse($arr);
    }
    return $arr;
}

/**
 * 插入排序
 * @param  array   $arr  将要排序的数组
 * @param  boolean $desc 是否倒序
 * @return array         排序后的数组
 */
function insertSort($arr, $desc = false)
{
    if (!is_array($arr) || count($arr) == 0) {
        return $arr;
    }
    // 外层循环，待插入元素$arr[$i]
    for ($i = 1, $size = count($arr); $i < $size; $i++) {
        // 待插入元素
        $tmp = $arr[$i];
        // 内层循环，待比较元素$arr[$j]
        for ($j = $i - 1; $j >= 0; $j--) {
            // 若待插入元素小于待比较元素，交换两元素位置
            if ($tmp > $arr[$j]) {
                break;
            }
            $arr[$j + 1] = $arr[$j];
            $arr[$j]     = $tmp;
        }
    }
    if ($desc) {
        return array_reverse($arr);
    }
    return $arr;
}

/**
 * 快速排序
 * @param  array   $arr  将要排序的数组
 * @param  boolean $desc 是否倒序
 * @return array         排序后的数组
 */
function quickSort($arr, $desc = false)
{
    if (!is_array($arr) || count($arr) == 0) {
        return $arr;
    }
    // 以第一个元素为基准
    $base     = $arr[0];
    $frontArr = array();
    $backArr  = array();
    // 将剩余元素与基准元素进行比较，大于基准的元素和小于基准的元素分别存储再$backArr和$frontArr中
    for ($i = 1, $size = count($arr); $i < $size; $i++) {
        if ($arr[$i] < $base) {
            $frontArr[] = $arr[$i];
        } else {
            $backArr[] = $arr[$i];
        }
    }
    // 递归的对$frontArr和$backArr执行上述操作
    $func     = __FUNCTION__;
    $frontArr = $func($frontArr, $desc);
    $backArr  = $func($backArr, $desc);
    // 合并数组
    if ($desc) {
        return array_merge($backArr, array($base), $frontArr);
    }
    return array_merge($frontArr, array($base), $backArr);
}

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
    if (!is_array($arr) || count($arr) == 0) {
        return -1;
    }
    // 起始查找位置
    if (!isset($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (!isset($end)) {
        $end = count($arr) - 1;
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
    if (!is_array($arr) || count($arr) == 0) {
        return -1;
    }
    // 起始查找位置
    if (!isset($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (!isset($end)) {
        $end = count($arr) - 1;
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
