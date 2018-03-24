<?php
/**
 * 插入排序
 * @param  array &$arr 待排序的数组
 * @return
 */
function insertSort(&$arr)
{
    $size = count($arr);
    if ($size <= 1) {
        return;
    }
    // 外层循环，待插入元素$arr[$i]
    for ($i = 1; $i < $size; $i++) {
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
    return;
}

$arr = [7, 5, 3, 1, 6, 4, 9, 8, 10, 2];
insertSort($arr);
print_r($arr);
