<?php

$arr = range(10, 0, -1);

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
    // 外层循环，将剩余未排序数组元素中值最小的元素移至首位
    for ($i = 0, $size = count($arr); $i < $size - 1; $i++) {
        // 假定第一位元素值最小，并保存索引到$p
        $p = $i;
        // 内层循环，得到剩余未排序数组元素中值最小的元素的索引
        for ($j = $i + 1; $j < $size; $j++) {
            // 将假定最小元素值与下一位元素值进行比较，保存较小元素的索引到$p
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
    for ($i = 0, $size = count($arr); $i < $size - 1; $i++) {
        
    }
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
    // 将剩余元素与基准元素进行比较，大于基准的元素和小于基准的元素分开存储
    for ($i = 1, $size = count($arr); $i < $size; $i++) {
        if ($arr[$i] < $base) {
            $frontArr[] = $arr[$i];
        } else {
            $backArr[] = $arr[$i];
        }
    }
    // 递归
    $func     = __FUNCTION__;
    $frontArr = $func($frontArr, $desc);
    $backArr  = $func($backArr, $desc);
    // 合并数组
    if ($desc) {
        return array_merge($backArr, array($base), $frontArr);
    }
    return array_merge($frontArr, array($base), $backArr);
}
print_r(quickSort($arr));
