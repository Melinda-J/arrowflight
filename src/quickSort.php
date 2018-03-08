<?php
/**
 * 快速排序
 * @param  array &$arr 将要排序的数组
 * @return array       排序后的数组
 */
function quickSort(&$arr)
{
    if (!is_array($arr) || count($arr) <= 0) {
        return;
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
    $func = __FUNCTION__;
    $func($frontArr);
    $func($backArr);
    // 合并数组
    $arr = array_merge($frontArr, array($base), $backArr);
    return;
}
