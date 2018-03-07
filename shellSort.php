<?php
/**
 * 希尔排序
 * @param  array   $arr  要排序的数组
 * @param  boolean $desc 是否倒序
 * @return array         排序后的数组
 */
function shellSort($arr = array(), $desc = false)
{
    if (!is_array($arr) || count($arr) == 0) {
        return $arr;
    }
    $size = count($arr);
    // 将数组所有元素按步长$step进行分组，对每个分组分别排序
    $step = floor($size / 2);
    // 步长为1时，排序完成
    while ($step >= 1) {
        // 对每个分组执行插入排序
        for ($i = $step + 1; $i < $size; $i++) {
            for ($j = $i - $step; $j >= 0; $j -= $step) {
                if ($arr[$j + $step] > $arr[$j]) {
                    break;
                }
                $tmp             = $arr[$j];
                $arr[$j]         = $arr[$j + $step];
                $arr[$j + $step] = $tmp;
            }
        }
        $step = floor($step / 2);
    }
    if ($desc) {
        return array_reverse($arr);
    }
    return $arr;
}
