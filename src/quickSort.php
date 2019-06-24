<?php
/**
 * 快速排序
 *
 * @param array $arr 待排序的数组
 */
function quickSort(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    // 以第一个元素为基准
    $base = $arr[0];
    $frontArr = [];
    $backArr = [];
    // 将剩余元素与基准元素进行比较，大于基准的元素和小于基准的元素分别存储在$backArr和$frontArr中
    for ($i = 1; $i < $size; $i++) {
        if ($arr[$i] < $base) {
            $frontArr[] = $arr[$i];
        } else {
            $backArr[] = $arr[$i];
        }
    }
    // 递归的对$frontArr和$backArr执行上述操作
    call_user_func_array(__FUNCTION__, [&$frontArr]);
    call_user_func_array(__FUNCTION__, [&$backArr]);
    // 合并数组
    $arr = array_merge($frontArr, [$base], $backArr);
}
