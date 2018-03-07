<?php
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
