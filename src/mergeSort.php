<?php
/**
 * 归并排序（递归法）.
 *
 * @param array $arr 待排序的数组
 */
function mergeSortRecursive(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    // 将数组平均拆分成两组
    $leftArr = array_slice($arr, 0, $middle = $size >> 1);
    $rightArr = array_slice($arr, $middle);
    call_user_func_array(__FUNCTION__, [&$leftArr]);
    call_user_func_array(__FUNCTION__, [&$rightArr]);
    $i = $j = 0;
    $leftArrSize = count($leftArr);
    $rightArrSize = count($rightArr);
    $tmp = [];
    // 从两数组首位开始比较数组元素大小，较小元素存入$tmp
    while ($i < $leftArrSize && $j < $rightArrSize) {
        $tmp[] = $leftArr[$i] < $rightArr[$j] ? $leftArr[$i++] : $rightArr[$j++];
    }
    // 剩余元素直接存入$tmp
    while ($i < $leftArrSize) {
        $tmp[] = $leftArr[$i++];
    }
    while ($j < $rightArrSize) {
        $tmp[] = $rightArrSize[$j++];
    }
    $arr = $tmp;
}

/**
 * 归并排序（迭代法）.
 *
 * @param array $arr 待排序的数组
 */
function mergeSort(&$arr)
{
    for ($size = count($arr), $tmp = [], $step = 1; $step < $size; $step += $step) {
        // 对数组进行分组，每组长度为$step
        // 相邻分组，两两一对进行排序，合并
        for ($start = 0, $k = 0; $start < $size; $start += 2 * $step) {
            $start1 = $start; // 左侧分组起始位置
            $end1 = min($start + $step, $size);
            $start2 = $end1; // 右侧分组起始位置
            $end2 = min($start + 2 * $step, $size);
            // 依次比较两分组元素
            while ($start1 < $end1 && $start2 < $end2) {
                $tmp[$k++] = $arr[$start1] < $arr[$start2] ? $arr[$start1++] : $arr[$start2++];
            }
            while ($start1 < $end1) {
                $tmp[$k++] = $arr[$start1++];
            }
            while ($start2 < $end2) {
                $tmp[$k++] = $arr[$start2++];
            }
        }
        $arr = $tmp;
    }
}
