<?php
/**
 * 简单实现快速排序
 */
function simpleQuickSort(array $list)
{
	$length = count($list);
    if( $length <= 1){
        return $list;
    }
    else{
        $pivot = $list[0];
        $left_list = array();
        $right_list = array();
        for($i = 1; $i < $length; $i++)
        {
            if($list[$i] < $pivot){
                $left_list[] = $list[$i];
            }
            else{
                $right_list[] = $list[$i];
            }
        }
        return array_merge(simpleQuickSort($left_list), array($pivot), simpleQuickSort($right_list));
    }
}
$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
var_dump(simpleQuickSort($list));