<?php
/**
 * 快速排序
 * C.R.A.Hoare于1962年提出的一种划分交换排序。
 * 它采用了一种分而治之的策略，
 * 通常称其为分治法(Divide-and-ConquerMethod)。
 * 基本思想：
 * 将原问题分解为若干个规模更小但结构与原问题相似的子问题。
 * 递归地解这些子问题，然后将这些子问题的解组合为原问题的解。
 *
 */
function quickSort(array &$list, $left = 0, $right = null)
{
	if(is_null($right)){
		$right = count($list) - 1;
	}
	$middle = intval(($left + $right)/2);
	$pivot = $list[$middle];
	$i = $left;
	$j = $right;
	//partition
	while($i <= $j){
		while($list[$i] < $pivot){
			$i++;
		}
		while($list[$j] > $pivot){
			$j--;
		}
		if($i <= $j){
			$temp = $list[$i];
			$list[$i] = $list[$j];
			$list[$j] = $temp;
			$i++;
			$j--;
		}
	}
	//recusion
	if($left < $j){
		quickSort($list, $left, $j);
	}
	if($i < $right){
		quickSort($list, $i, $right);
	}
}

$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
quickSort($list);
var_dump($list);

/**
 * 分析：
 * 原数组:[3, 6, 2, 4, 10, 1 ,9, 8, 5, 7]
 * pivot:10
 * 
 * list[4] (10), list[9] (7) swap 
 * [ 3 ,6 ,2 ,4 ,7 ,1 ,9 ,8 ,5 ,10 ]
 * 
 * pivot:7
 * 
 * list[4] (7), list[8] (5) swap 
 * [ 3 ,6 ,2 ,4 ,5 ,1 ,9 ,8 ,7 ,10 ]
 * 
 * pivot:2
 * 
 * list[0] (3), list[5] (1) swap 
 * [ 1 ,6 ,2 ,4 ,5 ,3 ,9 ,8 ,7 ,10 ]
 * list[1] (6), list[2] (6) swap 
 * [ 1 ,2 ,6 ,4 ,5 ,3 ,9 ,8 ,7 ,10 ]
 * 
 * pivot:1
 * 
 * list[0] (1), list[0] (1) swap 
 * [ 1 ,2 ,6 ,4 ,5 ,3 ,9 ,8 ,7 ,10 ]
 * 
 * pivot:4
 * 
 * list[2] (6), list[5] (3) swap 
 * [ 1 ,2 ,3 ,4 ,5 ,6 ,9 ,8 ,7 ,10 ]
 * list[3] (4), list[3] (4) swap 
 * [ 1 ,2 ,3 ,4 ,5 ,6 ,9 ,8 ,7 ,10 ]
 * 
 * pivot:5
 * 
 * list[4] (5), list[4] (5) swap 
 * [ 1 ,2 ,3 ,4 ,5 ,6 ,9 ,8 ,7 ,10 ]
 * 
 * pivot:8
 * 
 * list[6] (9), list[8] (7) swap 
 * [ 1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 ,10 ]
 * list[7] (8), list[7] (8) swap 
 * [ 1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 ,10 ]
 * 
 */