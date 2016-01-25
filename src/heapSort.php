<?php
/**
 * 堆排序
 * 基本思想:
 * 堆排序(HeapSort)是一树形选择排序。
 * 在排序过程中，将R[l..n]看成是一棵完全二叉树的顺序存储结构，
 * 利用完全二叉树中双亲结点和孩子结点之间的内在关系，
 * 在当前无序区中选择关键字最大(或最小)的记录。
 * 　
 * 根结点(亦称为堆顶)的关键字是堆里所有结点关键字中最小者的堆称为小根堆。
 * 根结点(亦称为堆顶)的关键字是堆里所有结点关键字中最大者，称为大根堆。
 */
function heapSort(array $list){
	$length = count($list);
	buildHeap($list, $length - 1);
	while(--$length){
		$temp = $list[0];
		$list[0] = $list[$length];
		$list[$length] = $temp;
		heapAdjust($list, 0, $length);
	}
	return $list;
}

function buildHeap(array &$list, $num){
	for($i = floor(($num - 1) / 2); $i >= 0; $i--){
		heapAdjust($list, $i, $num + 1);
	}
}

function heapAdjust(array &$list, $i, $num){
	if($i > $num / 2){
		return ;
	}

	$key = $i;
	$leftChild = $i * 2 + 1;
	$rightChild = $i * 2 + 2;
	if ($leftChild < $num && $list[$leftChild] > $list[$key]) {
	    $key = $leftChild;
	}
	if ($rightChild < $num && $list[$rightChild] > $list[$key]) {
	    $key = $rightChild;
	}
	if ($key != $i) {
	    $val = $list[$i];
	    $list[$i] = $list[$key];
	    $list[$key] = $val;
	    heapAdjust($list, $key, $num);
	    // heapPrint($list);
	}
}

// function heapPrint(array $list){
// 	echo '<br>';
// 	echo 'Memory Structure:';
// 	echo '[ ' . implode(', ', $list) . ' ]';
// 	echo '<br>';
// 	echo 'Heap:';
// 	echo '<br>';
// 	$nbsp = '&nbsp;';
// 	$length = count($list);
// 	$level = ceil(sqrt($length));
// 	//start index
// 	for($j = 0; $j < $level; $j++){
// 		$startIndex = pow(2, $j) - 1;
// 		$endIndex = pow(2, $j) + $startIndex;
// 		for($i = $startIndex; $i < $endIndex; $i++){
// 			if($i < $length){
// 				echo $nbsp;
// 				echo $list[$i];
// 				echo $nbsp;
// 			}
// 		}
// 		echo '<br>';
// 	}
// }

$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
// heapPrint($list);
$result = heapSort($list);
// heapPrint($result);
var_dump($result);

/**
 * 分析：
 * Memory Structure:[ 3, 6, 2, 4, 10, 1, 9, 8, 5, 7 ]
 * Heap:
 * 3 
 * 6  2 
 * 4  10  1  9 
 * 8  5  7 
 * 
 * Memory Structure:[ 3, 6, 2, 8, 10, 1, 9, 4, 5, 7 ]
 * Heap:
 * 3 
 * 6  2 
 * 8  10 1  9 
 * 4  5  7 

 * Memory Structure:[ 3, 6, 9, 8, 10, 1, 2, 4, 5, 7 ]
 * Heap:
 * 3 
 * 6  9 
 * 8  10 1  2 
 * 4  5  7 

 * Memory Structure:[ 3, 10, 9, 8, 7, 1, 2, 4, 5, 6 ]
 * Heap:
 *  3 
 *  10  9 
 *  8  7  1  2 
 *  4  5  6 

 * Memory Structure:[ 3, 10, 9, 8, 7, 1, 2, 4, 5, 6 ]
 * Heap:
 *  3 
 *  10  9 
 *  8  7  1  2 
 *  4  5  6 

 * Memory Structure:[ 10, 8, 9, 5, 7, 1, 2, 4, 3, 6 ]
 * Heap:
 *  10 
 *  8  9 
 *  5  7  1  2 
 *  4  3  6 

 * Memory Structure:[ 10, 8, 9, 5, 7, 1, 2, 4, 3, 6 ]
 * Heap:
 *  10 
 *  8  9 
 *  5  7  1  2 
 *  4  3  6 

 * Memory Structure:[ 10, 8, 9, 5, 7, 1, 2, 4, 3, 6 ]
 * Heap:
 *  10 
 *  8  9 
 *  5  7  1  2 
 *  4  3  6 

 * Memory Structure:[ 9, 8, 6, 5, 7, 1, 2, 4, 3, 10 ]
 * Heap:
 *  9 
 *  8  6 
 *  5  7  1  2 
 *  4  3  10 

 * Memory Structure:[ 8, 7, 6, 5, 3, 1, 2, 4, 9, 10 ]
 * Heap:
 *  8 
 *  7  6 
 *  5  3  1  2 
 *  4  9  10 

 * Memory Structure:[ 8, 7, 6, 5, 3, 1, 2, 4, 9, 10 ]
 * Heap:
 *  8 
 *  7  6 
 *  5  3  1  2 
 *  4  9  10 

 * Memory Structure:[ 7, 5, 6, 4, 3, 1, 2, 8, 9, 10 ]
 * Heap:
 *  7 
 *  5  6 
 *  4  3  1  2 
 *  8  9  10 

 * Memory Structure:[ 7, 5, 6, 4, 3, 1, 2, 8, 9, 10 ]
 * Heap:
 *  7 
 *  5  6 
 *  4  3  1  2 
 *  8  9  10 

 * Memory Structure:[ 6, 5, 2, 4, 3, 1, 7, 8, 9, 10 ]
 * Heap:
 *  6 
 *  5  2 
 *  4  3  1  7 
 *  8  9  10 

 * Memory Structure:[ 5, 4, 2, 1, 3, 6, 7, 8, 9, 10 ]
 * Heap:
 *  5 
 *  4  2 
 *  1  3  6  7 
 *  8  9  10 

 * Memory Structure:[ 5, 4, 2, 1, 3, 6, 7, 8, 9, 10 ]
 * Heap:
 *  5 
 *  4  2 
 *  1  3  6  7 
 *  8  9  10 

 * Memory Structure:[ 4, 3, 2, 1, 5, 6, 7, 8, 9, 10 ]
 * Heap:
 *  4 
 *  3  2 
 *  1  5  6  7 
 *  8  9  10 

 * Memory Structure:[ 3, 1, 2, 4, 5, 6, 7, 8, 9, 10 ]
 * Heap:
 *  3 
 *  1  2 
 *  4  5  6  7 
 *  8  9  10 

 * Memory Structure:[ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
 * Heap:
 *  1 
 *  2  3 
 *  4  5  6  7 
 *  8  9  10 
 */