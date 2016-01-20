<?php
set_time_limit(0) ;
ini_set ('memory_limit', '200M');
/**
 *  	快速排序
 */
function quickSort($array){
	if(!isset($array[1])) return $array;

	$mid = $array[0]; //获取基准

	$leftArray = array();
	$rightArray = array();
	foreach ($array as $value) {
		if($mid > $value){
			$rightArray[] = $value;
		}else{
			$leftArray[] = $value;
		}
	}
	unset($array);
	$leftArray = quickSort($leftArray);

	$leftArray[] = $mid;

	$rightArray = quickSort($rightArray);

	return array_merge($leftArray, $rightArray);
}

$arr = array_rand(range(1,10), 8);  //甚至在冒泡算法超过1600个元素的时候会出现内存不足的提示，但这里为了测出两个之间的差别大小， 就设置成了1500，保证冒泡算法也能执行完毕。
shuffle($arr);
var_dump($arr);
$startStamp  = microtime(true);
$sortArr = quickSort($arr);
var_dump($arr);
$endStamp  = microtime(true);

$time = $endStamp - $startStamp;
var_dump($time);