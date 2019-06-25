<?php
/**
 * 二分查找(迭代法)
 *
 * @param mixed $search 查找目标值
 * @param array $arr 待检索的数组
 * @param integer $start 起始查找位置
 * @param integer $end 终止查找位置
 * @return integer 目标值在待检索数组中的位置
 */
function divideSearch($search, $arr, $start = null, $end = null)
{
    $size = count($arr);
    // 起始查找位置
    if (is_null($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (is_null($end)) {
        $end = $size - 1;
    }
    $index = -1;
    while ($end >= $start) {
        // 取数组中间元素索引
        $middle = intval(($start + $end) / 2);
        // 若目标值等于中间元素，返回中间元素索引
        if ($search == $arr[$middle]) {
            $index = $middle;
            break;
        }
        // 若目标值大于中间元素，向后查找|若目标值小于中间元素，向前查找
        $search > $arr[$middle] ? $start = $middle + 1 : $end = $middle - 1;
    }

    return $index;
}

/**
 * 二分查找(递归法)
 *
 * @param mixed $search 查找的目标值
 * @param array $arr 待检索的数组
 * @param integer $start 起始查找位置
 * @param integer $end 终止查找位置
 * @return integer 目标值在待检所数组中的位置
 */
function halfSearch($search, $arr, $start = null, $end = null)
{
    $size = count($arr);
    if ($size == 0) {
        return -1;
    }
    // 起始查找位置
    if (is_null($start)) {
         $start = 0;
    }
    // 终止查找位置
    if (is_null($end)) {
        $end = $size - 1;
    }
    if ($end < $start) {
        return -1;
    }
    // 中间元素索引
    $middle = intval(($start + $end) / 2);
    // 若目标值等于中间元素，返回中间元素索引
    if ($search == $arr[$middle]) {
        return $middle;
    }
    // 若目标值大于中间元素，向后查找|若目标值小于中间元素，向前查找
    $search > $arr[$middle] ? $start = $middle + 1 : $end = $middle - 1;

    return call_user_func_array(__FUNCTION__, [$search, $arr, $start, $end]);
}
