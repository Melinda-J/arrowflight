<?php
/**
 * 二分查找(迭代法).
 *
 * @param mixed $search 查找目标值
 * @param array $arr    待检索的数组
 * @param int   $start  起始查找位置
 * @param int   $end    终止查找位置
 *
 * @return int 目标值在待检索数组中的位置
 */
function divideSearch($search, $arr, $start = null, $end = null)
{
    // 起始查找位置
    if (is_null($start)) {
        $start = 0;
    }
    // 终止查找位置
    if (is_null($end)) {
        $end = count($arr) - 1;
    }
    $index = -1;
    while ($end >= $start) {
        // 取数组中间元素索引
        // 若目标值等于中间元素，返回中间元素索引
        if ($search == $arr[$middle = intval(($start + $end) / 2)]) {
            $index = $middle;
            break;
        }
        // 若目标值大于中间元素，向后查找|若目标值小于中间元素，向前查找
        $search > $arr[$middle] ? $start = $middle + 1 : $end = $middle - 1;
    }

    return $index;
}

/**
 * 二分查找(递归法).
 *
 * @param mixed $search 查找的目标值
 * @param array $arr    待检索的数组
 * @param int   $start  起始查找位置
 * @param int   $end    终止查找位置
 *
 * @return int 目标值在待检所数组中的位置
 */
function halfSearch($search, $arr, $start = null, $end = null)
{
    $size = count($arr);
    if (0 == $size) {
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
    // 若目标值等于中间元素，返回中间元素索引
    if ($search == $arr[$middle = intval(($start + $end) / 2)]) {
        return $middle;
    }
    // 若目标值大于中间元素，向后查找|若目标值小于中间元素，向前查找
    $search > $arr[$middle] ? $start = $middle + 1 : $end = $middle - 1;

    return call_user_func_array(__FUNCTION__, [$search, $arr, $start, $end]);
}
